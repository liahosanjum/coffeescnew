<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Traits\rolePermissionTrait;
use Exception;

class PermissionsController extends Controller
{
    use rolePermissionTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$this->checkRolePermission('VIEW_PERMISSION_LIST'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        $permissions_all = [];
        try
        {
            $permissions_all = Permission::get();
            if($permissions_all == "" || is_null($permissions_all)){
                $request->session()->flash('failPMsg','No Permissons found'); 
            }
            return view('auth.admin.permissions.index' , compact('permissions_all'));
        }
        catch(Exception $e)
        {
            $request->session()->flash('failPMsg','No Permissons found'); 
            return  view('auth.admin.permissions.index' , compact('permissions_all'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$this->checkRolePermission('ADD_PERMISSION'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        return view('auth.admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "key" => "required"
        ]);

        try
        {
            $input = $request->all();
            $isPerPresent = Permission::where('key', $request->key)->get();
            if(count($isPerPresent) == 0 ){
                $permAdded = Permission::create($input);
                return back()->with('successMsg','Permission has been added successfully.');
            } else {
                return back()->with('failMsg','Unable to add  permission.Permission already present.');
            }
        }
        catch(Exception $e)
        {
            return back()->with('failMsg','Unable to add  permission. Please try again.');
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
        if(!$this->checkRolePermission('EDIT_PERMISSION'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        $data['info_permissions'] = [];
        try
        {
            $permissions_edit  = Permission::find($id);
            if(!is_null($permissions_edit ) && $permissions_edit != ""  )
            {
                $data = array('info_permissions' => $permissions_edit);
                return view('auth.admin.permissions.edit' , $data);
            }
            else
            {
                $data = array('info_permissions' => $permissions_edit);
                $request->session()->flash('failMsg','No Permissions found');
                return view('auth.admin.permissions.edit',$data);
            }
        }
        catch(Exception $e)
        {
            $request->session()->flash('failMsg','No Permissions found.');
            return view('auth.admin.permissions.edit',$data);
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
        $request->validate(["key" => "required"]);
        try
        {
           
            $input = array();
            $input['key']  = $request->key;
            $isUpdated = Permission::where('id', $id)->update($input);
            if($isUpdated){
                return back()->with('successMsg','Permissions information is updated successfully.');
            }
            else
            {
                return back()->with('failMsg','Permissions information is not updated.');
            }
        }
        catch(Exception $e){
            return back()->with('failMsg','Permissions information is not updated.');
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
        if(!$this->checkRolePermission('DELETE_PERMISSION'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        try
        {
            if(isset($request->id) && (!is_null($request->id ) && $request->id != '' )) 
            {
                $perm_deleted = Permission::destroy($request->id);
                if($perm_deleted) {
                    session()->flash('successPMsg', 'Permission deleted succesfully');
                }
                else {
                    session()->flash('failPMsg', 'Unable to delete Permission');
                }
                return;
            } 
            else {
                session()->flash('failPMsg', 'Unable to delete Permission');
            }
            return;
        } 
        catch(Exception $e)
        {
            session()->flash('failPMsg', 'Unable to delete Permission');
            return;
        }
    }
}
