<?php

use App\Models\MenuItems;

/**
 * This is simple string function
 * 
 */

if(!function_exists('strUpperCaseHelper'))
{
    function strUpperCaseHelper($string)
    {
        return strtoupper($string);
    }
}

if(!function_exists('createMenuItemHelper'))
{
    function createMenuItemHelper()
    {
        $listMenu = MenuItems::get();
        // print_r($listMenu);exit;
        $menu = array();
        foreach($listMenu as $menu_list)
        {
            if($menu_list->parent_id == 0){
                $menu[$menu_list->id][] = $menu_list;
                 
            }
            else
            {
                $menu[$menu_list->parent_id][] = $menu_list;
                
            }
        }
         
       //print_r($menu);
        
         
       

        return $menu;
    }
}