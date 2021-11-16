<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Exception;
use DB;
use App\Models\Role;
use App\Models\PermissionRole;

class AssignPermissionToRoleController extends Controller
{
    public function index(Request $request)
    {
        $permission_assigned_roles_all = [];
        try
        {
            $permission_assigned_roles_all = DB::table('permission_role')
                ->join('roles', 'roles.id', '=', 'permission_role.role_id')
                ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
                ->select('roles.id as role_id','roles.name as role_name' ,'permissions.*' ,
                 'permission_role.id as permrole_permission_id' )
                ->get();
            if($permission_assigned_roles_all == "" || is_null($permission_assigned_roles_all)) {
                $request->session()->flash('failPMsg','No roles found');
            }
            return view('auth.admin.assignpermrole.index' , compact('permission_assigned_roles_all'));
        }
        catch(Exception $e)
        {
            $request->session()->flash('failPMsg','No roles found'); 
            return  view('auth.admin.assignpermrole.index' , compact('permission_assigned_roles_all'));
        }
        
    }

    public function create(Request $request)
    {
        $data = [];
        try
        {
            $roles_all  = Role::get();
            $permissions_all = Permission::get();
            if(count($roles_all) > 0 )
            {
                $data = array(
                    'info_roles' => $roles_all,
                    'perm_users_all' => $permissions_all
                );
                return view('auth.admin.assignpermrole.create' , $data);
            }
            else
            {
                $data = array(
                   'info_roles' => $roles_all,
                    'perm_users_all' => $permissions_all
                );
                $request->session()->flash('failMsg','No information found');
                return view('auth.admin.assignpermrole.create',$data);
            }
        }
        catch(Exception $e)
        {
            $request->session()->flash('failMsg','No information found');
            return view('auth.admin.assignpermrole.create',$data);
        }
   
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        
        $data['info_assignedperm_roles'] = [];
        try
        {
            $permission_assigned_roles_edit = DB::table('permission_role')
                ->join('roles', 'roles.id', '=', 'permission_role.role_id')
                ->join('permissions', 'permission_role.permission_id', '=', 'permissions.id')
                ->select(
                            'roles.name as role_name' ,
                            'permissions.id' , 'permissions.key' , 
                            'permission_role.permission_id',
                            'permission_role.id as permrole_id',
                            'permission_role.role_id',
                 )
                ->where('permission_role.id',$id)
                ->get();
            
            $roles_all  = Role::get();
            $permissions_all = Permission::get();
            if(count($roles_all)>0)
            {
                $data = array(
                    'info_assignedperm_roles' => $permission_assigned_roles_edit,
                    'info_roles' => $roles_all,
                    'perm_users_all' => $permissions_all
                );
                return view('auth.admin.assignpermrole.edit' , $data);
            }
            else
            {
                $data = array(
                    'info_assignedperm_roles' => $permission_assigned_roles_edit,
                    'info_roles' => $roles_all,
                    'perm_users_all' => $permissions_all
                );
                $request->session()->flash('failMsg','No information found');
                return view('auth.admin.assignpermrole.edit',$data);
            }
        }
        catch(Exception $e)
        {
            $request->session()->flash('failMsg','No information found');
            return view('auth.admin.assignpermrole.edit',$data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "permission_id" => "required",
            'role_id'       => "required",
        ]);
        try
        {
            $check_permission_role_already_present = PermissionRole::where(['role_id' => $request->role_id, 'permission_id' => $request->permission_id])->pluck('id');
            if(count($check_permission_role_already_present) == 0){
                $input = $request->all();
                $roleAdded = PermissionRole::create($input);
                return back()->with('successMsg','Permission has been assigned to role successfully.');
            } else {
                return back()->with('failMsg','Permission has already assigned to this role');
            }
        }
        catch(Exception $e){
            return back()->with('failMsg','Unable to assigned permission to role.');
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $input = array();
            $input['permission_id']  = $request->permission_id;
            $input['role_id']  = $request->role_id;
            $checkPermRoleAllready = PermissionRole::where('id' , '!=' , $id)
                                ->where('permission_id', '=' , $request->permission_id)
                                ->where('role_id', '=' , $request->role_id)->get();
                                
            if(count($checkPermRoleAllready) > 0){
                return back()->with('failMsg','Permission already exits for selected role.');
            } else {
                $isUpdated = PermissionRole::where('id', $id)->update($input);
                if($isUpdated){
                    return back()->with('successMsg','Permission information is updated successfully.');
                } else {
                    return back()->with('failMsg','Permission information is not updated.');
                }
            }
        }
        catch(Exception $e) {
            return back()->with('failMsg','Permission information is not updated.');
        }
                
    }


}
