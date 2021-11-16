<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Utilities\AppConstants;
use Illuminate\Http\Response as HTTPResponse;
 

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
    */

    public function sendResponse($response , $code = HTTPResponse::HTTP_OK)
    {
        $response[AppConstants::HTTP_STATUS_CODE] = $code;
        return response()->json($response, HTTPResponse::HTTP_OK);
    }


    /**
    * return error response.
    *
    * @return \Illuminate\Http\Response
    */
    public function sendErrorResponse($error, $code =  HTTPResponse::HTTP_NOT_FOUND)
    {
        $error[AppConstants::HTTP_STATUS_CODE] = $code;
        $response = $error;
        return response()->json($response, $code);
    }

}