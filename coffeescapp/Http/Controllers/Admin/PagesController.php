<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Traits\ImageUploadTrait;
use App\Traits\rolePermissionTrait;
use App\Utilities\AppConstants;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    use ImageUploadTrait;
    use rolePermissionTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         
        if(!$this->checkRolePermission('VIEW_PAGES_LIST'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
         
        try
        {
            $pages_all = Page::get();
            if($pages_all == "" || $pages_all == null ){
                $request->session()->flash('failPMsg','No pages found'); 
            }
            return view('auth.admin.pages.index' , compact('pages_all'));
        }
        catch(Exception $e)
        {
            $request->session()->flash('failPMsg','No pages found'); 
            return  view('auth.admin.pages.index' , compact('pages_all'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!$this->checkRolePermission('ADD_PAGES'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
       
        return view('auth.admin.pages.create');
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
            "title"        => "required",
            "excerpt"      => "required",
            "body"         => "required",
            "image"        => "required",
            "slug"         => "required",
            "meta_description" => "required",
            "meta_keywords"    => "required",
            "status"           => "required",
        ]);

        try
        {
            $stringTime = time();
            $imageName = $this->saveImageTrait($request->file('image') ,
            AppConstants::IMAGE_PATH_PAGE, AppConstants::IMAGE_THUMB_PATH_PAGE , $stringTime );
            $input['title']   = $request->title;
            $input['excerpt'] = $request->excerpt;
            $input['body']    = $request->body;
            $input['image']   = $imageName;
            $input['slug']    = $request->slug;
            $input['meta_description'] = $request->meta_description;
            $input['meta_keywords']    = $request->meta_keywords;
            $input['status'] = $request->status;
            $pageAdded = Page::create($input);
            $pageAdded;
            if(!empty($pageAdded)) {
                // upload image
                return back()->with('successMsg','Page has been added successfully.');
            }
            else{
                return back()->with('failMsg','Page has not been added.');
            }
        }
        catch(Exception $e)
        {
            return back()->with('failMsg','Unable to add  page. Please try again.');
            //return view('auth.admin/role/create')->with('successMsg','Unable to add  role. Please try again.');
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
        if(!$this->checkRolePermission('EDIT_PAGES'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        
        try
        {
            $pages_edit  = Page::find($id);
            if($pages_edit != null)
            {
                $data = array('info_pages' => $pages_edit);
                return view('auth.admin.pages.edit' , $data);
            }
            else
            {
                $data = array('info_pages' => $pages_edit);
                $request->session()->flash('failMsg','No Pages found');
                return view('auth.admin.pages.edit',$data);
            }
        }
        catch(Exception $e)
        {
            $request->session()->flash('failMsg','No Pages found');
            return view('auth.admin.pages.edit');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        
        $request->validate([
            "title"        => "required",
            "excerpt"      => "required",
            "body"         => "required",
            "slug"         => "required",
            "meta_description" => "required",
            "meta_keywords"    => "required",
            "status"           => "required"
        ]);

        try
        {
            $update_page_info['title']    =  $request->title;
            $update_page_info['excerpt']  =  $request->excerpt;
            $update_page_info['body']     =  $request->body;
            if($request->hasFile('image')){
                $stringTime = time();
                $imageName = $this->saveImageTrait($request->file('image') ,
                AppConstants::IMAGE_PATH_PAGE, AppConstants::IMAGE_THUMB_PATH_PAGE , $stringTime );
                $update_page_info['image'] = $imageName;
            }
            $update_page_info['slug'] = $request->slug;
            $update_page_info['meta_description']  =  $request->meta_description;
            $update_page_info['meta_keywords']     =  $request->meta_keywords;
            $update_page_info['status']  =  $request->status;
            $upd_page_result = (new Page)->updatePageInfo($update_page_info,$id);
            if($upd_page_result['success']) {
                return back()->with('successMsg','Page information is updated successfully.');
            }
            else
            {
                return back()->with('failMsg','Page information is not updated.');
            }
        }
        catch(Exception $e){
            return back()->with('failMsg','Page information is not updated.');
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
        
        if(!$this->checkRolePermission('DELETE_PAGES'))
        {
            return redirect('/admin/accessdenied/')->with('failPMsg','You do not have permission to access this page.');
        }
        
        
        try
        {
            if(isset($request->id) && $request->id != null && $request->id != '' ) 
            {
                $deleteImage = Page::find($request->id);
                // return print_r($delImage->image);
                $pageDeleted = Page::destroy($request->id);
                if($pageDeleted) {
                    $files =  AppConstants::IMAGE_PATH_PAGE.$deleteImage->image;
                     
                    if(File::exists($files) && ( $deleteImage->image != "" && $deleteImage->image != null)){
                        File::delete($files);
                    }
                    $files_thumb =  AppConstants::IMAGE_THUMB_PATH_PAGE.$deleteImage->image;
                    if(File::exists($files_thumb) && ( $deleteImage->image != "" && $deleteImage->image != null)){
                        File::delete($files_thumb);
                    }
                    session()->flash('successPMsg', 'Page deleted succesfully');
                }else{
                    session()->flash('failPMsg', 'Unable to delete Page');
                }
                return;
            }
            else
            {
                session()->flash('failPMsg', 'Unable to delete Page');
            }
            return;
        } 
        catch(Exception $e)
        {
            session()->flash('failPMsg', 'Unable to delete Page');
            return;
        }
    }

     
}
