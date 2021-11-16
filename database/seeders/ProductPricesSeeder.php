<?php

namespace Database\Seeders;

use App\Models\ProductPrice;
use Illuminate\Database\Seeder;

class ProductPricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productprices = [

            [
                'product_id' => '1',
                'item_price' => '300',
                'currency_id' => '1'
            ],
            [
                'product_id' => '1',
                'item_price' => '100',
                'currency_id' => '2'
            ],

            [
                'product_id' => '2',
                'item_price' => '1500',
                'currency_id' => '1'
            ],
            [
                'product_id' => '2',
                'item_price' => '500',
                'currency_id' => '2'
            ],

            [
                'product_id' => '3',
                'item_price' => '1200',
                'currency_id' => '1'
            ],
            [
                'product_id' => '3',
                'item_price' => '400',
                'currency_id' => '2'
            ],

            [
                'product_id' => '4',
                'item_price' => '400',
                'currency_id' => '1'
            ],
            [
                'product_id' => '4',
                'item_price' => '150',
                'currency_id' => '2'
            ],
            [
                'product_id' => '5',
                'item_price' => '600',
                'currency_id' => '1'
            ],
            [
                'product_id' => '5',
                'item_price' => '200',
                'currency_id' => '2'
            ],

            [
                'product_id' => '6',
                'item_price' => '300',
                'currency_id' => '1'
            ],
            [
                'product_id' => '6',
                'item_price' => '900',
                'currency_id' => '2'
            ],

            [
                'product_id' => '7',
                'item_price' => '900',
                'currency_id' => '1'
            ],
            [
                'product_id' => '7',
                'item_price' => '300',
                'currency_id' => '2'
            ],

            [
                'product_id' => '8',
                'item_price' => '100',
                'currency_id' => '1'
            ],
            [
                'product_id' => '8',
                'item_price' => '30',
                'currency_id' => '2'
            ],



        ];

        foreach ($productprices as $key => $value) {
            ProductPrice::create($value);
        }
    }
}
