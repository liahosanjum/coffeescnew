<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $countries = [

            [
                'country_name' => 'Pakistan',

                'country_code' => 'PK',

                'status' => 'Active'
            ],
            [
                'country_name' => 'Dubai',

                'country_code' => 'DXB',

                'status' => 'Active'
            ],
            [
                'country_name' => 'Saudi Arabia',

                'country_code' => 'SA',

                'status' => 'Active'
            ]



        ];

        foreach ($countries as $key => $value) {
            Country::create($value);
        }
    }
}
