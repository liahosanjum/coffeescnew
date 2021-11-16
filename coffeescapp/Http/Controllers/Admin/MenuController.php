<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\MenuItems;
use App\Traits\rolePermissionTrait;
use Exception;

class MenuController extends Controller
{
    use rolePermissionTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!$this->checkRolePermission('VIEW_MENU_LIST'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        $menuitems_all = [];
        try
        {
            $menuitems_all = MenuItems::get();
            if($menuitems_all == "" || is_null($menuitems_all)){
                $request->session()->flash('failPMsg','No menu items found'); 
            }
            return view('auth.admin.menu.index' , compact('menuitems_all'));
        }
        catch(Exception $e)
        {
            $request->session()->flash('failPMsg','No menu items found'); 
            return  view('auth.admin.menu.index' , compact('menuitems_all'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!$this->checkRolePermission('ADD_MENU'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        $menuitem_pid = [];
        $baseMenuItem = [];
        try
        {
            $baseMenuItem = Menu::get();
            // print_r($baseMenuItem);
            $menuitem_pid = MenuItems::select('id','title')->get();
            return view('auth.admin.menu.create' , compact('menuitem_pid','baseMenuItem'));
        }
        catch(Exception $e)
        {
            
            $request->session()->flash('failPMsg','No menu items found'); 
            return  view('auth.admin.menu.create' , compact('menuitem_pid'));
        
        }
       
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
            "title"  => "required",
            'url'    => "required",
            'target' => "required",
            'order'  => "required",
            'route'  => "required"
        ]);

        try
        {
            $input = $request->all();
            $menuAdded = MenuItems::create($input);
            return back()->with('successMsg','Menu Item has been added successfully.');
        }
        catch(Exception $e)
        {
            return back()->with('failMsg','Unable to add  Menu Item. Please try again.');
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
        if(!$this->checkRolePermission('EDIT_MENU'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        $data = [];
        $baseMenuItem = [];
        $menuitem_pid = [];
       
        try
        {
            $menuitem_edit  = MenuItems::find($id);
            $baseMenuItem = Menu::get();
            $menuitem_pid = MenuItems::select('id','parent_id','title')->get();
            //print_r($menuitem_pid);
            if(!is_null($menuitem_edit))
            {
                $info_menuitems = ''; 
                $data = array(
                    'info_menuitems' => $menuitem_edit,
                    'baseMenuItem' => $baseMenuItem,
                    'menuitem_pid' => $menuitem_pid,

                );
                return view('auth.admin.menu.edit' , $data);
            }
            else
            {
                $data = array(
                    'info_menuitems' => $menuitem_edit,
                    'baseMenuItem' => $baseMenuItem,
                );
                $request->session()->flash('failMsg','No Menu Items found');
                return view('auth.admin.menu.edit',$data);
            }
        }
        catch(Exception $e)
        {
            return view('auth.admin.menu.edit');
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
            "title"  => "required",
            'url'    => "required",
            'target' => "required",
            'order'  => "required",
            'route'  => "required"
        ]);
        try
        {
            $menu_item = new MenuItems();
            $input = array();

           
            $input['menu_id']= $request->menu_id;
            $input['parent_id']  = $request->parent_id;
            $input['title']  = $request->title;
            $input['url']    = $request->url;
            $input['target'] = $request->target;
            $input['order']  = $request->order;
            $input['route']  = $request->route;
            
            $isUpdated = $menu_item::where('id', $id)->update($input);
            if($isUpdated){
                return back()->with('successMsg','Menu Items information is updated successfully.');
            }
            else
            {
                return back()->with('failMsg','Menu Items information is not updated.');
            }
        }
        catch(Exception $e){
            return back()->with('failMsg','Menu Items information is not updated.'.$e);
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
        if(!$this->checkRolePermission('DELETE_MENU'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        try
        {
            if(isset($request->id) && (!is_null($request->id) && $request->id != '' )) 
            {
                MenuItems::destroy($request->id);
                session()->flash('successPMsg', 'Menu Item deleted succesfully');
            }
            else
            {
                session()->flash('failPMsg', 'Unable to delete Menu Item ');
            }
            return;
        } 
        catch(Exception $e)
        {
            session()->flash('failPMsg', 'Unable to delete Menu Item ');
            return;
        }
    }
}
