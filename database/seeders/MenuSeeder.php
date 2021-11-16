<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuItems;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = [

            [ 'id' => '1' , 'name' => 'Front' ]
        ];

        foreach ($menu as $key => $value) {
            Menu::create($value);
        }

        $menuItems = [

            ['id' => 1,  'menu_id' => 1, 'title' => 'Home',            'url' => '/',                    'target' => '_blank',  'parent_id' => 0, 'order' =>  1,   'route' =>  '/', 'parameters' => ''],
            ['id' => 2,  'menu_id' => 1, 'title' => 'About Company',   'url' => '/',                    'target' => '_blank',  'parent_id' => 0, 'order' =>  5, 'route' =>  '/',  'parameters' => ''],
            ['id' => 7,  'menu_id' => 1, 'title' => 'Company Mission', 'url' => '/page/company-mission', 'target'=> '_blank',  'parent_id' => 2, 'order' =>  11,  'route' => 'company.mission', 'parameters' => ''],
            ['id' => 11, 'menu_id' => 1, 'title' => 'Company Vision',  'url' => '/page/company-vision', 'target' => '_blank',  'parent_id' => 2, 'order' =>  8,  'route' => 'company.vision', 'parameters' => ''],
            ['id' => 13, 'menu_id' => 1, 'title' => 'Hello World',     'url' => 'page/hello-world',     'target' => '_blank',  'parent_id' => 0, 'order' =>  7,  'route' => 'pages.index', 'parameters' =>''],
            ['id' => 15, 'menu_id' => 1, 'title' => 'About Us',        'url' => 'page/about-us',        'target' => '_blank',  'parent_id' => 0, 'order' =>  6, 'route' => 'page.about', 'parameters' => '']
        
        ];

        foreach ($menuItems as $key => $value) {
            MenuItems::create($value);
        }





    }
}
