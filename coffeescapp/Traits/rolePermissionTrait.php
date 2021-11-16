<?php
namespace App\Traits;
use Illuminate\Http\Request;
Use Image;
use Intervention\Image\Exception\NotReadableException;
use App\Utilities\AppConstants;
use App\Models\AdminRole;
use App\Models\MenuItems;
use App\Models\PermissionRole;
use App\Models\Permission;

use Exception;
use Illuminate\Support\Facades\Auth;

trait rolePermissionTrait
{
    public function getUserRole()
    {
        $logged_admin_roles = array();
        try
        {
            $admin_user = Auth::guard('admin')->user();
            $chk_admin_role = AdminRole::where('admin_id',$admin_user->id)->pluck('role_id');
            if(count($chk_admin_role) > 0)
            {
                $q=0;
                $logged_admin_roles = array();
                foreach($chk_admin_role as $admin_chk_role){
                    $logged_admin_roles[$q] = $admin_chk_role;
                    $q++;
                }
                return $logged_admin_roles;
            }else{
                return $logged_admin_roles;
            }
        }
        catch(Exception $e){
            return $logged_admin_roles;
        }
    }

    public function getRolesPermission()
    {
        $logged_user_Permission = array();
        try
        {
            $role_current_logged_user = $this->getUserRole();
            $role_current_logged_user;
            $rolePermissions = PermissionRole::whereIn('role_id' , $role_current_logged_user)->pluck('permission_id') ;
            $p=0;
            foreach($rolePermissions as $role_permission){
                $logged_user_Permission[$p] = $role_permission;
                $p++;
            }
            return $logged_user_Permission;
        }
        catch(Exception $e){
            return $logged_user_Permission;
        }
    }

    public function checkRolePermission($permission)
    {
        try
        { 
            $logged_user_perm = $this->getRolesPermission();
            $roleHasPermissions = Permission::whereIn('id' , $logged_user_perm)->get();
            // if(!empty($roleHasPermissions[0]))
            if(count($roleHasPermissions) > 0)
            {
                $rp = 0;
                $validatePermission = array();
                foreach($roleHasPermissions as $role_permission){
                    $validatePermission[$rp] = $role_permission['key'];
                    $rp++;
                }
                if(in_array($permission, $validatePermission)){
                    return true;
                }
                return false;
            }
            return false;
        }
        catch(Exception $e)
        {
            return false;
        }
    }
   
     



    
}