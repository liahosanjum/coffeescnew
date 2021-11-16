<?php

namespace App\Http\Controllers;

use App\Models\OrderItems;
use App\Traits\settingsTrait;
use Exception;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    use settingsTrait;

    public function orderDetail(Request $request, $orderID)
    {
        $curr_currency = "";
        $shipping_cost = "";
        
        try
        {
            session()->get('loggedUserId');
            $myOrdersDetail = (new OrderItems)->getUserOrdersDetail($orderID , session()->get('loggedUserId'));
            //print_r($myOrdersDetail);exit;
            
            $dataOrderDetails = [
                'placedOrdersDetails' => $myOrdersDetail
            ];

            return view('orders.orderdetails' , $dataOrderDetails);
        }
        catch(Exception $e)
        {
            return view('orders.orderdetails');
        }
    }


}
