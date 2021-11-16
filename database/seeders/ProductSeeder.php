<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductImages;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            
            [
                'id'       => 1, 
                'name'     => 'Coffee 1',
                 'sku'      =>  '1111111', 
                 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                 'image'    => '1111111.jpg', 
                 'thumbnail'=> '1111111.jpg', 
                 'status'   => 'Active'
            ],

            [
                'id'       => 2,
                'name'     => 'Coffee 2',
                'sku'      =>  '12121212', 
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image'    => '12121212.jpg', 
                'thumbnail'=> '12121212.jpg', 
                'status'   => 'Active'
           ],

           [
            'id'       => 3,
            'name'     => 'Coffee 3',
            'sku'      =>  '33333333', 
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'image'    => '33333333.jpg', 
            'thumbnail'=> '33333333.jpg', 
            'status'   => 'Active'
            ],

            [
                'id'       => 4,
                'name'     => 'Coffee 4',
                'sku'      =>  '44443333', 
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image'    => '44443333.jpg', 
                'thumbnail'=> '44443333.jpg', 
                'status'   => 'Active'
            ],

            [
                'id'       => 5,
                'name'     => 'Coffee 5',
                'sku'      =>  '55554444', 
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image'    => '55554444.jpg', 
                'thumbnail'=> '55554444.jpg', 
                'status'   => 'Active'
            ],

            [
                'id'       => 6,
                'name'     => 'Coffee 6',
                'sku'      =>  '66665555', 
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image'    => '66665555.jpg', 
                'thumbnail'=> '66665555.jpg', 
                'status'   => 'Active'
            ],

            [
                'id'       => 7,
                'name'     => 'Coffee 7',
                'sku'      =>  '66664444', 
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image'    => '66664444.jpg', 
                'thumbnail'=> '66664444.jpg', 
                'status'   => 'Active'
            ],

            [
                'id'       => 8,
                'name'     => 'Coffee 8',
                'sku'      =>  '88884444', 
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'image'    => '88884444.jpg', 
                'thumbnail'=> '88884444.jpg', 
                'status'   => 'Active'
            ]


        ];

  

        foreach ($products as $key => $value) {
            Product::create($value);
        }


        $detail_images = 
                [

                        ['id' => 43, 'product_id' => 1, 'detail_image' => '1111111_0.jpg', 'detail_thumbnail' => '1111111_0.jpg' ],
                        ['id' => 44, 'product_id' => 1, 'detail_image' => '1111111_1.jpg', 'detail_thumbnail' => '1111111_1.jpg'],
                        ['id' => 45, 'product_id' => 1, 'detail_image' => '1111111_2.jpg', 'detail_thumbnail' => '1111111_2.jpg'],
                        ['id' => 46, 'product_id' => 1, 'detail_image' => '1111111_3.jpg', 'detail_thumbnail' => '1111111_3.jpg' ],
                        ['id' => 47, 'product_id' => 2, 'detail_image' => '12121212_0.jpg', 'detail_thumbnail' => '12121212_0.jpg' ],
                        ['id' => 48, 'product_id' => 2, 'detail_image' => '12121212_1.jpg', 'detail_thumbnail' => '12121212_1.jpg' ],
                        ['id' => 49, 'product_id' => 2, 'detail_image' => '12121212_2.jpg', 'detail_thumbnail' => '12121212_2.jpg' ],
                        ['id' => 50, 'product_id' => 2, 'detail_image' => '12121212_3.jpg', 'detail_thumbnail' => '12121212_3.jpg' ],
                        ['id' => 51, 'product_id' => 3, 'detail_image' => '33333333_0.jpg', 'detail_thumbnail' => '33333333_0.jpg' ],
                        ['id' => 52, 'product_id' => 3, 'detail_image' => '33333333_1.jpg', 'detail_thumbnail' => '33333333_1.jpg' ],
                        ['id' => 53, 'product_id' => 3, 'detail_image' => '33333333_2.jpg', 'detail_thumbnail' => '33333333_2.jpg' ],
                        ['id' => 54, 'product_id' => 3, 'detail_image' => '33333333_3.jpg', 'detail_thumbnail' => '33333333_3.jpg' ],
                        ['id' => 63, 'product_id' => 4, 'detail_image' => '44443333_0.jpg', 'detail_thumbnail' => '44443333_0.jpg' ],
                        ['id' => 64, 'product_id' => 4, 'detail_image' => '44443333_1.jpg', 'detail_thumbnail' => '44443333_1.jpg' ],
                        ['id' => 65, 'product_id' => 4, 'detail_image' => '44443333_2.jpg', 'detail_thumbnail' => '44443333_2.jpg' ],
                        ['id' => 66, 'product_id' => 4, 'detail_image' => '44443333_3.jpg', 'detail_thumbnail' => '44443333_3.jpg' ],
                        ['id' => 67, 'product_id' => 5, 'detail_image' => '55554444_0.jpg', 'detail_thumbnail' => '55554444_0.jpg' ],
                        ['id' => 68, 'product_id' => 5, 'detail_image' => '55554444_1.jpg', 'detail_thumbnail' => '55554444_1.jpg' ],
                        ['id' => 69, 'product_id' => 5, 'detail_image' => '55554444_2.jpg', 'detail_thumbnail' => '55554444_2.jpg' ],
                        ['id' => 70, 'product_id' => 5, 'detail_image' => '55554444_3.jpg', 'detail_thumbnail' => '55554444_3.jpg' ],
                        ['id' => 71, 'product_id' => 6, 'detail_image' => '66665555_0.jpg', 'detail_thumbnail' => '66665555_0.jpg' ],
                        ['id' => 72, 'product_id' => 6, 'detail_image' => '66665555_1.jpg', 'detail_thumbnail' => '66665555_1.jpg' ],
                        ['id' => 73, 'product_id' => 6, 'detail_image' => '66665555_2.jpg', 'detail_thumbnail' => '66665555_2.jpg' ],
                        ['id' => 74, 'product_id' => 6, 'detail_image' => '66664444_0.jpg', 'detail_thumbnail' => '66664444_0.jpg' ],
                        ['id' => 75, 'product_id' => 7, 'detail_image' => '66664444_1.jpg', 'detail_thumbnail' => '66664444_1.jpg' ],
                        ['id' => 76, 'product_id' => 7, 'detail_image' => '66664444_2.jpg', 'detail_thumbnail' => '66664444_2.jpg' ],
                        ['id' => 77, 'product_id' => 7, 'detail_image' => '66664444_3.jpg', 'detail_thumbnail' => '66664444_3.jpg' ],
                        ['id' => 78, 'product_id' => 8, 'detail_image' => '88884444_0.jpg', 'detail_thumbnail' => '88884444_0.jpg' ],
                        ['id' => 79, 'product_id' => 8, 'detail_image' => '88884444_1.jpg', 'detail_thumbnail' => '88884444_1.jpg' ],
                        ['id' => 80, 'product_id' => 8, 'detail_image' => '88884444_2.jpg', 'detail_thumbnail' => '88884444_2.jpg' ],
                        ['id' => 81, 'product_id' => 8, 'detail_image' => '88884444_3.jpg', 'detail_thumbnail' => '88884444_3.jpg'],
                ];

                foreach ($detail_images as $key => $value) {
                    ProductImages::create($value);
                }    


    }
}
