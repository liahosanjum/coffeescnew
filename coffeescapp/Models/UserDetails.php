<?php

namespace App\Models;

use App\Models\UserDetails as ModelsUserDetails;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class UserDetails extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function updateUserShipAddress($infoShip)
    {
        try
        {
            $up_ship_user =  $this->where(['user_id' => $infoShip['user_id']])->update( [

                'address' => $infoShip['address'],
                'country_id' => $infoShip['country'] ,
                'city_id'    => $infoShip['city'],
                'shipping_address' => $infoShip['shipping-address'],
            ]);   
            
            if($up_ship_user){
                $upd_result['success'] = true;
                return $upd_result;     
            }
            else
            {
                $upd_result['success'] = false;
                return $upd_result;
            }
        }
        catch(Exception $e)
        {
            $upd_result['success'] = false;
            return $upd_result;
        }
    }

    public function addUserShipAddress($addinfo) {

    }

    public function getUserAddressData($user_id){
        $usersAddressData = DB::table('user_details')
            ->join('countries', 'user_details.country_id', '=', 'countries.id')
            ->join('cities', 'user_details.city_id', '=', 'cities.id')
            ->join('users', 'user_details.user_id', '=', 'users.id')
            ->where('user_details.user_id' , $user_id )
            ->select('users.name','users.mobile','users.name','user_details.user_id','user_details.address','user_details.shipping_address', 'countries.country_name', 'cities.city_name')
            ->get();
        return $usersAddressData;
    }



    public function getUserDetailInfo($user_id)
    {
        try
        {
            $user_info = null;
            $userDetails = UserDetails::where('user_id', '=', $user_id)->first();
            if($userDetails)
            {
                $user_detail_info['user_details'] = $userDetails;
                $user_detail_info['success'] = true;
                return $user_detail_info;
            }
            else
            {
                $user_detail_info['user_details'] = null;
                $user_detail_info['success'] = false;
                return $user_detail_info;
            }
        }
        catch(QueryException $e)
        {
            $user_detail_info['user_details'] = null;
            $user_detail_info['success'] = false;
            return $user_detail_info;
        }
    }

    public function getShippAddress($user_id){
        $shippAddress = DB::table('users')
        ->join('user_details', 'user_details.user_id', '=', 'users.id')
        ->where('user_details.user_id' , $user_id )
        ->get();
        return $shippAddress;
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
