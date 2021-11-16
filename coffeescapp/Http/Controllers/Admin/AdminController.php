<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\rolePermissionTrait;
use App\Models\User;
use App\Models\Admin;

use DB;


class AdminController extends Controller
{
    use rolePermissionTrait;

    public function adminLogin(Request $request)
    {
        $title = 'Admin Login';
        return view("auth/admin/adminlogin", compact('title') );
    }


       /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminGetUserInfo(LoginRequest $request)
    {
        try 
        {
            $cred = $request->only('email', 'password','status');
            $validAdminUser = Auth::guard('admin')->attempt($cred);
            if($validAdminUser)
            {
                $userInfo = Auth::guard('admin')->user();
                if(isset($userInfo->id) && $userInfo->id !="" && $userInfo->id != null)
                {
                    $request->session()->put('adminLoggedUserId',$userInfo->id);
                    $request->session()->put('adminLoggedUserEmail',$userInfo->email);
                    $request->session()->put('adminLoggedUserName',$userInfo->name);
                    return redirect('/admin/adminprofile');
                }
                else
                {
                    return  redirect()->back()->with('fail','Pleaase provide valid user credentails.');
                }
            }
            else
            {
                return redirect()->back()->with('fail','Pleaase provide valid user credentails1234.');
            }
        }
        catch(Exception $e){
            return redirect()->back()->with('fail','Unable to process your request. Please try again.');
        }
    }

    
    public function adminProfile(Request $request)
    {
        try
        {   
            if(session()->has('adminLoggedUserId'))
            {
                $user_detail_info  = Auth::guard('admin')->user();
                if($user_detail_info->id !="" && $user_detail_info->id != null)
                {
                    $data = ['loggedUserInfo' => $user_detail_info ];
                    return view('auth/admin/adminprofile' , $data);
                } 
                else
                {
                   return  redirect()->back()->with('fail','Please provide valid user credentails.');
                }
            }
            else
            {
                return  redirect('/admin/adminlogin');
            }
        }
        catch(Exception $e)
        {
            return  redirect()->back()->with('fail','Unable to process your request. Please try again.');
        }
        
    }

    public function adminlogout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/adminlogin/');
    }

    public function noAccess(){

        return view('auth.admin.accessdenied.forbidden');
    }

   





    
}
