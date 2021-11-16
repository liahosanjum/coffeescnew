<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $cities = [

            [
                'city_name' => 'Islamabad',

                'city_code' => 'ISB',

                'country_id' => '1'
            ],
            [
                'city_name' => 'Peshawer',

                'city_code' => 'PSH',

                'country_id' => '1'
            ],
            [
                'city_name' => 'Ajman',

                'city_code' => 'AJ',

                'country_id' => '2'
            ],
            [
                'city_name' => 'Al-ainn',

                'city_code' => 'AAN',

                'country_id' => '2'
            ],
            [
                'city_name' => 'Makkah',

                'city_code' => 'MK',

                'country_id' => '3'
            ],
            [
                'city_name' => 'Madina',

                'city_code' => 'MD',

                'country_id' => '3'
            ]



        ];

        foreach ($cities as $key => $value) {

            City::create($value);

        }
    }
}
