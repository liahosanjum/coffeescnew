<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use App\Models\Permission;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [ 'id' => '12', 'name' => 'Admin', 'email'  => 'admin111@admin.com' , 'password'  => Hash::make('abc@1234'), 'status' => '1' , 'type' => 'admin' ],
            [ 'id' => '13', 'name' => 'Editor', 'email'  => 'editor@gmail.com' , 'password'  => Hash::make('abc@1234'), 'status' => '1' , 'type' => 'admin'   ]
            
        ];
        Admin::insert($admin);

        $roles = [
            [ 'id' => '1', 'name' => 'Admin', 'display_name'  => 'Administrator'  ],
            [ 'id' => '2', 'name' => 'Editor', 'display_name' => 'Editor'  ],
            [ 'id' => '3', 'name' => 'Reviewer', 'display_name' => 'Reviewer'  ]
        ];
        Role::insert($roles);

        $adminroles = [
            [ 'admin_id' => '12', 'role_id' => '1'  ],
            [ 'admin_id' => '13', 'role_id' => '2'  ],
            [ 'admin_id' => '13', 'role_id' => '3'  ]
        ];
         AdminRole::insert($adminroles);

        

         




        

         
    }
}
