<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Transfer;
use App\Models\User;
use App\Models\Order;
use App\Models\Freelancer;
use App\Models\TransferMethod; // Assuming you have a TransferMethod model

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class TransferController extends Controller
{
    public function add()
    {
        $title = "add transfer";
        $description = "add transfer";
        $currentUser = Auth::user();
        $transferMethods = TransferMethod::all();

        $agents = User::whereHas('roles', function ($query) {
            $query->where('name', 'وكيل مبيعات');
        })->where('new_franchise_id', $currentUser->new_franchise_id)->get();

        $officers = User::whereHas('roles', function ($query) {
            $query->where('name', 'مسؤول مبيعات');
        })->where('new_franchise_id', $currentUser->new_franchise_id)->get();

        return view('transfers.add_transfer', compact("title","transferMethods", "description", "agents", "officers"));
    }
    public function transfersOrders($number)
    {
         $title = "all Transfers orders";
        $description = "all Transfers orders";
         $transfer = Transfer::where('number',$number)->first();
         $orders = Order::where('random_number_transfers',$transfer->number)->get();
         $freelancerss = Freelancer::orderBy('created_at', 'desc')->get();
        return view('orders.all_orders' , compact("orders" , 'freelancerss',"title" , "description"));
    }
    public function store(Request $request)
    {
         $transfers = Transfer::get();
        //  dd($transfers->sum('number'));
          $request->number = ( $transfers->sum('number') ?? 0) + 1  ;

           $validateData =Validator::make($request->all(),[
            'number' => 'unique:transfers,number',
            "value" => 'required',
            "proof" => 'required',
            "officer" => 'required',
            "agent" => 'required',
            "method" => 'required',
            "status" => 'nullable|in:تم,لا يتم,مسح', // Add validation for status
        ]);

        if($validateData->fails())
        {
            return back()->withErrors($validateData)->withInput();
        }
        $data = [
            'number' => $request->number,
            "value" => $request->value,
            "proof" => $request->proof,
            "officer" => $request->officer,
            "agent" => $request->agent,
            "method" => $request->method,
            "status" => $request->status ?? 'لم يتم', // Add validation for status
        ];
        $currentUser = Auth::user();
        if ($currentUser && $currentUser->new_franchise_id) {
            $data['new_franchise_id'] = $currentUser->new_franchise_id;
        }

        // dd($data);
        $currentUser = Auth::user();
        if ($currentUser && $currentUser->new_franchise_id) {
            $data['new_franchise_id'] = $currentUser->new_franchise_id;
        }

        Transfer::create($data);

        $notification = [
            'message' => 'تمت الإضافة بنجاح',
            'alert-type' => 'success',
        ];

        return redirect()->route('all_transfers', app()->getLocale())->with($notification);
    }

    public function all()
    {
        $title = "all transfers";
        $description = "all transfers";
        $currentUser = Auth::user();

        $transfers = Transfer::where('new_franchise_id', $currentUser->new_franchise_id)->get();

        return view('transfers.all_transfers', compact("title", "description", "transfers"));
    }

    public function edit($language, $id)
    {
        $title = "edit transfer";
        $description = "edit transfer";
        $transfer = Transfer::findOrFail($id);

        $currentUser = Auth::user();

        $agents = User::whereHas('roles', function ($query) {
            $query->where('name', 'وكيل مبيعات');
        })->where('new_franchise_id', $currentUser->new_franchise_id)->get();

        $officers = User::whereHas('roles', function ($query) {
            $query->where('name', 'مسؤول مبيعات');
        })->where('new_franchise_id', $currentUser->new_franchise_id)->get();

        return view('transfers.edit_transfer', compact("title", "description", "transfer", "agents", "officers"));
    }

    public function update(Request $request, $language, $id)
    {
        $data = $request->validate([
            "number" => 'required',
            "value" => 'required',
            "proof" => 'required',
            "officer" => 'required',
            "agent" => 'required',
            "method" => 'required',
            "status" => 'nullable|in:تم,لا يتم'
        ]);

        $currentUser = Auth::user();
        if ($currentUser && $currentUser->new_franchise_id) {
            $data['new_franchise_id'] = $currentUser->new_franchise_id;
        }

        $transfer = Transfer::findOrFail($id);
        $transfer->update($data);

        $notification = [
            'message' => 'تم التعديل بنجاح',
            'alert-type' => 'success',
        ];

        return redirect()->route('all_transfers', app()->getLocale())->with($notification);
    }

    public function delete($language, $id)
    {
        $transfer = Transfer::findOrFail($id);
        $orders = Order::where('random_number_transfers',$transfer->number)->get();
        foreach($orders as $order)
        {
            $order->delete();
        }

        $transfer->delete();

        $notification = [
            'message' => 'تم الحذف بنجاح',
            'alert-type' => 'success',
        ];

        return redirect()->route('all_transfers', app()->getLocale())->with($notification);
    }

public function toggleStatus($id)
{
    $transfer = Transfer::findOrFail($id);

    // Toggle between "تم" and "لا يتم" (matching the enum values)
    $newStatus = $transfer->status === 'تم' ? 'لم يتم' : 'تم';
    // Update the status
    $transfer->update(['status' => $newStatus]);

    // Success notification
    $notification = [
        'message' => 'تم تغيير الحالة بنجاح إلى ' . $newStatus,
        'alert-type' => 'success',
    ];

    return redirect()->route('all_transfers', app()->getLocale())->with($notification);
}

public function bulkUpdate(Request $request)
{
    $request->validate([
        'ids' => 'required|array',
        'ids.*' => 'exists:transfers,id',
        'status' => 'required|in:تم,لم يتم',
        ]);

    // تحديث الحالات
    Transfer::whereIn('id', $request->ids)->update(['status' => $request->status]);

    // إعداد رسالة التنبيه باستخدام Toastr
    $notification = [
        'message' => 'تم تغيير الحالة بنجاح إلى ' . $request->status,
        'alert-type' => 'success',
    ];

    // إعادة التوجيه مع رسالة التنبيه
    return redirect()->back()->with($notification);
}





}
