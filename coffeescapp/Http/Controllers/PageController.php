<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Traits\menuItemTrait;
use Exception;
class PageController extends Controller
{
    public function index(Request $request, $pageID)
    {
        $data['info_pages'] = [];
        try
        {
            $request->session()->forget('failPageMsg');
            $page_edit  = Page::where('slug',$pageID)->get();
            if(count($page_edit)>0)
            {
                $data = array(
                    'info_pages' => $page_edit
                );
                return view('pages.index' , $data);
            }
            else
            {
                $data = array(
                    'info_pages' => ''
                );
                $request->session()->flash('failPageMsg','No Page found');
                return view('pages.index',$data);
            }
        }
        catch(Exception $e)
        {
            $request->session()->flash('failPageMsg','No Page found');
            return view('pages.index',$data);
        }
    }

    
}
