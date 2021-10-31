<?php

namespace Database\Seeders;

use App\Models\Appraisal;
use Illuminate\Database\Seeder;

class AppraisalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $appraisals = [
            [
                'price' => 1500,
                'appraisal_status' => 'confirmed',
                'detail' => "It's broken",
                'warranty_id' => 1,
            ],
            [
                'price' => 3000,
                'appraisal_status' => 'waiting confirm',
                'detail' => "kea yak jai tang",
                'warranty_id' => 2,
            ],
            [
                'price' => 0,
                'appraisal_status' => 'waiting confirm',
                'detail' => "som len len",
                'warranty_id' => 3,
            ]
        ];

        foreach ($appraisals as $appraisal) {
            Appraisal::create($appraisal);
        }
    }
}
