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

        ];

        foreach ($warranties as $warranty) {
            Warranty::create($warranty);
        }
    }
}
