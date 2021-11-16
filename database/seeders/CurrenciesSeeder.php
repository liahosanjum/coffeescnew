<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'id' => 1 ,'code' => 'QAR',
            ],
            [
                'id' => 2 ,'code' => 'USD',
            ]
        ];

        foreach ($currencies as $key => $value) {
            Currency::create($value);
        }

    }
}
