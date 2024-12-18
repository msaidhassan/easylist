<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientAttribution;
use App\Models\FreelancerOrders;
use App\Models\GeneralInventory;
use App\Models\ManagementTeam;
use App\Models\Marketing;
use App\Models\Order;
use App\Models\Freelancer;
use App\Models\SalesTeam;
use App\Models\Setting;
use App\Models\InventoryData;
use App\Models\InventorySettingData;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\MainField;
use App\Models\SubField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalReportController extends Controller
{
    //التسويق بالعمولة
    public function FirstStepMarketing()
    {
        $franchiseId = Auth::user()->new_franchise_id;
        $orders = Order::where('new_franchise_id', $franchiseId)
            ->where('status' ,'مسلم')
            ->where('status_inventory' ,'لم يتم')
            ->with(['mainField', 'user'])
            ->get();
        $order_ids = $orders->pluck('id');
        $freelances =  $orders->sum('fvalue');
        $totalOrdervalue = $orders->sum('cvalue');
        $marketing = Marketing::where('new_franchise_id',$franchiseId)->where('status' ,'enable')->first();

        $cleintsAtrrs = ClientAttribution::whereIn('existing_client_id',$orders->pluck('client_id'))->with('previousClient')->get();
        $totalOrderClientsAtt = $orders->whereIn('client_id', $cleintsAtrrs->pluck('existing_client_id'))->sum('cvalue');

        $totalMarketing = 0;
        foreach($orders as $order)
        {
            $clientid= [];
            $clientsAtrs =ClientAttribution::where('existing_client_id',$order->client_id)->with('previousClient')->first();

            if(!empty($clientsAtrs))
            {
                $totalOrderClientsAtt = $order->cvalue;
                 
                empty($marketing) ? $level1 = 0 : $level1 = intval($marketing->level1);
                
                $clientid= $clientsAtrs->id;
            
                $market2 = $totalOrderClientsAtt * ($level1/100);

 //dd($market2);

                if (isset($checkClietns[$clientid]))
                {
                    $checkClietns[$clientid]['total'] +=  $market2;

                }else{
                    $checkClietns[$clientid] =
                        [
                            'id' => $clientid,
                            'name' => $clientsAtrs->previousClient->name,
                            'total' => $market2,
                            'marketing' => $level1,
                        ];
                }

            }else
            {
                $market2 = 0;

            }

            $totalMarketing +=$market2;


        }
        $totalOrderValueWithoutFreelancer = $totalOrdervalue - $freelances;

 //salesTeam
        $sales_team = SalesTeam::where('new_franchise_id',$franchiseId)->first();
        $sales_agent = $sales_team->sales_agent;
        $sales_officer = $sales_team->sales_officer;
        $calcOfSalesAgent = ($totalOrderValueWithoutFreelancer * ($sales_agent/100)) + $sales_team->sales_agent_salary;
//       dd($calcOfSalesAgent);
        $calcOfSalesOfficer = ($totalOrderValueWithoutFreelancer * ($sales_officer/100)) + $sales_team->sales_officer_salary;

//        dd($calcOfSalesOfficer);
        $finalValue = $freelances + $totalMarketing + $calcOfSalesAgent + $calcOfSalesOfficer;
        $fainlTotalOrderValue = $totalOrdervalue - $finalValue;
//        dd($fainlTotalOrderValue);

        return ['orders' =>$orders,'marketing_level1' => $marketing,'salesTeam' => $sales_team,'totalOrder'=>$totalOrdervalue,'freelances'=>$freelances,'marketingValue'=>$totalMarketing,'finalTotalOrderValue'=>$fainlTotalOrderValue,'order_ids' =>$order_ids,'salesAgent'=>$calcOfSalesAgent,'salesOfficer'=>$calcOfSalesOfficer,'finalValue'=>$finalValue];
    }

public function ThStepSetting()
{
    $salesTeam = $this->FirstStepMarketing();
    $orders = $salesTeam['orders'];
    $valueOfTotalOrder = $salesTeam['finalTotalOrderValue'];
    $setting = Setting::whereIn('new_franchise_id',$orders->pluck('new_franchise_id'))->get();
    $salary = $setting->sum('salary');
    $settingCost = $setting->sum('cost');
    $valueOfSetting = ($valueOfTotalOrder * ($settingCost/100)) + $salary;
    $finalValueOfSetting = $valueOfTotalOrder - $valueOfSetting;
    return ['setting' => $valueOfSetting,'finalValueOfSetting' => $finalValueOfSetting,'orders' => $orders,'settingTeam' =>$setting];
}
public function FourthStepManagmentTeam()
{
    $setting = $this->ThStepSetting();
    $orders = $setting['orders'];
    $valueOfTotalOrder = $setting['finalValueOfSetting'];
    $managementTeam = ManagementTeam::whereIn('new_franchise_id',$orders->pluck('new_franchise_id'))->first();
    
    $salseMangerValue = $managementTeam->sales_manager ?? 0;
    $salesMangerSalary =$managementTeam->sales_manager_salary ?? 0;
    $sales_manager = ($valueOfTotalOrder *($salseMangerValue/100)) + $salesMangerSalary ;
    
    $marketing_managerValue = $managementTeam->marketing_manager ?? 0;
    $marketing_manager_salary =$managementTeam->marketing_manager_salary ?? 0;
    $marketing_manager = ($valueOfTotalOrder *($marketing_managerValue/100)) + $marketing_manager_salary;
    
    $technical_directorValue = $managementTeam->technical_director ?? 0;
    $technical_director_salary =$managementTeam->technical_director_salary ?? 0;
    $technical_director =($valueOfTotalOrder *($technical_directorValue/100))+ $technical_director_salary;
    
    $CFOValue = $managementTeam->CFO ?? 0;
    $CFO_salary =$managementTeam->CFO_salary ?? 0;
    $CFO = ($valueOfTotalOrder *($CFOValue/100)) + $CFO_salary;
    
    $CEOValue = $managementTeam->CEO ?? 0;
    $CEO_salary =$managementTeam->CEO_salary ?? 0;
    $CEO = ($valueOfTotalOrder *($CEOValue/100)) + $CEO_salary;
    
    $hr_manager = $managementTeam->hr_manager ?? 0;
    $hr_manager_salary =$managementTeam->hr_manager_salary ?? 0;
    $hr_managerDues =  ($valueOfTotalOrder *($hr_manager/100)) + $hr_manager_salary;
    
    
    $totalOfManagementTeam = $sales_manager + $technical_director + $CFO + $CEO + $hr_managerDues + $marketing_manager;
    $finalValueOfManageTeam = $valueOfTotalOrder - $totalOfManagementTeam;

    return ['managementTeam' => $managementTeam,'sales_manager' => $sales_manager,'marketing_manager' =>$marketing_manager,'technical_director'=>$technical_director,'CFO'=>$CFO,'CEO'=>$CEO,'hr_manager'=>$hr_managerDues,'finalValueOfManageTeam' => $totalOfManagementTeam,'finalValueOfOrders' => $finalValueOfManageTeam];
}
public function finalNetProfits()
{
    $managementTeam = $this->FourthStepManagmentTeam();
    $netProfit = $managementTeam['finalValueOfOrders'];
    return ['netProfit' => $netProfit];
}
private  function storeGeneralInventory ($order_ids,$totalRevenue,$netProfit,$totalFreelancerDues,$affiliateMarketersCommission,$sales_officer,$agentSalesCommission,$salesManagerDues,$marketing_manager,$technicalDirectorDues,$financialOfficerDues,$hr_managerDuesDues,$ceoRemuneration,$totalSetting,$franchiseId,$main_field)
    {

//         dd($totalSetting);
        $inventory = GeneralInventory::where('new_franchise_id', $franchiseId)
            ->where('totalSetting',$totalSetting)
            ->where('totalRevenue',$totalRevenue)
            ->first();
        $last_inventor = GeneralInventory::latest()->first();

        if(empty($inventory) ){
            $inventory = GeneralInventory::create([
                'orders_id' => json_encode($order_ids),
                'totalRevenue' => $totalRevenue,
                'netProfit' => $netProfit,
                'totalFreelancerDues' => $totalFreelancerDues,
                'affiliateMarketersCommission' => $affiliateMarketersCommission,
                'agentSalesCommission' => $agentSalesCommission,
                'salesOfficerCommission' => $sales_officer,
                'salesManagerDues' => $salesManagerDues,
                'marketing_manager' => $marketing_manager,
                'technicalDirectorDues' => $technicalDirectorDues,
                'financialOfficerDues' => $financialOfficerDues,
                'hr_managerDues' => $hr_managerDuesDues,
                'ceoRemuneration' => $ceoRemuneration,
                'totalSetting' => $totalSetting,
                'new_franchise_id' => $franchiseId,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'main_field' => $main_field,

            ]);

        }else
        {
            $delete_inventory = $inventory;
            if($last_inventor->id != $delete_inventory->id){
                $inventory = GeneralInventory::create([
                    'orders_id' => json_encode($order_ids),
                    'totalRevenue' => $totalRevenue,
                    'netProfit' => $netProfit,
                    'totalFreelancerDues' => $totalFreelancerDues,
                    'affiliateMarketersCommission' => $affiliateMarketersCommission,
                    'agentSalesCommission' => $agentSalesCommission,
                    'salesOfficerCommission' => $sales_officer,
                    'salesManagerDues' => $salesManagerDues,
                    'marketing_manager' => $marketing_manager,
                    'technicalDirectorDues' => $technicalDirectorDues,
                    'financialOfficerDues' => $financialOfficerDues,
                    'hr_managerDues' => $hr_managerDuesDues,
                    'ceoRemuneration' => $ceoRemuneration,
                    'totalSetting' => $totalSetting,
                    'new_franchise_id' => $franchiseId,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'main_field' => $main_field,
                ]);
                $delete_inventory->delete();
            }
            else
            {
                $inventory = $last_inventor;
            }

        }

        if($inventory){
            return $inventory;
        }
        return false;
    }
    public function AddInventoryData($inventory_id,$salesTeam,$managerTeam,$settingTeam,$marketing)
    {
        // dd($managerTeam);
        $inventoryData = InventoryData::create([
            'inventory_id' => $inventory_id,
            'sales_agent_salary' => $salesTeam->sales_agent_salary ?? 0,
            'sales_agent' => $salesTeam->sales_agent ?? 0,
            'sales_officer_salary' => $salesTeam->sales_officer_salary ?? 0,
            'sales_officer' => $salesTeam->sales_officer ?? 0,
    
            'sales_manager_salary' => $managerTeam->sales_manager_salary ?? 0,
            'sales_manager' => $managerTeam->sales_manager ?? 0,
            'marketing_manager_salary' => $managerTeam->marketing_manager_salary ?? 0,
            'marketing_manager' => $managerTeam->marketing_manager ?? 0,
            'technical_director_salary' => $managerTeam->technical_director_salary ?? 0,
            'technical_director' => $managerTeam->technical_director ?? 0,
            'CFO_salary' => $managerTeam->CFO ?? 0,
            'CFO' => $managerTeam->CFO ?? 0,
            'CEO_salary' => $managerTeam->CEO ?? 0,
            'CEO' => $managerTeam->CEO ?? 0,
            'hr_manager_salary' => $managerTeam->hr_manager_salary ?? 0,
            'hr_manager' => $managerTeam->hr_manager ?? 0,
           
            'marketing_level1' => $marketing->level1 ?? 0,
        ]);
          $inventorySettingData =[] ;
        foreach ($settingTeam as $setting)
        {
            $inventorySettingData = InventorySettingData::create([
               'inventory_id' => $inventory_id,
               'title' => $setting->title,
                'cost' => $setting->cost,
                'salary' => $setting->salary,
            ]);
        }
        if($inventoryData && $inventorySettingData){
            return [$inventoryData, $inventorySettingData];
        }
        return false;
    }

public function generateInventoryReport()
{
    try
    {
         $firstStep = $this->FirstStepMarketing();
        $orders = $firstStep['orders'];
        $franchiseId = Auth::user()->new_franchise_id;
        if(!empty($orders->first())){
    
            $order_ids =$firstStep['order_ids'];
            $thirdStep = $this->ThStepSetting();
            $fourthStep = $this->FourthStepManagmentTeam();
            $finalNetProfits = $this->finalNetProfits();
            $totalSetting = $thirdStep['setting'];
            $totalRevenue = $firstStep['totalOrder'];
            $totalFreelancerDues = $firstStep['freelances'];
    
            $affiliateMarketersCommission = $firstStep['marketingValue'];
            $profit = $totalRevenue - $totalFreelancerDues;
            $agentSalesCommission = $firstStep['salesAgent'];
            $sales_officer = $firstStep['salesOfficer'];
            $marketing_manager = $fourthStep['marketing_manager'];
            $salesManagerDues = $fourthStep['sales_manager'];
            $technicalDirectorDues = $fourthStep['technical_director'];
            $financialOfficerDues = $fourthStep['CFO'];
            $ceoRemuneration = $fourthStep['CEO'];
            $hr_managerDuesDues = $fourthStep['hr_manager'];
    
    // الميزانيات
            $netProfit = $finalNetProfits['netProfit'];
            $reportData = [
                'id' => $order_ids,
                'إجمالي الإيرادات' => $totalRevenue,
                'مستحقات المستقلين' => $totalFreelancerDues,
                'عمولة المسوقين بالعمولة' => $affiliateMarketersCommission,
                'عمولة وكيل المبيعات' => $agentSalesCommission,
                'عمولة مسؤول المبيعات' => $sales_officer,
                'إجمالي الميزانيات' => $totalSetting,
                'مستحقات مدير المبيعات' => $salesManagerDues,
                'مستحقات المدير التقني' => $technicalDirectorDues,
                'مستحقات المدير المالي' => $financialOfficerDues,
                'مستحقات المدير التنفيذي' => $ceoRemuneration,
                'مستحقات مدير التسويق' => $marketing_manager,
                'مستحقات مدير الموارد البشرية' => $hr_managerDuesDues,
                'صافي الربح' => $netProfit,
            ];
    //        dd($reportData);
            $main_field = [] ;
            $main_field =$orders->groupBy('main_field_id')->map(function ($fieldOrders) {
                return [
                    'title' => $fieldOrders->first()->mainField->title,
                    'value' => $fieldOrders->sum('cvalue')
                ];
            });
            $chartData = $this->prepareChartData($orders, $reportData);
            $inventory = $this->storeGeneralInventory($order_ids,$totalRevenue,$netProfit,$totalFreelancerDues,$affiliateMarketersCommission,$sales_officer,$agentSalesCommission,$salesManagerDues,$marketing_manager,$technicalDirectorDues,$financialOfficerDues,$hr_managerDuesDues,$ceoRemuneration,$totalSetting,$franchiseId,$main_field);
            $inventoryData = $this->AddInventoryData($inventory->id,$firstStep['salesTeam'],$fourthStep['managementTeam'],$thirdStep['settingTeam'],$firstStep['marketing_level1']);
// $inventory_id,$salesTeam,$managerTeam,$settingTeam,$marketing
            $orders->map(function ($value){
                $value->update(['status_inventory' => 'تم' ,'inventory_date' => Carbon::now()->format('Y-m-d H:i:s')]);
            });
            $date= $inventory->created_at;
            $title = "التقرير الشامل للشركة";
            $description = "تقرير مفصل يشمل جميع الجوانب المالية للشركة";
    
            return view('reports.comprehensive_inventory', compact('reportData', 'chartData', 'title', 'description','date'));
        }
        $notification = array(
            'message' => 'لا يوجد طلبات للجرد',
            'alert-type' => 'error'
        );
    
        return back()->with($notification);
    }catch (\Exception $exception)
        {

         
            $notification = array(
                'message' => $exception->getMessage(),
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }  
   

}
public function getAllInventories()
    {
        $title = 'جميع الجرود';
        $description = 'عرض جميع الجرود';
        $user = Auth::user();
        $inventories = GeneralInventory::where('new_franchise_id' ,$user->new_franchise_id)->get();
        return view('reports.all_inventories', compact('description','title','inventories'));
    }
    private function prepareChartData($orders, $reportData)
    {
        return [
            'revenueByField' => $orders->groupBy('main_field_id')->map(function ($fieldOrders) {
                return [
                    'title' => $fieldOrders->first()->mainField->title,
                    'value' => $fieldOrders->sum('cvalue')
                ];
            }),
            'expenseBreakdown' => collect($reportData)->except(['إجمالي الإيرادات', 'صافي الربح'])->toArray(),
            'profitOverview' => [
                'إجمالي الإيرادات' => $reportData['إجمالي الإيرادات'],
                'إجمالي المصروفات' => $reportData['إجمالي الإيرادات'] - $reportData['صافي الربح'],
                'صافي الربح' => $reportData['صافي الربح'],
            ],
        ];
    }
    public function showInventor($language,$id)
    {
        $general_inventory = GeneralInventory::findOrFail($id);
        $reportData = [
            'id' => $general_inventory->id,
            'إجمالي الإيرادات' => $general_inventory->totalRevenue,
            'مستحقات المستقلين' => $general_inventory->totalFreelancerDues,
            'عمولة المسوقين بالعمولة' => $general_inventory->affiliateMarketersCommission,
            'عمولة وكيل المبيعات' => $general_inventory->agentSalesCommission,
            'عمولة مسؤول المبيعات' => $general_inventory->salesOfficerCommission,
            'إجمالي الميزانيات' => $general_inventory->totalSetting,
            'مستحقات مدير المبيعات' => $general_inventory->salesManagerDues,
            'مستحقات المدير التقني' => $general_inventory->technicalDirectorDues,
            'مستحقات المدير المالي' => $general_inventory->financialOfficerDues,
            'مستحقات المدير التنفيذي' => $general_inventory->ceoRemuneration,
            'مستحقات مدير التسويق' => $general_inventory->marketing_manager,
            'مستحقات مدير الموارد البشرية' =>$general_inventory->hr_managerDues,
            'صافي الربح' => $general_inventory->netProfit,

        ];
        // dd($reportData);
        $date= $general_inventory->created_at;

        $datene =collect(json_decode($general_inventory->main_field));

        $chartData = [];
        $chartData['revenueByField']  = $datene->map( function($item){
            return [
                'title'=>$item->title,
                'value' => $item->value,
            ];

        });;
        $chartData['expenseBreakdown'] = collect($reportData)->except(['إجمالي الإيرادات', 'صافي الربح'])->toArray();

        $chartData['profitOverview'] = [
            'إجمالي الإيرادات' => $reportData['إجمالي الإيرادات'],
            'إجمالي المصروفات' => $reportData['إجمالي الإيرادات'] - $reportData['صافي الربح'],
            'صافي الربح' => $reportData['صافي الربح'],
        ];

        $title = "التقرير الشامل للشركة";
        $description = "تقرير مفصل يشمل جميع الجوانب المالية للشركة";

        return view('reports.show_inventory', compact('reportData',  'chartData','title', 'description','date'));

    }

    public function freelancesDetails($id)
    {
        $inventories = GeneralInventory::findOrFail($id);

        $orders = order::where('new_franchise_id',$inventories->new_franchise_id)->whereIn('id',json_decode($inventories->orders_id))->get();

        return ['orders' => $orders ,'inventories' => $inventories];
    }
    public function freelancesDetailsView($language,$id)
    {
        $title = 'مستحقات المستقلين';
        $description = 'مستحقات المستقلين';
        $free = $this->freelancesDetails($id);
        $orders= $free['orders'];
        // dd($orders);
        $inventories = $free['inventories'];
        $freelancerCommition =0;
        foreach($orders as $key => $order)
        {
           
            // dd($order);
            $freelancerIds = [];
            $totalCompensation = 0;

foreach (json_decode($order->freelancer_details, true) as $freelancer) {
    $freelancerId = $freelancer['id'];

    // Fetch the current and delivered orders for the freelancer from the database
    $freelancerRecord = DB::table('freelancers')
        ->select('freelancer_current_orders', 'freelancer_delivered_orders')
        ->where('id', $freelancerId)
        ->first();

$currentOrders = $freelancerRecord && $freelancerRecord->freelancer_current_orders
    ? json_decode(trim($freelancerRecord->freelancer_current_orders, '"'), true)
    : [];

$deliveredOrders = $freelancerRecord && $freelancerRecord->freelancer_delivered_orders
    ? json_decode(trim($freelancerRecord->freelancer_delivered_orders, '"'), true)
    : [];

// Ensure the decoded data is an array before counting
$currentOrdersCount = is_array($currentOrders) ? count($currentOrders) : 0;
$deliveredOrdersCount = is_array($deliveredOrders) ? count($deliveredOrders) : 0;

    // Check if the freelancer ID already exists in the data
    if (isset($freelancerData[$freelancerId])) {
        // Freelancer already exists, update compensation
        $freelancerData[$freelancerId]['compensation'] += $freelancer['compensation'];
    } else {
        // New freelancer, add to data with additional counts
        $freelancerData[$freelancerId] = [
            'id' => $freelancerId,
            'name' => $freelancer['name'],
            'compensation' => $freelancer['compensation'],
            'current_orders_count' => $currentOrdersCount,
            'delivered_orders_count' => $deliveredOrdersCount,
        ];
    }

    // Update the total compensation for the order
    $order['totalCompensation'] += $freelancer['compensation'];
}

        }
//   dd($freelancerData);


        return view('reports.details.freelancers',compact('orders','title','description','freelancerData','inventories'));

    }
    public function FreelancerOrderDetails($language,$id,$inverntore_id)
    {

        $title = 'مستحقات المستقلين';
        $description = 'مستحقات المستقلين';
        $user = Auth::user();
        $freelancers = Freelancer::where('id',$id)->first();
//        dd($freelancers);
        $inventories = GeneralInventory::where('id',$inverntore_id)->first();
        
        $freelancerOrders = FreelancerOrders::where('freelancer_id',$id)->whereIn('order_id',json_decode($inventories->orders_id))->with(['order'])->get();

        foreach($freelancerOrders as $freeOrder )
        {
            $order = Order::where('id',$freeOrder->order_id)->first();
            $freeOrder['salesAgent'] = User::where('id',$order->client->user_id)->first()->name;
            $freeOrder['client'] = Client::where('id',$order->client_id)->first()->name;
            $freeOrder['main_field'] = MainField::where('id',$order->main_field_id)->first()->title;
            $freeOrder['sub_field'] = SubField::where('id',$order->sub_field_id)->first()->title;   
        }
        // dd($freelancerOrders);
        $totalFreelancerOrder = $freelancerOrders->sum('recieve');
        return view('reports.details.freelancersOrderDetails',compact('title','totalFreelancerOrder','freelancerOrders','description','freelancers','inventories'));
    }
    public function MarketingOrderDetails($language,$id,$inverntore_id)
    {
        $title = 'مستحقات المسوق بالعموله';
        $description = 'مستحقات المسوق بالعموله';
        $clientsAtrs =ClientAttribution::where('id',$id)->with('previousClient')->first();
        // dd($clientsAtrs);
        $inventory = GeneralInventory::where('id',$inverntore_id)->first();
        $marketing = InventoryData::where('inventory_id',$inventory->id)->first();
//dd($marketing);
        $orders = Order::whereIn('id',json_decode($inventory->orders_id))->where('client_id',$clientsAtrs->existing_client_id)->get();
        foreach ($orders as $key => $order) {
                 $level1 = intval($marketing->marketing_level1) ?? 0;
            $order['clientValue'] = (intval($order->cvalue) * ($level1/100));
        }

        return view('reports.details.MarketingOrderDetails',compact('title','description','orders','clientsAtrs'));
    }
    public function marketingDetails($id)
    {
        $inventories = $this->freelancesDetails($id);
        $inventory = $inventories['inventories'];
        $orders = $inventories['orders'];
//dd($inventories['orders']);
        $marketing = InventoryData::where('inventory_id',$inventory->id)->first();
        $totalMarketingValue = 0;
        $checkClietns= [];
        $totalMarketing = 0;
//        $orders = $orders->whereIn('')
        foreach($orders as $order)
        {
            $clientid= [];
            $clientsAtrs =ClientAttribution::where('existing_client_id',$order->client_id)->with('previousClient')->first();
           
            if(!empty($clientsAtrs))
            {
                 $previousClient =ClientAttribution::where('previous_client_id',$clientsAtrs->previousClient->id)->count();
                //  $previousClientCount =$previousClient->count();
                //  dd($previousClient);
                $totalOrderClientsAtt = $order->cvalue;
                 $level1 = intval($marketing->marketing_level1) ?? 0;
                $clientid= $clientsAtrs->id;
                $market2 = $totalOrderClientsAtt * ($level1/100);
// dd($clientid);
                if (isset($checkClietns[$clientid]))
                {
                    $checkClietns[$clientid]['total'] +=  $market2;

                }else{
                    $checkClietns[$clientid] =
                        [
                            'id' => $clientid,
                            'name' => $clientsAtrs->previousClient->name,
                            'total' => $market2,
                            'marketing' => $level1,
                            'numberOfClients' => $previousClient,
                            'previousClientId' => $clientsAtrs->previous_client_id
                        ];
                }

            }else
            {
                $market2 = 0;

            }

            $totalMarketingValue +=$market2;


        }
//dd($totalMarketingValue);
        return ['orders' => $orders,'inventory' =>$inventory ,'marketing' => $marketing, 'inventories' => $inventories['inventories'],'valueOFMarketing' =>$totalMarketingValue,'ClientsAttr' =>$checkClietns];

    }
    public function marketingDetailsView($language,$id)
    {
        $mar = $this->marketingDetails($id);
        $inventory = $mar['inventory'];
        $orders = $mar['orders'];
        $ClientsAttr =$mar['ClientsAttr'];
        // dd($orders);
        // $marketing = $mar['marketing'];
        $title = 'عمولة المسوقين بالعمولة';
        $description = 'عمولة المسوقين بالعمولة';

        return view('reports.details.marketing',compact('orders','inventory','ClientsAttr','title','description'));

    }
    public function SalesAgentAndSalesOffier($id)
    {
        $mar = $this->marketingDetails($id);
        $orders = $mar['orders'];
        $inventory = $mar['inventory'];
//         dd($orders);
        $sales_team = InventoryData::where('inventory_id',$inventory->id)->first();
        $salesAgent = [];
        $salesOfficer = [];
        $totalSalesAgent =0;
        $totalSalesOfficer =0;

        foreach($orders as $order)
        {
            $clientId=[];
            $managerId=[];
            $order['salesAgent'] = User::where('id',$order->client->user_id)->first();
            $order['salesOfficer'] = User::where('id',$order['salesAgent']->manager_id)->first();
            $managerId = $order['salesOfficer']->id;
            $clientId = $order['salesAgent']->id;
            $valueOfFree = $order->cvalue - $order->fvalue ;
            $order['valueOfFree'] = $valueOfFree;
            $saleAgentValue = ($valueOfFree * ($sales_team->sales_agent/100)) ;
            $salesOfficerValue = ($valueOfFree * ($sales_team->sales_officer/100)) ;
            if(isset($salesAgent[$clientId]))
            {
                $salesAgent[$clientId]['total'] += $saleAgentValue;
            }else
            {
                $salesAgent[$clientId] =[
                    'id' => $clientId,
                    'name' => $order->salesAgent->name,
                    'total' => $saleAgentValue,
                    'cost' => $sales_team->sales_agent,
                    'salary' =>$sales_team->sales_agent_salary
                ];
            }
            $totalSalesAgent +=$saleAgentValue;
            $totalSalesOfficer +=$salesOfficerValue;
            if(isset($salesOfficer[$managerId]))
            {
                $salesOfficer[$managerId]['total'] += $salesOfficerValue;
            }else
            {
                $salesOfficer[$managerId] =[
                    'id' => $managerId,
                    'name' => $order->salesOfficer->name,
                    'total' => $salesOfficerValue,
                    'cost' => $sales_team->sales_officer,
                    'salary' => $sales_team->sales_officer_salary
                ];
            }
            $sales_team['salesAgent'] = $saleAgentValue;
            $sales_team['salesOfficer'] = $salesOfficerValue;

            $order['finalValueOFSalesAgentAndOfficer'] = $order->cvalue - ($order['value']+ $salesOfficerValue + $saleAgentValue);

        }
//        dd($salesAgent);
        $totalSalesAgentVlaue = $totalSalesAgent + $sales_team->sales_agent_salary;
        $totalSalesOfficerVlaue = $totalSalesOfficer + $sales_team->sales_officer_salary;
//        dd($totalSalesOfficerVlaue);
        $totalValueOFOrder =$orders->sum('fvalue') +$mar['valueOFMarketing'] + $totalSalesAgentVlaue + $totalSalesOfficerVlaue;
        $finalOrdersValue = $orders->sum('cvalue') - $totalValueOFOrder;
//        dd($finalOrdersValue);

        return ['orders'=>$orders ,'salesAgents' =>$salesAgent,'totalSalesOfficerValue'=>$totalSalesOfficerVlaue, 'totalSalesAgentVlaue' =>$totalSalesAgentVlaue ,'salesOfficers' =>$salesOfficer ,'finalValueOFOrder' => $finalOrdersValue,'inventory' =>$inventory];
    }
    public function SalesAgentView($language,$id)
    {
        $sales = $this->SalesAgentAndSalesOffier($id);
        // dd($sales);
        $inventory = $sales['inventory'];
        $salesAgents = $sales['salesAgents'];
        $title = 'عمولة وكيل المبيعات';
        $description = 'عمولة وكيل المبيعات';
        $totalSalesAgentValue = $sales['totalSalesAgentVlaue'];
        return view('reports.details.salesAgent',compact('inventory','totalSalesAgentValue','salesAgents','title','description'));
    }
    public function SalesAgentOrdersDetails($language,$id,$inventory_id)
    {
        $title = 'وكيل المبيعات';
        $description = 'وكيل المبيعات';
        $user =  User::where('id',$id)->first();
        $clients = Client::where('user_id',$user->id)->get();
        $inventory = GeneralInventory::where('id',$inventory_id)->first();
        $sales_team = InventoryData::where('inventory_id',$inventory->id)->first();

        $orders = Order::whereIn('id',json_decode($inventory->orders_id))->whereIn('client_id',$clients->pluck('id'))->get();
        $total = 0;
        foreach ($orders as $order) {
                $order['salesAgent'] = User::where('id',$order->client->user_id)->first()->name;
                $order['client'] = Client::where('id',$order->client_id)->first()->name;
                $order['main_field'] = MainField::where('id',$order->main_field_id)->first()->title;
                $order['sub_field'] = SubField::where('id',$order->sub_field_id)->first()->title;   
                $order['freelancerValue'] = $order->cvalue - $order->fvalue;
                $order['salesAgentTotal'] = ($order['freelancerValue'] * ($sales_team->sales_agent/100)) ;
                $total += $order['salesAgentTotal'];
        }
        $totalAgentValue = $orders->sum('salesAgentTotal') + $sales_team->sales_agent_salary;
        return view('reports.details.SalesAgentOrderDetails',compact('title','totalAgentValue','description','user','orders','total'));
    }
    public function SalesOffierView($language , $id)
    {
        // dd($id);
        $sales = $this->SalesAgentAndSalesOffier($id);
        $salesOfficers = $sales['salesOfficers'];
        $inventory = $sales['inventory'];
        $totalSalesOfficerValue = $sales['totalSalesOfficerValue'];
        $title = 'عمولة مسؤول المبيعات';
        $description = 'عمولة مسؤول المبيعات';
        return view('reports.details.salesOfficer',compact('inventory','totalSalesOfficerValue','salesOfficers','title','description'));

    }

    public function SalesOfficerOrdersDetails($language,$id,$inventory_id)
    {
        $title = 'وكيل المبيعات';
        $description = 'وكيل المبيعات';
        $user =  User::where('id',$id)->first();
        $agent = User::where('manager_id',$user->id)->get();
        $clients = Client::whereIn('user_id',$agent->pluck('id'))->get();
        $inventory = GeneralInventory::where('id',$inventory_id)->first();
        $sales_team = InventoryData::where('inventory_id',$inventory->id)->first();
//dd($agent);
        $orders = Order::whereIn('id',json_decode($inventory->orders_id))->whereIn('client_id',$clients->pluck('id'))->with('client')->get();
        $total = 0;
        foreach ($orders as $order) {
            $order['salesAgent'] = User::where('id',$order->client->user_id)->first()->name;
            $order['client'] = Client::where('id',$order->client_id)->first()->name;
            $order['main_field'] = MainField::where('id',$order->main_field_id)->first()->title;
            $order['sub_field'] = SubField::where('id',$order->sub_field_id)->first()->title;   
            $order['freelancerValue'] = $order->cvalue - $order->fvalue;
            $order['salesAgentTotal'] = ($order['freelancerValue'] * ($sales_team->sales_agent/100));
            $order['salesOfficerTotal'] = ($order['freelancerValue'] * ($sales_team->sales_officer/100)) ;
            $total += $order['salesOfficerTotal'];

        }
        // $totalagentValue = $orders->sum('salesOfficerTotal') + $sales_team->sales_officer_salary;
        $totalOfficerValue = $orders->sum('salesOfficerTotal') + $sales_team->sales_officer_salary;

//        dd($orders);
        return view('reports.details.SalesOfficerOrderDetails',compact('title','totalOfficerValue','description','user','orders','total','sales_team'));
    }
    public function settingDetailsView($langauge,$id)
    {
        $sales = $this->SalesAgentAndSalesOffier($id);
        $finalValueOFOrder =$sales['finalValueOFOrder'];
        $orders = $sales['orders'];
//        dd($finalValueOFOrder);
        $inventory = $sales['inventory'];

        $settings = InventorySettingData::where('inventory_id',$inventory->id)->get();
       $valueOfSetting = [];
       $totalSettingValue = 0;
       $settingId = [];
        foreach($settings as $setting)
        {
            $settingId = $setting->id;
            $totalsetting = ($finalValueOFOrder *($setting->cost/100)) + $setting->salary;
            if(isset($valueOfSetting[$settingId]))
            {
                $valueOfSetting[$settingId]['total'] += $totalsetting;
            }else
            {
                $valueOfSetting[$settingId]=[
                    'title' => $setting->title,
                    'cost' => $setting->cost,
                    'salary' => $setting->salary,
                    'total' => $totalsetting
                ];
            }
            $totalSettingValue += $totalsetting;
        }
//dd($totalSettingValue);
        $title = 'إجمالي الميزانيات';
        $description = 'إجمالي الميزانيات';
        return view('reports.details.setting',compact('valueOfSetting','totalSettingValue','title','description','finalValueOFOrder'));
    }

}
