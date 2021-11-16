<?php
namespace App\Traits;
use Illuminate\Http\Request;
Use Image;
use Intervention\Image\Exception\NotReadableException;
use App\Utilities\AppConstants;
use App\Models\MenuItems;
use Exception;

trait menuItemTrait
{
    public function createMenuItem()
    {
        $listMenu = MenuItems::get();
        $menu = array();
        foreach($listMenu as $menu_list)
        {
            if($menu_list->parent_id == 0){
                $menu[$menu_list->id][] = $menu_list->title;
            }
            else
            {
                $menu[$menu_list->parent_id][] = $menu_list->title;
            }
        }
        return $menu;
    }
   
     



    
}