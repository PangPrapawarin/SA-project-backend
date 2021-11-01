<?php

namespace Database\Seeders;

use App\Models\Bill;
use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bills = [
            [
                'paid_date' => "2021-10-31 21:22:13",
                'bill_status' => 'waiting to pay',
                'invoices_id' => 1,
            ],
            [
                'paid_date' => "2021-09-10 21:22:13",
                'bill_status' => 'paid',
                'invoices_id' => 2,
            ],
            [
                'paid_date' => "2021-10-22 21:22:13",
                'bill_status' => 'waiting to pay',
                'invoices_id' => 3,
            ]
        ];

        foreach ($bills as $bill) {
            Bill::create($bill);
        }
    }
}
