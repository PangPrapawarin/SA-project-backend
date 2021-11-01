<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
                'model' => 'Sharp',
                'color' => 'Grey',
                'product_name' => "Air Dryer Limited Series",
                'serial_number' => 'AD00000001',
            ],
            [
                'model' => 'Dyson',
                'color' => 'Black',
                'product_name' => "Air Dryer Sally",
                'serial_number' => 'AD00000002',
            ],
            [
                'model' => 'Mitzu',
                'color' => 'White',
                'product_name' => "Air Dryer x Line",
                'serial_number' => 'AD00000003',
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
