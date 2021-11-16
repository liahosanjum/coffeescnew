<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AdminRolesSeeder::class);
        $this->call(MenuSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(CurrenciesSeeder::class);
        $this->call(ProductPricesSeeder::class);
        $this->call(PagesSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(CitiesSeeder::class);
        
    }
}
