<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api');    
    // }

    public function totalTime()
    {
        // $time_total = Invoice::findOrFail($id);
        $time_total = DB::table('invoices')
                        // ->where('id', '=', $id)
                        ->get();
        //เวลาเรียกผ่านตัวแปรอื่นใน invoices ใช้ invoices_id น้า 
        return response()->json($time_total);
    }

    public function showBeforePay(Request $request, $invoices_id)
    {
        $invoice = Invoice::findOrFail($invoices_id);
        //เวลาเรียกผ่านตัวแปรอื่นใน invoices ใช้ invoices_id น้า 
        $bill = Bill::create([
            'paid_date' => $request->input('paid_date'),
            'time_total' => $request->input('time_total'),
            'bill_status' => $request->input('bill_status'),
        ])->get();
        return response()->json(array(
            'data' => $bill
        ));
    }

    public function showPaidOnly($bills_id)
    {
        $bill = Bill::findOrFail($bills_id)
                    ->where('bill_status', '=', 'paid')
                    ->get();
        return response()->json(array(
            'data' => $bill
        ));
    }

    public function updateStatusBill(Request $request, $bills_id){
        $bill = Bill::findOrFail($bills_id);
        $bill->bill_status = $request->input('bill_status');
        $bill->save();
        
        return "update success";
    }

}
