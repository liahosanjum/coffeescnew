<?php
namespace App\Traits;
use Illuminate\Http\Request;
Use Image;
use Intervention\Image\Exception\NotReadableException;
use App\Utilities\AppConstants;
use App\Models\MenuItems;
use Exception;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response; 

trait settingsTrait
{
    public function getCurrency(Request $request)
    {
        $value = $request->cookies->get('currency');
        if(!isset($value) || $value == "" || $value == null){
            $value = AppConstants::COOKIE_DEFAULT_CURRENCY_VALUE;
        }
        return $value;
    }

    public function getShippingCost(Request $request)
    {
        $ship_cost = $request->cookies->get('currency');
        if(!isset($ship_cost) || $ship_cost == "" || $ship_cost == null){
            $ship_cost = AppConstants::SHIPPING_COST_QAR;
        }
        else
        {
            if($ship_cost =='QAR'){
                $ship_cost = AppConstants::SHIPPING_COST_QAR;
            }
            else{
                $ship_cost = AppConstants::SHIPPING_COST_USD;
            }
        }
        return $ship_cost;
    }
}