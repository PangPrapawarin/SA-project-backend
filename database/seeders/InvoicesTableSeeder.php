<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Seeder;

class InvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $invoices = [
            [
                'date_of_repair' => '2021-10-31',
                'start_fix' => '2021-10-31 21:22:12',
                'end_fix' => "2021-10-31 21:22:13",
                'invoice_status' => 'in progress',
                'employee_id' => 1,
                'appraisal_id' => 1,
            ],
            [
                'date_of_repair' => '2021-09-01',
                'start_fix' => '2021-09-01 21:22:12',
                'end_fix' => "2021-09-10 21:22:13",
                'invoice_status' => 'in progress',
                'employee_id' => 2,
                'appraisal_id' => 2,
            ],
            [
                'date_of_repair' => '2021-10-15',
                'start_fix' => '2021-10-15 21:22:12',
                'end_fix' => "2021-10-22 21:22:13",
                'invoice_status' => 'in progress',
                'employee_id' => 3,
                'appraisal_id' => 3,
            ]
        ];

        foreach ($invoices as $invoice) {
            Invoice::create($invoice);
        }
    }
}
