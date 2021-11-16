<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Traits\rolePermissionTrait;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    use rolePermissionTrait;
     
        
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$this->checkRolePermission('VIEW_ROLE_LIST'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        $roles_all = [];
        try
        {
            $roles_all = Role::where('id','!=',1)->get();
            
            if($roles_all == "" || is_null($roles_all)){
                $request->session()->flash('failPMsg','No roles found'); 
            }
            return view('auth.admin.role.index' , compact('roles_all'));
        }
        catch(Exception $e)
        {
            $request->session()->flash('failPMsg','No roles found'); 
            return  view('auth.admin.role.index' , compact('roles_all'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$this->checkRolePermission('ADD_ROLE'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        return view('auth.admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"         => "required",
            'display_name' => "required",
        ]);

        try
        {
            $input = $request->all();
            $roleAdded = Role::create($input);
            return back()->with('successMsg','Role has been added successfully.');
        }
        catch(Exception $e)
        {
            return back()->with('failMsg','Unable to add  role. Please try again.'.$e);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        if(!$this->checkRolePermission('EDIT_ROLE'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        $data['info_roles'] = [];
        try
        {
            $role_edit  = Role::find($id);
            if(!is_null($role_edit) && $role_edit != '')
            {
                $data = array(
                    'info_roles' => $role_edit
                );
                return view('auth.admin.role.edit' , $data);
            }
            else
            {
                $data = array(
                    'info_roles' => $role_edit
                );
                $request->session()->flash('failMsg','No Roles found');
                return view('auth.admin.role.edit',$data);
            }
        }
        catch(Exception $e)
        {
            $request->session()->flash('failMsg','No Roles found');
            return view('auth.admin.role.edit',$data);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "display_name" => "required",
        ]);
        try
        {
            $role = new Role();
            $input = array();
            $input['name']  = $request->name;
            $input['display_name']  = $request->display_name;
            $isUpdated = $role::where('id', $id)->update($input);
            if($isUpdated){
                return back()->with('successMsg','Roles information is updated successfully.');
            }
            else
            {
                return back()->with('failMsg','Roles information is not updated.');
            }
        }
        catch(Exception $e){
            return back()->with('failMsg','Roles information is not updated.');
        }
                
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(!$this->checkRolePermission('DELETE_ROLE'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        try
        {
            if(isset($request->id) && (!is_null($request->id)  && $request->id != '' )) 
            {
                
                $roleDeleted = Role::destroy($request->id);
                if($roleDeleted){
                    session()->flash('successPMsg', 'Role deleted succesfully');
                }else{
                    session()->flash('failPMsg', 'Unable to delete role');
                }
                return;
            }else{
                session()->flash('failPMsg', 'Unable to delete role');
            }
            return;
        } 
        catch(Exception $e)
        {
            session()->flash('failPMsg', 'Unable to delete role.');
            return;
        }
    }
}
