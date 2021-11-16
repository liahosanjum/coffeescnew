<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\City;
use App\Models\UserDetails;
use DB;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Country;
use App\Models\Order;
use App\Models\OrderItems;
use Exception;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //
    public function login()
    {
        $title = 'Login';
        return view("user/login", compact('title') );
    }


    public function register()
    {
        $title = 'Registration';
        return view("auth/register" , compact('title'));
    }


    function create(Request $request)
    {
        $request->validate([
            "name"     => "required",
            "email"    => "required|email|unique:users",
            'mobile'   => 'required|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $step1['name']     = $request->name;
        $step1['email']    = $request->email;
        $step1['mobile']   = $request->mobile;
        $step1['password'] = Hash::make($request->password);
        $step1['status']   = 1;
        $request->session()->put('step1',$step1);
        return redirect('verifyMobile');
    }

    public function verifyMobile()
    {
        $data_step1 = session()->get('step1');
        return view('user.verifymobile', ["mobile" => $data_step1['mobile'] , "title" => 'Mobile Verification' ]);
    }

    public function verifyMobileSuccess(Request $request)
    {
        try
        {
            if(!session()->has('step1'))
            {
                return redirect('/');
            }
        
            $data_step2 = session()->get('step1');
            $user       = new User();
            $user->name     = $data_step2['name'];
            $user->email    = $data_step2['email'];
            $user->mobile   = $data_step2['mobile'];
            $user->password = $data_step2['password'];
            $user->status   = $data_step2['status'];
            $query = $user->save();
            
            if($query)
            {
                session()->pull('step1');
                $request->session()->flash('successMsg','You have been registered successfully.');
                return view('user/registrationsuccess');
            }
            else
            {
                $request->session()->flash('failMsg','Unable to register. Please try again');
                return view('user/registrationsuccess');
            }
        }
        catch(Exception $e)
        {
            $request->session()->flash('failMsg','Unable to register. Please try again');
            return view('user/registrationsuccess');
        }

    }






    function create_bk(Request $request)
    {
        $request->validate([
            "name"     => "required",
            "email"    => "required|email|unique:users",
            'mobile'   => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->mobile   = $request->mobile;
        $user->password = Hash::make($request->password);
        $user->status   = 1;
        $query = $user->save();
        if($query)
        {
            return back()->with('success','You have been registered successfully.');
        }
        else
        {
            return back()->with('fail','Unable to register.');
        }

    }


  


    public function profile(Request $request)
    {
        try
        {   
            if(session()->has('loggedUserId'))
            {
                $user_detail_info  = Auth::user();
                
                if($user_detail_info->id !="" && $user_detail_info->id != null)
                {
                    $data = ['loggedUserInfo' => $user_detail_info ];

                    return view('user/profile' , $data);
                } 
                else
                {
                   return  redirect()->back()->with('fail','Please provide valid user credentails.');
                }
            }
            else
            {
                return  redirect('login');
            }
        }
        catch(Exception $e)
        {
            return  redirect()->back()->with('fail','Unable to process your request. Please try again.');
        }
        
    }

    public function profile_custom(Request $request)
    {
        try
        {   
            if(session()->has('loggedUserId'))
            {
                $logged_user_email = session()->get('loggedUserEmail');
                $user_detail_info  = (new User)->getUserInfo($logged_user_email);
                if($user_detail_info['success'])
                {
                    $data = ['loggedUserInfo' => $user_detail_info['user_details'] ];
                    return view('user.profile' , $data);
                } 
                else
                {
                    return  redirect()->back()->with('fail','Pleaase provide valid user credentails.');
                }
            }
            else
            {
                return  redirect('login');
            }
        }
        catch(Exception $e)
        {
            return  redirect()->back()->with('fail','Unable to process your request. Please try again.');
        }
        
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function updateUser(Request $request)
    {
        try
        {
            $request->validate([
                "name"     => "required",
                "email"    => "required",
                'mobile'   => 'required',
            ]);
            
            $update_per_info['id']     =  session()->get('loggedUserId');
            $update_per_info['name']   =  $request->name;
            $update_per_info['email']  =  $request->email;
            $update_per_info['mobile'] =  $request->mobile;
            $user_upd_info = (new User)->updateUserInfo($update_per_info);
            return back()->with('successPMsg','User information updated successfully.');
        }
        catch(Exception $e)
        {
            return back()->with('failPMsg','Unable to process your request. Please try again.');
        }
    }

    

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getUserInfo(LoginRequest $request)
    {
        try 
        {
            $validUser = $request->authenticate();
            $request->session()->regenerate();
            if($validUser)
            {
                $userInfo = Auth::user();
                if(isset($userInfo->id) && $userInfo->id !="" && $userInfo->id != null)
                {
                    $request->session()->put('loggedUserId',$userInfo->id);
                    $request->session()->put('loggedUserEmail',$userInfo->email);
                    return redirect('profile');
                }
                else
                {
                    return back()->with('fail','Please provide valid user credentails.');
                }
            }
            else
            {
                return back()->with('fail','Please provide valid user credentails.');
            }
        }
        catch(Exception $e){
            return back()->with('fail','Unable to process your request. Please try again.');
        }
  
    }

    public function getUserInfo_cutom(Request $request)
    {
        try
        {
            $user = User::where(['email' => $request->email,'password' =>  MD5($request->password) , 'status' => 1 ] )->first();
            ///dd($user);
            if($user)
            {
                $request->session()->put('loggedUserId',$user->id);
                $request->session()->put('loggedUserEmail',$user->email);
                //d(session('loggedUser'));
                return redirect('profile');
            }
            else{
                return redirect()->back()->with('fail','Pleaase provide valid user credentails.');
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('fail','Unable to process your request. Please try again.');
        }
    }

    public function getShippingAddress(Request $request)
    {
        try
        {   
            $city_list = $this->getCityList();
            $country_list = $this->getCountryList();
            $logged_user_id = session()->get('loggedUserId');

            //getUserDetails
            $user_detail_info = (new UserDetails)->getUserDetailInfo($logged_user_id);
            // dd($user_detail_info);
            if($user_detail_info['success'])
            {
                $dataDetail = [
                    'loggedUserdetailInfo' => $user_detail_info['user_details'],
                    "city_list_all"        => $city_list , 
                    "country_list_all"     => $country_list
                ];
                return view('user.address' , $dataDetail);
            } 
            else
            {
                $dataDetail = [
                    'loggedUserdetailInfo' => '',
                    "city_list_all"        => $city_list , 
                    "country_list_all"     => $country_list
                ];
                return view('user.address' , $dataDetail);
            }
        }
        catch(Exception $e)
        {
            return back()->with('fail','Unable to process your request. Please try again.');
        }
        
    }


    

    public function updateShippingAddress(Request $request)
    {
        $request->validate([
            "address"  => "required",
            "country"  => "required",
            "city"     => "required",
        ]);

        try
        {
            $update_addr_info['user_id'] =  session()->get('loggedUserId');
            $update_addr_info['address'] =  $request->address;
            $update_addr_info['country'] =  $request->country;
            $update_addr_info['city']    =  $request->city;
            $update_addr_info['shipping-address']    =  $request->current_address_location;

            $chk_addr = $this->checkAddressPresent();
            if($chk_addr['success'])
            {
                $user_upd_info = (new UserDetails)->updateUserShipAddress($update_addr_info);
                if($user_upd_info['success'])
                {
                    return back()->with('successPMsg','User information updated successfully.');
                }
                else{
                    return back()->with('successPMsg','Nothing to update');
                }
            }
            else
            {
                $user_det           = new UserDetails();
                $user_det->user_id  = session()->get('loggedUserId');
                $user_det->address  = $request->address;
                $user_det->country_id = $request->country;
                $user_det->city_id    = $request->city;
                if($request->current_address_location !=""){
                    $user_det->shipping_address    = $request->current_address_location;
                }

                $qry_det_ins = $user_det->save();
                if($qry_det_ins)
                {
                    return back()->with('successPMsg','User information updated successfully.');
                }
            }
        }
        catch(Exception $e)
        {
            return back()->with('failPMsg','Unable to process your request. Please try again.');
        }
    }

    public function checkAddressPresent()
    {
        if(session()->has('loggedUserId')) 
        {
            return $usr_detail_info = (new UserDetails)->getUserDetailInfo(session()->get('loggedUserId'));
        }
    }

    
    public function getCities($id)
    {
        $cities = new City();
        $city_list_by_country = $cities->getCitiesListByCountry($id);
        return $city_list_by_country;
    }

    public function getCityList()
    {
        $cities = new City();
        $city_list = $cities->getCitiesList();
        return $city_list;
    }

    public function getCountryList()
    {
        $country = new Country();
        $country_list = $country->getCountriesList();
        return $country_list;
    }

    public function myOrder(Request $request)
    {
        try
        {
            session()->get('loggedUserId');
            $dataOrder = array();
            $myOrders = (new OrderItems)->getUserOrdersList(session()->get('loggedUserId'));
            if(count($myOrders) > 0 )
            {
                $dataOrder = [
                    'placedOrders' => $myOrders
                ];
                return view('user.myorder' , $dataOrder);
            }
            else
            {
                $request->session()->flash('failMyorder','No record found.');
                $dataOrder = [
                    'placedOrders' => $myOrders
                ];
                return view('user.myorder' , $dataOrder);
            }   
        }
        catch(Exception $e)
        {
           return view('user.myorder',$dataOrder);
        }
    }




}
