<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItems;
use App\Traits\rolePermissionTrait;
use App\Traits\settingsTrait;
use Exception;

class AdminOrderController extends Controller
{
    use settingsTrait;
    use rolePermissionTrait;
    public function index(Request $request)
    {
        $dataOrder = [];
        if(!$this->checkRolePermission('VIEW_ORDER_LIST'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        try
        {
            $myOrders = (new OrderItems)->getOrdersList();
            if(count($myOrders) > 0){
            $dataOrder = [
                'placedOrders' => $myOrders
            ];
            return view('auth.admin.user.myorder' , $dataOrder);
             }else{
                $request->session()->flash('failMyorder','No record found.');
                $dataOrder = [
                    'placedOrders' => $myOrders
                ];
                return view('auth.admin.order.myorder' , $dataOrder);
            }
        }
        catch(Exception $e){
            return view('auth.admin.order.myorder' , $dataOrder);
        }

    }

    public function orderDetail(Request $request, $orderID)
    {
        if(!$this->checkRolePermission('VIEW_ORDER_LIST')){
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        try
        {
            $myOrdersDetail = (new OrderItems)->getOrdersDetail($orderID);
            $dataOrderDetails = [
                'placedOrdersDetails' => $myOrdersDetail
                 
            ];
            return view('auth.admin.order.orderdetails' , $dataOrderDetails);
        }
        catch(Exception $e)
        {
            return view('auth.admin.order.orderdetails');
        }
    }
}
