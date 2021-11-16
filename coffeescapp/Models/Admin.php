<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redis;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table   = 'admins';
    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status'
    ];

    

    public function getUserInfo($user_email)
    {
        try
        {
            $user_info = null;
            $user = User::where('email', '=', $user_email)->first();
            if($user)
            {
                $user_info['user_details'] = $user;
                $user_info['success'] = true;
                return $user_info;
            }
            else
            {
                $user_info['user_details'] = null;
                $user_info['success'] = false;
                return $user_info;
            }
        }
        catch(QueryException $e)
        {
            $user_info['user_details'] = null;
            $user_info['success'] = false;
            return $user_info;
        }
    }

    

    

    public function updateUserInfo($info)
    {
        try
        {
            $upd_user =  $this->where(['id'=> $info['id']])->update( [
                'name'   => $info['name'],
                'email'  => $info['email'] ,
                'mobile' => $info['mobile'],
            ]);     
           
            if($upd_user){
                $upd_result['success'] = true;
                return;     
            }
            else
            {
                $upd_result['success'] = false;
                return;
            }
        }
        catch(Exception $e)
        {
            $upd_result['success'] = false;
            return;
        }
    }



    



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function userDetails()
    {
        return $this->hasOne(UserDetails::class);
    }
}
