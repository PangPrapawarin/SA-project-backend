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

        ];

        foreach ($appraisals as $appraisal) {
            Appraisal::create($appraisal);
        }
    }
}
