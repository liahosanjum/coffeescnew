<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\PermissionRole;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

          
            ['id' => 1, 'key' => 'ADD_PAGES' ],
            ['id' => 2, 'key' => 'DELETE_PAGES' ],
            ['id' => 3, 'key' => 'EDIT_PAGES' ],
            ['id' => 4, 'key' => 'VIEW_PAGES_LIST'],

            ['id' => 5, 'key' => 'ADD_MENU' ],
            ['id' => 6, 'key' => 'DELETE_MENU' ],
            ['id' => 7, 'key' => 'EDIT_MENU' ],
            ['id' => 8, 'key' => 'VIEW_MENU_LIST'],

            ['id' => 9, 'key' => 'ADD_PERMISSION' ],
            ['id' => 10, 'key' => 'DELETE_PERMISSION' ], 
            ['id' => 11, 'key' => 'EDIT_PERMISSION' ],
            ['id' => 12, 'key' => 'VIEW_PERMISSION_LIST'],

          

            ['id' => 13, 'key' => 'ADD_ROLE' ],
            ['id' => 14, 'key' => 'DELETE_ROLE' ], 
            ['id' => 15, 'key' => 'EDIT_ROLE' ],
            ['id' => 16, 'key' => 'VIEW_ROLE_LIST'],

            ['id' => 17, 'key' => 'ADD_PRODUCT' ],
            ['id' => 18, 'key' => 'DELETE_PRODUCT' ], 
            ['id' => 19, 'key' => 'EDIT_PRODUCT' ],
            ['id' => 20, 'key' => 'VIEW_PRODUCT_LIST'],

            ['id' => 21, 'key' => 'ADD_ASSIGNROLE' ],
            ['id' => 22, 'key' => 'DELETE_ASSIGNROLE' ], 
            ['id' => 23, 'key' => 'EDIT_ASSIGNROLE' ],
            ['id' => 24, 'key' => 'VIEW_ASSIGNROLE_LIST'],

            ['id' => 25, 'key' => 'VIEW_ORDER_LIST'],

            
            
        ];

        foreach ($permissions as $key => $value) {
            Permission::create($value);
        }



        $permissionsRoles = [

          
            ['permission_id' => 1, 'role_id' => '1' ],
            ['permission_id' => 2, 'role_id' => '1' ],
            ['permission_id' => 3, 'role_id' => '1' ],
            ['permission_id' => 4, 'role_id' => '1'],

            ['permission_id' => 5, 'role_id' => '1' ],
            ['permission_id' => 6, 'role_id' => '1' ],
            ['permission_id' => 7, 'role_id' => '1' ],
            ['permission_id' => 8, 'role_id' => '1'],

            ['permission_id' => 9, 'role_id' => '1' ],
            ['permission_id' => 10, 'role_id' => '1' ], 
            ['permission_id' => 11, 'role_id' => '1' ],
            ['permission_id' => 12, 'role_id' => '1'],

          

            ['permission_id' => 13, 'role_id' => '1' ],
            ['permission_id' => 14, 'role_id' => '1' ], 
            ['permission_id' => 15, 'role_id' => '1' ],
            ['permission_id' => 16, 'role_id' => '1'],

            ['permission_id' => 17, 'role_id' => '1' ],
            ['permission_id' => 18, 'role_id' => '1' ], 
            ['permission_id' => 19, 'role_id' => '1' ],
            ['permission_id' => 20, 'role_id' => '1'],

            ['permission_id' => 21, 'role_id' => '1' ],
            ['permission_id' => 22, 'role_id' => '1' ], 
            ['permission_id' => 23, 'role_id' => '1' ],
            ['permission_id' => 24, 'role_id' => '1' ],
            ['permission_id' => 25, 'role_id' => '1' ],
            
        ];


        foreach ($permissionsRoles as $key => $value) {
            PermissionRole::create($value);
        }

    }
}
