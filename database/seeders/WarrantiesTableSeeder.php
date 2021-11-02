<?php

namespace Database\Seeders;

use App\Models\Warranty;
use Illuminate\Database\Seeder;

class WarrantiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warranties = [
            [
                'warranty_start_date' => '2021-09-30',
                'warranty_end_date' => '2022-09-30',
                'customer_name' => "Pang",
                'product_id' => 1,
            ],
            [
                'warranty_start_date' => '2019-10-31',
                'warranty_end_date' => '2020-10-31',
                'customer_name' => "Ploy",
                'product_id' => 2,
            ],
            [
                'warranty_start_date' => '2018-06-30',
                'warranty_end_date' => '2019-06-30',
                'customer_name' => "Bank",
                'product_id' => 3,
            ]
        ];

        foreach ($warranties as $warranty) {
            Warranty::create($warranty);
        }
    }
}
