<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\UserDetails;

class CheckOutController extends Controller
{
    
    public function index(Request $request)
    {
        try
        {   
            if(session()->has('loggedUserEmail'))
            {
                $logged_user_email = session()->get('loggedUserEmail');
                $user_detail_info = (new User)->getUserInfo($logged_user_email);
                if($user_detail_info['success'])
                {
                    $request->session()->put('loggedUserId',$user_detail_info['user_details']->id);
                    $data = [
                        'loggedUserInfo' => $user_detail_info['user_details']
                        
                    ];
                    return view('checkout.index' , $data);
                } 
                else
                {
                    return back()->with('fail','Pleaase provide valid user credentails.');
                }
            }
            else
            {
                return back()->with('fail','Pleaase login with valid user credentails.');
            }
        }
        catch(Exception $e)
        {
            return back()->with('fail','Unable to process your request. Please try again.');
        }
    }



     
    public function shipAddress(Request $request)
    {
        try
        {
            if(session()->get('loggedUserId'))
            {
                $user_detail_info = (new UserDetails)->getUserAddressData(session()->get('loggedUserId'));
                if(isset($user_detail_info[0]->user_id) && $user_detail_info[0]->user_id != null )
                {
                    $dataDetail = [
                        'loggedUseraddressInfo' => $user_detail_info,
                    ];
                    return view('checkout.checkoutaddress' , $dataDetail);
                } 
                else
                {
                    $request->session()->flash('fail','Please add your shipping address information.'); 
                    return view('checkout.checkoutaddress');
                } 
            }
            else
            {
                return redirect('/login');
            }
        }
        catch(Exception $e)
        {
           return view('checkout.checkoutaddress')->with('fail','Please add your shipping address information.');
        }
    }

    public function getShipAddress(){
        
        $user_ship_info = (new UserDetails)->getShippAddress(session()->get('loggedUserId'));
        //dd(count($user_ship_info));
        return count($user_ship_info);
    }

    public function placeorder(Request $request)
    {
        return view('checkout.checkoutplaceorder');
    }
    






}
