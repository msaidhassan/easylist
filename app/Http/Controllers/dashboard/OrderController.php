<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Freelancer;
use App\Models\FreelancerOrders;
use App\Models\InventoryUpdates;
use App\Models\MainField;
use App\Models\Order;
use App\Models\SubField;
use App\Models\TransferMethod;
use App\Models\Transfer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mockery\Exception;
use Nette\Utils\Random;

class OrderController extends Controller
{
    public function add(){
        $title = "add order";
        $description = "add order";

        $currentUser = Auth::user();

        $transferMethods = TransferMethod::all();

        $main_fields = MainField::where('new_franchise_id' , $currentUser->new_franchise_id)->get();

        $sub_fields = SubField::where('new_franchise_id' , $currentUser->new_franchise_id)->get();

        $clients = Client::where('new_franchise_id' , $currentUser->new_franchise_id)->get();

        $freelancers = Freelancer::where('new_franchise_id' , $currentUser->new_franchise_id)->get();

        return view('orders.add_order' , compact("clients" ,"transferMethods", "title" , "description" , "main_fields" , "sub_fields" ,"freelancers"));
    }

    public function store(Request $request) {
        try
        {
            DB::beginTransaction();
            $data = $request->validate([
                "client_id" => 'required',
                "main_field_id" => 'required',
                "sub_field_id" => 'nullable',
                "desc" => 'nullable',
                "cvalue" => 'required',
    //            "fvalue" => 'required',
                "deadline" => 'nullable',
                "method" => 'nullable',
                "proof" => 'nullable',
                "freelancers" => 'required|array',
                "recieve" => 'required|array',
                'number' => 'nullable',
            ]);

            $data['fvalue'] = 0 ;

            foreach ($data['recieve'] as $recieve) {
                $data['fvalue']  += $recieve;
            }



            $userId = Auth::id();

            $currentUser = Auth::user();
            if ($currentUser && $currentUser->new_franchise_id) {
                $data['new_franchise_id'] = $currentUser->new_franchise_id;
            }
//        dd($request->all());

            // Combine freelancers and their respective compensation into a single array
            $freelancerDetails = [];
            foreach ($data['freelancers'] as $index => $freelancer) {

                $parts = str_split($freelancer, strpos($freelancer, '-'));
                $edit_name =implode(' ', $parts);
                // dd()
                $namee = str_replace(" -","",$edit_name);
                $name = preg_replace('/\d+$/', '', $namee);
                $id = str_replace("-" ,"" ,$parts[1]);
                $freelancerDetails[] = [
                    'name' => $name,
                    'id' => $id,
                    'compensation' => $data['recieve'][$index],
                ];
            }
            // dd($freelancerDetails);
            $avalue = ($data['cvalue'] - $data['fvalue']) * 0.20 ;

            if($data['number'] != null)
            {
                 $transfer = Transfer::where('number',$data['number'])->first();
                 if($transfer == null)
                 {
                      $notification = [
                        'message' => 'الرقم التعريفي للحوالة المجمعة غير صحيح ',
                        'alert-type' => 'error'
                    ];
                     return back()->with($notification);
                 }
                 if($transfer->value > $data['cvalue'])
                 {
                     $orders = Order::where('random_number_transfers',$transfer->number)->get();
                     if(!empty($orders))
                     {

                         $value = $transfer->value - $orders->sum('cvalue');
                         if($value < $data['cvalue'])
                         {
                               $notification = [
                                'message' => ' قيمة الحوالة المجمعة اصغر من قيمة الطلب ',
                                'alert-type' => 'error'
                            ];
                             return back()->with($notification);
                         }
                     }
                      $data['method'] =$transfer->method;
                      $data['proof'] = $transfer->proof;

                 }else
                 {
                      $notification = [
                                'message' => ' قيمة الحوالة المجمعة اصغر من قيمة الطلب ',
                                'alert-type' => 'error'
                            ];
                        return back()->with($notification);
                 }


            }
            if($data['method'] != null && $data['proof'] != null && $data['number'] == null)
            {
                $client = Client::where('id',$data['client_id'])->first();
                $salesAgent = User::where('id',$client->user_id)->first();
                $salesOfficer = User::where('id',$salesAgent->manager_id)->first();
                 $transfer = Transfer::get();
                //  dd($transfer);
                 $request->number = ($transfer->sum('number') ?? 0) + 1 ;
                //  if()
                $transfer = Transfer::create([
                    'number' => $request->number,
                    'value' => $data['cvalue'],
                    'proof' => $data['proof'],
                    'method' => $data['method'],
                    'agent' => $salesAgent->name,
                    'officer' => $salesOfficer->name,
                    'new_franchise_id' =>$data['new_franchise_id']
                ]);
                $data['number'] = $transfer->number;
            }

            $neworder =Order::create([
                'client_id' => $data['client_id'],
                'main_field_id' => $data['main_field_id'],
                'sub_field_id' => $data['sub_field_id'],
                'user_id' => $userId,
                'desc' => $data['desc'],
                'cvalue' => $data['cvalue'],
                'fvalue' => $data['fvalue'] ,
                'avalue' => $avalue,
                'deadline' => $data['deadline'],
                'method' => $data['method'],
                'proof' => $data['proof'],
                'freelancer_details' => json_encode($freelancerDetails),
                'new_franchise_id' => $data['new_franchise_id'],
                'random_number_transfers' => $data['number'],
            ]);
            $order_id = $neworder->id;
            $freelancerOrder = [];
            foreach($freelancerDetails as $value)
            {
                FreelancerOrders::create([
                    'freelancer_id' => $value['id'],
                    'order_id' => $neworder->id,
                    'recieve' => $value['compensation'],
                ]);


            }
            $ordersFree = FreelancerOrders::where('order_id',$order_id)->get();
            $neworder->status !='مسلم' ? $this->FreelancerCurrentOrders($ordersFree,$order_id) : $this->FreelancerDeliveredOrders($ordersFree,$neworder->id);


            $notification = [
                'message' => 'تمت الإضافة بنجاح',
                'alert-type' => 'success'
            ];
            DB::commit();
            return redirect()->route('all_orders', app()->getLocale())->with($notification);
        }catch (\Exception $exception)
        {
            DB::rollBack();
//        dd($exception->getMessage());
            $notification = array(
                'message' => $exception->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('all_orders' , app()->getLocale())->with($notification);
        }

    }



    public function all(){
        $title = "all orders";
        $description = "all orders";
        $currentUser = Auth::user();
            $orders = str_contains($currentUser->role, 'المدير') || str_contains($currentUser->role, 'مدير')
        ? Order::where('new_franchise_id', $currentUser->new_franchise_id)
            ->with('inventoryUpdate')
            ->orderBy('created_at', 'desc') // ترتيب من الأحدث إلى الأقدم
            ->get()
        : Order::where('new_franchise_id', $currentUser->new_franchise_id)
            ->where('user_id', $currentUser->id)
            ->with('inventoryUpdate')
            ->orderBy('created_at', 'desc') // ترتيب من الأحدث إلى الأقدم
            ->get();
        // $orders = str_contains($currentUser->role,'المدير') || str_contains($currentUser->role,'مدير')? Order::where('new_franchise_id' , $currentUser->new_franchise_id)->with('inventoryUpdate')->get() :Order::where('new_franchise_id' , $currentUser->new_franchise_id)->where('user_id',$currentUser->id)->with('inventoryUpdate')->get();
        $freelancerss = Freelancer::orderBy('created_at', 'desc')->get();
        return view('orders.all_orders' , compact("orders" , 'freelancerss',"title" , "description"));
    }


    public function edit($language , $id){

        $title = "edit order";
        $description = "edit order";
        $currentUser = Auth::user();


        $main_fields = MainField::where('new_franchise_id' , $currentUser->new_franchise_id)->get();
        $sub_fields = SubField::where('new_franchise_id' , $currentUser->new_franchise_id)->get();
        $clients = Client::where('new_franchise_id' , $currentUser->new_franchise_id)->get();
        $freelancers = Freelancer::where('new_franchise_id' , $currentUser->new_franchise_id)->get();
        $order = Order::with('freelancerOrder')->findOrFail($id);


        return view('orders.edit_order' , compact("clients" , "title" , "description" , "main_fields" , "sub_fields" ,"freelancers" , "order"));

    }

    public function update(Request $request , $language , $id){
    try{
        DB::beginTransaction();
        $data = $request->validate([
            "client_id" => 'required',
            "main_field_id" => 'required',
            "sub_field_id" => 'nullable',
            "desc" => 'nullable',
            "cvalue" => 'required',
//            "fvalue" => 'required',
            "deadline" => 'nullable',
            "method" => 'nullable',
            "proof" => 'nullable',
            "freelancers" => 'required|array',
            "recieve" => 'required|array',
            'number' => 'nullable',
        ]);
        $order = Order::findOrFail($id);
        $order_id = intval($order->id);
//dd($order_id);
        $data['status'] = $request->status ?? 'جاري';
        $data['fvalue']  = 0 ;
        foreach ($data['recieve'] as $recieve) {
            $data['fvalue']  += $recieve;
        }
        $userId = Auth::id();

        $currentUser = Auth::user();
        if ($currentUser && $currentUser->new_franchise_id) {
            $data['new_franchise_id'] = $currentUser->new_franchise_id;
        }

        $freelancerDetails = [];
        foreach ($data['freelancers'] as $index => $freelancer) {
            $parts = str_split($freelancer, strpos($freelancer, '-'));
            $edit_name =implode(' ', $parts);
            // dd()
            $namee = str_replace(" -","",$edit_name);

            $name = preg_replace('/\d+$/', '', $namee);
            $id = str_replace("-" ,"" ,$parts[1]);
            $freelancerDetails[] = [
                'name' => $name,
                'id' => $id,
                'compensation' => $data['recieve'][$index],
            ];
        }
          if($data['number'] != null)
            {
                 $transfer = Transfer::where('number',$data['number'])->first();
                 if($transfer == null)
                 {
                      $notification = [
                        'message' => 'الرقم التعريفي للحوالة المجمعة غير صحيح ',
                        'alert-type' => 'error'
                    ];
                     return back()->with($notification);
                 }
                if($transfer->value > $data['cvalue'])
                 {
                     $orders = Order::where('random_number_transfers',$transfer->number)->get();
                     if(!empty($orders))
                     {

                         $value = $transfer->value - $orders->sum('cvalue');
                         if($value < $data['cvalue'])
                         {
                               $notification = [
                                'message' => ' قيمة الحوالة المجمعة اصغر من قيمة الطلب ',
                                'alert-type' => 'error'
                            ];
                             return back()->with($notification);
                         }
                     }
                      $data['method'] =$transfer->method;
                      $data['proof'] = $transfer->proof;

                 }else
                 {
                      $notification = [
                                'message' => ' قيمة الحوالة المجمعة اصغر من قيمة الطلب ',
                                'alert-type' => 'error'
                            ];
                        return back()->with($notification);
                 }
            }
             if($data['method'] != null && $data['proof'] != null && $data['number'] == null)
            {
                // if($order->)

                $salesAgent = User::where('id',$order->client->user_id)->first();
                $salesOfficer = User::where('id',$salesAgent->manager_id)->first();
                $transfer = Transfer::where('number',$order->random_number_transfers)->first();
                if(!empty($transfer))
                {
                    $transfer->update([
                        'value' => $data['cvalue'],
                        'proof' => $data['proof'],
                        'method' => $data['method'],
                        'agent' => $salesAgent->name,
                        'officer' => $salesOfficer->name,
                        'new_franchise_id' =>$data['new_franchise_id']
                        ]);
                }else
                {
                    $transfer = Transfer::create([
                    'number' => $request->number,
                    'value' => $data['cvalue'],
                    'proof' => $data['proof'],
                    'method' => $data['method'],
                    'agent' => $salesAgent->name,
                    'officer' => $salesOfficer->name,
                    'new_franchise_id' =>$data['new_franchise_id']
                ]);
                }


                $data['number'] = $transfer->number;

            }
        $avalue = ($data['cvalue'] - $data['fvalue']) * 0.20 ;
        $order->update([
            'client_id' => $data['client_id'],
            'main_field_id' => $data['main_field_id'],
            'sub_field_id' => $data['sub_field_id'],
            'user_id' => $userId,
            'desc' => $data['desc'],
            'cvalue' => $data['cvalue'],
            'fvalue' => $data['fvalue'] ,
            'avalue' => $avalue,
            'deadline' => $data['deadline'],
            'method' => $data['method'],
            'proof' => $data['proof'],
            'freelancer_details' => json_encode($freelancerDetails),
            'new_franchise_id' => $data['new_franchise_id'],
            'status' => $data['status'],
            'random_number_transfers' => $data['number'],

        ]);
        foreach($freelancerDetails as $value)
            {
                FreelancerOrders::create([
                    'freelancer_id' => $value['id'],
                    'order_id' => $order->id,
                    'recieve' => $value['compensation'],
                ]);

        }
        $ordersFree = FreelancerOrders::where('order_id',$order_id)->get();

        $order->status !='مسلم' ? $this->FreelancerCurrentOrders($ordersFree,$order_id) : $this->FreelancerDeliveredOrders($ordersFree,$order_id);

//dd();
        if ($order->status == 'ملغي')
        {
            InventoryUpdates::create([
                'order_id' => $id,
                'cost' => $data['cvalue'],
                'status' => $data['status'],
            ]);
        }


        $notification = array(
            'message' => 'تم التعديل بنجاح',
            'alert-type' => 'success'
        );
        DB::commit();
        return redirect()->route('all_orders' , app()->getLocale())->with($notification);
    }catch (\Exception $exception)
    {
        DB::rollBack();
//        dd($exception->getMessage());
        $notification = array(
            'message' => $exception->getMessage(),
            'alert-type' => 'error'
        );
        return redirect()->route('all_orders' , app()->getLocale())->with($notification);
    }

    }

    public function delete($language , $id){

        $order = Order::findOrFail($id);

        $order->delete();


        $notification = array(
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('all_orders' , app()->getLocale())->with($notification);

    }
    public function update_status( $language , $id){
        $order =  Order::findOrFail($id);

        $order->update(['status' => 'مسلم']);
//        dd($order);
        $freelancers = FreelancerOrders::where('order_id',$order->id)->get();
        // dd($freelancers);
        $this->FreelancerDeliveredOrders($freelancers,intval($id));
        $notification = array(
            'message' => 'تم تغيير حالة الطلب اي مسلم بنجاح',
            'alert-type' => 'success'
        );

        return redirect()->route('all_orders' , app()->getLocale())->with($notification);

    }
    public function FreelancerCurrentOrders($freelancerOrder,$order_id)
    {
        $ids = $freelancerOrder->pluck('id');
        $freelancerOrders = FreelancerOrders::whereIn('id',$ids)->get();
        $freelancers = Freelancer::whereIn('id',$freelancerOrders->pluck('freelancer_id'))->get();
        foreach ($freelancers as $freelancer)
        {
            $freelancer_current_orders = json_decode($freelancer->freelancer_current_orders,true);
            $freelancer_delivered_orders = json_decode($freelancer->freelancer_delivered_orders,true);

            if(empty($freelancer_current_orders)) {

                $freelancer->update(['freelancer_current_orders' =>json_encode([$order_id])]) ;
//                dd($freelancer);

            }else
            {
                $newOrder_id =[];
                $addId=[];
                foreach($freelancer_current_orders as $currentOrders)
                {
                    $newOrder_id =[json_decode($currentOrders,true)];
                    if($currentOrders != $order_id)
                    {
                        $newOrder_id[] = $order_id;
                    }

                }
                $newOrder_id = array_values(array_unique(array_merge($freelancer_current_orders, $newOrder_id)));

//                dd(json_encode(array_values($newOrder_id)));
                if($freelancer_delivered_orders != null)
                {
                     foreach ($freelancer_delivered_orders as $currentOrders)
                    {
                        $addId[] = json_decode($currentOrders,true);
                        if($currentOrders == $order_id)
                        {
                           unset($addId[array_search($order_id, $addId)]);
                        }
                    }
                }

                $freelancer->update(['freelancer_delivered_orders' =>json_encode($addId),'freelancer_current_orders' =>json_encode($newOrder_id)]) ;
            }
//            dd($freelancer);
        }
    }
    public function FreelancerDeliveredOrders($freelancerOrder,$order_id)
    {
        $ids = $freelancerOrder->pluck('id');
        $freelancerOrders = FreelancerOrders::whereIn('id',$ids)->get();
        $freelancers = Freelancer::whereIn('id',$freelancerOrders->pluck('freelancer_id'))->get();
        foreach ($freelancers as $freelancer)
        {
            $freelancer_delivered_orders =json_decode($freelancer->freelancer_delivered_orders,true);
            $freelancer_current_orders =json_decode($freelancer->freelancer_current_orders,true);
            $newOrder_id =[];
            $addId=[];
            if(empty($freelancer_delivered_orders))
            {
               $newOrder_id [] = $order_id;

                foreach($freelancer_current_orders as $currentOrders)
                {
                    $addId =[json_decode($currentOrders,true)];

                    if($currentOrders == $order_id)
                    {
                        unset($addId[array_search($order_id, $addId)]);
                    }
                }
                foreach($freelancer_current_orders as $currentOrders)
                {
                    $addId []=json_decode($currentOrders,true);

                    if($currentOrders == $order_id)
                    {
                        unset($addId[array_search($order_id, $addId)]);
                    }
                }
            }

            elseif(!empty($freelancer_delivered_orders))
            {

                foreach($freelancer_delivered_orders as $currentOrders)
                {
                    $newOrder_id[] =json_decode($currentOrders,true);
                    if($currentOrders != $order_id)
                    {
                        $newOrder_id[] = $order_id;;
                    }

                }
                $newOrder_id = array_values(array_unique(array_merge($freelancer_delivered_orders, $newOrder_id)));
                foreach($freelancer_current_orders as $currentOrders)
                {
                    $addId[] =json_decode($currentOrders,true);

                    if($currentOrders == $order_id)
                    {
                        unset($addId[array_search($order_id, $addId)]);
                    }
                }
            }
            $freelancer->update(['freelancer_delivered_orders' => json_encode($newOrder_id),'freelancer_current_orders' =>json_encode(array_values($addId))]) ;

        }
    }
    public function DeleteFreelancerOrders($freelancerOrder,$orde_id )
    {

        $freelancers = Freelancer::whereIn('id', $freelancerOrder->pluck('freelancer_id'))->get();
        foreach ($freelancers as $freelancer)
        {
            $newOrder_id =[];
            if(empty($freelancer->freelancer_delivered_orders))
            {

                foreach(json_decode($freelancer->freelancer_delivered_orders,true) as $currentOrders)
                {
                    $newOrder_id =[json_decode($currentOrders,true)];

                    if($currentOrders == $orde_id)
                    {
                     $newOrder_id[] = [];
                    }
                    dd($newOrder_id);
                }
            }
        }
    }




}
