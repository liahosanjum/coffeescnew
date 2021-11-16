<?php
// app/OrderItem.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

use IlluminateDatabaseEloquentModel;

class OrderItems extends Model
{   
    use HasFactory;
    protected $table = 'order_items';

    

    public function getOrdersList()
    {
        $userOrderList = DB::table('order_items')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->join('users' , 'orders.user_id' , '=' ,'users.id' )
        ->select('users.name as username','users.email','order_items.order_id','orders.id',DB::raw('COUNT(*) AS total') , 'products.name','orders.total_amount','order_items.amount', 'order_items.quantity','order_status')
        
        ->groupBy('order_items.order_id')
        ->get();
        return $userOrderList;
    }

    public function getUserOrdersList($user_id)
    {
        $userOrderList = DB::table('order_items')
        ->join('orders', 'order_items.order_id', '=', 'orders.id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->select('order_items.order_id','orders.id',DB::raw('COUNT(*) AS total') , 'products.name','orders.total_amount','order_items.amount', 'order_items.quantity','order_status')
        ->where('orders.user_id' , $user_id )
        ->groupBy('order_items.order_id')
        
        ->get();

        return $userOrderList;
    }

    public function getUserOrdersDetail($orderid,$user_id)
    {
        $userOrderDetail = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->join('currency', 'orders.currency_id', '=', 'currency.id')
        ->select('orders.id' , 'orders.shipping_cost' , 'currency.code' , 'products.name','products.sku',
        'products.thumbnail','orders.total_amount','order_items.amount', 'order_items.quantity','order_status')
        ->where('orders.user_id' , $user_id )
        ->where('orders.id' , $orderid )
        ->get();

        return $userOrderDetail;
    }

    public function getOrdersDetail($orderid)
    {
        $userOrderDetail = DB::table('orders')
        ->join('order_items', 'orders.id', '=', 'order_items.order_id')
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->join('currency', 'orders.currency_id', '=', 'currency.id')
        ->select('orders.id' , 'orders.shipping_cost' , 'currency.code' , 'products.name','products.sku',
        'products.thumbnail','orders.total_amount','order_items.amount', 'order_items.quantity','order_status')
        
        ->where('orders.id' , $orderid )
        ->get();

        return $userOrderDetail;
    }

    
}