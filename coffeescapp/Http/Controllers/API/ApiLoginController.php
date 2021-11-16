<?php

   

namespace App\Http\Controllers\API;

   

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Utilities\AppConstants;
use Illuminate\Http\Response as HTTPResponse;
use Validator;

   

class ApiLoginController extends BaseController
{
    /**

    * Login api
    *
    * @return \Illuminate\Http\Response
    */

    public function login(Request $request)
    {
        try
        {
            $validator = Validator::make($request->all(), [
                'email'    => 'required|string',
                'password' => 'required'
            ]);

            if($validator->fails()) {
                $success['success'] = false;
                $success['message'] = 'Please enter valid user credentials'; 
                return $this->sendErrorResponse($success, HTTPResponse::HTTP_UNAUTHORIZED); 
            }

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'status' => 1 ])){ 

                $user = Auth::user(); 
                $success['token'] =  "Bearer ".$user->createToken(AppConstants::API_APP_NAME)->accessToken; 
                $success['userInfo'] =  $user;
                $success['success'] = true;
                $success['message'] = 'User has been logged in successfully.'; 
                return $this->sendResponse($success);
            } 
            else
            { 
                $success['success'] = false;
                $success['message'] = 'Please enter valid user credentials'; 
                return $this->sendErrorResponse($success, HTTPResponse::HTTP_UNAUTHORIZED);
            } 
        }
        catch(Exception $e){
                $success['success'] = false;
                $success['message'] = 'Unable to process your request. Please try again'; 
                return $this->sendErrorResponse($success, HTTPResponse::HTTP_UNAUTHORIZED);
        }

    }

    

}
