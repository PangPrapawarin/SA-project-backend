<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Invoice;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function totalTime($id)
    {
        $time_total = Invoice::findOrFail($id);
        return response()->json(array(
            'data' => $time_total
        ));
    }

    public function showBeforePay(Request $request, $id)
    {
        $invoice = Invoice::findOrFail($id);
        $date_of_repair = $invoice->date_of_repair;
        $employee_name = $invoice->employee_name;
        $bill = Bill::create([
            'paid_date' => $request->input('paid_date'),
            'time_total' => $request->input('time_total'),
            'bill_status' => $request->input('bill_status'),
            'date_of_repair' => $date_of_repair,
            'employee_name' => $employee_name
        ])->get();
        return response()->json(array(
            'data' => $bill
        ));
    }

    public function showPaidOnly($id)
    {
        $bill = Bill::findOrFail($id)
                    ->where('bill_status', '=', 'paid')
                    ->get();
        return response()->json(array(
            'data' => $bill
        ));
    }

    public function updateStatusBill(Request $request, $id){
        $bill = Bill::findOrFail($id);
        $bill->bill_status = $request->input('bill_status');
        $bill->save();

        // if ($bill->bill_status == 'paid'){
        //     $sql_bill_type = $bill->type."_left";

        //     DB::update("update bill set ".$sql_bill_type." = ".$sql_bill_type. "- ".$bill->bill_status." where id = ".$bill->id);

        // }
        
        return "update success";
    }

}
