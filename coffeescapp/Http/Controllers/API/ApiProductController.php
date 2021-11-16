<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Product;
use Validator;
use App\Http\Resources\Product as ProductResource;
use Exception;
use Illuminate\Http\Response as HTTPResponse;

class ApiProductController extends BaseController
{

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function index()
    {
        try
        {
            $products = Product::all();
            $success['success'] = true;
            $success['message'] = 'Products retrieved successfully'; 
            $success['data'] = ProductResource::collection($products);
            return $this->sendResponse($success);
        }
        catch(Exception $e){
            $success['success'] = false;
            $success['message'] = 'Unable to process your request. Please try again'; 
            return $this->sendErrorResponse($success, HTTPResponse::HTTP_UNAUTHORIZED);
        }
    }

    

   

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        try
        {
            $product = Product::find($id);
            if (is_null($product)) {
                return $this->sendError('Product not found.');
            }
            $success['success'] = true;
            $success['message'] = 'Product retrieved successfully.';
            $success['data'] = new ProductResource($product);
            return $this->sendResponse($success);

        }
        catch(Exception $e)
        {
            $success['success'] = false;
            $success['message'] = 'Unable to process your request. Please try again'; 
            return $this->sendErrorResponse($success, HTTPResponse::HTTP_UNAUTHORIZED);
        }
    }

    public function apiLogout(Request $request){
        $request->user()->token()->revoke();
        $success['success'] = true;
        $success['message'] = 'User has been logged out successfully.'; 
        return $this->sendResponse($success);
    }



    

    
}