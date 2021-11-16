<?php

namespace App\Http\Controllers;

use App\Models\MenuItems;
use App\Utilities\AppConstants;
use Symfony\Component\HttpFoundation\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\UserDetails;
use App\Traits\menuItemTrait;
use App\Traits\settingsTrait;
use Exception;
use DB;
use Illuminate\Http\Request as HttpRequest;
use phpDocumentor\Reflection\Types\Null_;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response; 
 
 

 
class ProductController extends Controller
{
    use settingsTrait;
    
    /**

     * Write code on Method

     *

     * @return response()

     */

    public function index(Request $request)
    {
        $products = Product::all();
        $current_currency = $this->getCurrency($request);

        $products_all = DB::table('products')
        ->join('product_price', 'products.id', '=', 'product_price.product_id')
        ->Join('currency', 'product_price.currency_id', '=', 'currency.id')
        ->select('products.id','products.name','products.image','products.description','product_price.item_price',  'currency.code')
        ->where('currency.code', $current_currency)
        ->where('products.status', 'Active')
        ->get();

        /***************************/
         
        $dataProductAll = [
            'products_all' => $products_all
        ];
        return view('products', $dataProductAll);
    }

     


     
    public function productDetail(Request $request ,$id)
    {
        $products = Product::all();
        $current_currency = $this->getCurrency($request);
        
        $products_all = DB::table('products')
        ->join('product_price', 'products.id', '=', 'product_price.product_id')
        ->leftJoin('product_images', 'products.id', '=', 'product_images.product_id')
        ->Join('currency', 'product_price.currency_id', '=', 'currency.id')
        ->select('products.id','products.name','products.image',
        'product_images.detail_image', 'product_images.detail_thumbnail',
        'products.description','product_price.item_price',  'currency.code')
        ->where('currency.code', $current_currency)
        ->where('products.id' , $id)
        ->get();

        $productDetail['id']          =   $products_all[0]->id;
        $productDetail['name']        =   $products_all[0]->name;
        $productDetail['price']       =   $products_all[0]->item_price;
        $productDetail['price_code']       =   $products_all[0]->code;
        $productDetail['image']       =   $products_all[0]->image;
        $productDetail['description'] =   $products_all[0]->description;

         
        $i=0;
        $detailImages = array();
        foreach($products_all as $imageDetailList)
        {
            if($imageDetailList->detail_image !=""){
                $detailImages[$i]['detail_image']     = $imageDetailList->detail_image;
                $detailImages[$i]['detail_thumbnail'] = $imageDetailList->detail_thumbnail;
                $i++;
            }
        }
         
        return view('productdetail', [ 'product' => $productDetail , 'imagesDetails' => $detailImages ]);
    }

     

    public function placeOrder(Request $request)
    {
        try
        {
            $chkShipAddress = $this->getShipAddress();
            if($chkShipAddress == 0){
                return redirect('/shipaddress')->with('failMsg','Please add your shipping address.'); 
            }

            $orderItems   = session()->get('cart');
            $loggedUserId = session()->get('loggedUserId');
            if(!isset($loggedUserId) || $loggedUserId == "" || $loggedUserId == null ){
                return redirect('login')->with('fail','Please login to place order');
            }
             
            $i=0;
            $totalOrderAmount = 0;
            foreach(session()->get('cart') as $details)
            {
                $OrderAmount  = $details['price'] * $details['quantity'] ;
                $totalOrderAmount += $OrderAmount; 
            }

            $shipping_cost = $this->getShippingCost($request);
            

            $orderData = array();
            $orderData['user_id'] = $loggedUserId;
            $orderData['amount']  = $totalOrderAmount + $shipping_cost;
            $orderData['order_status'] = 1;

            $selected_currency = $this->getCurrencyID();
            


             

            $order_ins = new Order();
            $order_ins->user_id  = $orderData['user_id'];
            $order_ins->total_amount   = $orderData['amount'];
            $order_ins->order_status  = $orderData['order_status'];
            $order_ins->shipping_cost  = $shipping_cost;
            $order_ins->currency_id  = $selected_currency;
            $qry_order_ins = $order_ins->save();


            $order_last_inserted_id = $order_ins->id;
            
            
            if($qry_order_ins)
            {
                // Now populate order items table
                foreach(session()->get('cart') as $details)
                {
                    $order_ins_items = new OrderItems();
                    $order_ins_items->order_id   = $order_last_inserted_id;
                    $order_ins_items->product_id = $details['id'];
                    $order_ins_items->quantity   = $details['quantity'];
                    $order_ins_items->amount     = $details['price'];
                    $qry_order_ins_items = $order_ins_items->save();
                }
                if($qry_order_ins_items){
                    session()->pull('cart');
                    return redirect('/myorder')->with('successPMsg','Order has been placed successfully.');
                }
            }
            else
            {
                return redirect('/myorder')->with('failPMsg','Order has not been placed successfully.');
            }
        }
        catch(Exception $e){
            return redirect('/myorder')->with('failPMsg','Unable to process your request. Please try again.');
        }

    
    }

    public function getCurrencyID()
    {
        if(!empty(session()->get('cart')))
        {
            foreach(session()->get('cart') as $cval){
                if($cval['currency_id'] !=""){
                    return $cval['currency_id'];
                }
            }
        }
    }

   


  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function cart(Request $request)
    {
        $va = $request->cookies->get('currency');
        AppConstants::COOKIE_DEFAULT_CURRENCY_VALUE;
        
        return view('cart');
    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function addToCart(Request $request,$id)
    {
        $current_currency = $this->getCurrency($request);
        $products_add_to_cart = DB::table('products')
        ->join('product_price', 'products.id', '=', 'product_price.product_id')
        ->Join('currency', 'product_price.currency_id', '=', 'currency.id')
        ->select('currency.id as currency_id','products.id','products.name','products.image','products.thumbnail','products.description','product_price.item_price',  'currency.code')
        ->where('currency.code', $current_currency)
        ->where('products.id', $id)
        ->get();

        // print_r($products_add_to_cart);exit;
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
             $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id"       => $products_add_to_cart[0]->id,
                "name"     => $products_add_to_cart[0]->name,
                "quantity" => 1,
                "price"    => $products_add_to_cart[0]->item_price,
                "image"    => $products_add_to_cart[0]->image,
                "thumbnail"  => $products_add_to_cart[0]->thumbnail,
                "currency_id"  => $products_add_to_cart[0]->currency_id
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    


  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

  

    /**

     * Write code on Method

     *

     * @return response()

     */

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }




    public function setCurrency(Request $request) 
    {
        /* reset cart session  */
        session()->forget('cart');
        
        $value = $request->CR;
        $cookie = new Cookie('currency',$value, time() + 1000, '/', null, false, false);
        $res = new Response("setcookie");
        $res->headers->setCookie( $cookie );
        $res->sendHeaders();
        return redirect('/')->withCookie($cookie);
    }
  
    public function getShipAddress()
    {
        $user_ship_info = (new UserDetails)->getShippAddress(session()->get('loggedUserId'));
        return count($user_ship_info);
    }





}
