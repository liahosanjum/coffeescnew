<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Admin;
use App\Models\AdminRole;

use App\Traits\rolePermissionTrait;
use Exception;
use DB;

class AssignRoleToUserController extends Controller
{
    use rolePermissionTrait;
    public function index(Request $request)
    {
        if(!$this->checkRolePermission('VIEW_ASSIGNROLE_LIST'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        $admin_assigned_roles_all = [];
        try
        {
            $admin_assigned_roles_all = DB::table('roles')
                ->join('admin_roles', 'roles.id', '=', 'admin_roles.role_id')
                ->join('admins', 'admin_roles.admin_id', '=', 'admins.id')
                ->select('roles.id as role_id','roles.name as role_name' ,'admins.*' , 'admin_roles.id as admin_role_id' )
                ->get();
            
            
            if($admin_assigned_roles_all == "" || is_null($admin_assigned_roles_all)) {
                $request->session()->flash('failPMsg','No roles found');
            }
            return view('auth.admin.assignroles.index' , compact('admin_assigned_roles_all'));
        }
        catch(Exception $e)
        {
            $request->session()->flash('failPMsg','No roles found'); 
            return  view('auth.admin.assignroles.index' , compact('admin_assigned_roles_all'));
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
        if(!$this->checkRolePermission('EDIT_ASSIGNROLE'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        } 
        $data['info_assigned_roles'] = [];
        try
        {
            $admin_assigned_roles_edit = DB::table('roles')
            ->join('admin_roles', 'roles.id', '=', 'admin_roles.role_id')
            ->Join('admins', 'admin_roles.admin_id', '=', 'admins.id')
            ->select('roles.id as role_id','roles.name as role_name' ,'admins.*' , 'admin_roles.id as admin_role_id' )
            ->where('admin_roles.id',$id)
            ->get();
             
            // exclude admin role
            $roles_all  = Role::where('id','!=',1)->get();
            $admin_users_all = Admin::get();
             

            
            if(count($roles_all)>0)
            {
                $data = array(
                    'info_assigned_roles' => $admin_assigned_roles_edit,
                    'info_roles' => $roles_all,
                    'admin_users_all' => $admin_users_all

                );
                
                return view('auth.admin.assignroles.edit' , $data);
            }
            else
            {
                $data = array(
                    'info_assigned_roles' => $admin_assigned_roles_edit,
                    'info_roles' => $roles_all,
                    'admin_users_all' => $admin_users_all
                );
                $request->session()->flash('failMsg','No information found');
                return view('auth.admin.assignroles.edit',$data);
            }
        }
        catch(Exception $e)
        {
             
            $request->session()->flash('failMsg','No information found');
            return view('auth.admin.assignroles.edit',$data);
        }
    }

    public function update(Request $request, $id)
    {
        try
        {
            $input = array();
            $input['admin_id']  = $request->admin_id;
            $input['role_id']  = $request->role_id;
            $checkRoleAllready = AdminRole::where('id' , '!=' , $id)
            ->where('admin_id', '=' , $request->admin_id)
            ->where('role_id', '=' , $request->role_id)->get();
            if(count($checkRoleAllready) > 0) {
                return back()->with('failMsg','Role already exits for current user.');
            }else {
                $isUpdated = AdminRole::where('id', $id)->update($input);
                if($isUpdated) {
                    return back()->with('successMsg','information is updated successfully.');
                } else {
                    return back()->with('failMsg','information is not updated.');
                }
            }
        }
        catch(Exception $e) {
            return back()->with('failMsg','information is not updated.');
        }
                
    }

    public function create(Request $request)
    {
        if(!$this->checkRolePermission('ADD_ASSIGNROLE')) {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }  
        $data['info_assigned_roles'] = [];
        try {
            // exclude admin role
            $roles_all  = Role::where('id','!=',1)->get();
            $admin_users_all = Admin::get();
            if(!is_null($roles_all) && $roles_all != '') {
                $data = array(
                    'info_roles' => $roles_all,
                    'admin_users_all' => $admin_users_all
                );
                return view('auth.admin.assignroles.create' , $data);
            } else {
                $data = array(
                    'info_roles' => $roles_all,
                    'admin_users_all' => $admin_users_all
                );
                $request->session()->flash('failMsg','No information found');
                return view('auth.admin.assignroles.create',$data);
            }
        }
        catch(Exception $e) {
            $request->session()->flash('failMsg','No information found');
            return view('auth.admin.assignroles.create',$data);
        }
   
    }

    public function store(Request $request)
    {
        $request->validate([
            "admin_id" => "required",
            'role_id'  => "required",
        ]);

        try
        {
            $check_role_already_present = AdminRole::where(['role_id' => $request->role_id, 'admin_id' => $request->admin_id])->pluck('id');
             

             
            if(count($check_role_already_present) == 0){
                $input = $request->all();
                $roleAdded = AdminRole::create($input);
                return back()->with('successMsg','Role has been assigned successfully.');
            }
            else
            {
                return back()->with('failMsg','Role has already been assigned to this user.');
            }

        }
        catch(Exception $e)
        {
            return back()->with('failMsg','Unable to process your request. Please try again.');
        }
    }
}
