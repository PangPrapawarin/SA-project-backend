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

    public function create(Request $request, $invoice_id)
    {
        Invoice::findOrFail($invoice_id);
        $bill = Bill::create([
            'paid_date' => $request->input('paid_date'),
            'bill_status' => $request->input('bill_status'),
            'invoice_id' => $invoice_id
        ])->get();
        return response()->json(array(
            'data' => $bill
        ));
    }

    public function totalTime($id)
    {
        $time_total = Invoice::findOrFail($id)
        // $time_total = DB::table('invoices')
                        ->where('id', '=', $id)
                        ->get();
        //เวลาเรียกผ่านตัวแปรอื่นใน invoices ใช้ invoices_id น้า 
        return response()->json($time_total);
    }

    public function showWaitingToPayOnly($id)
    {
        $bill = Bill::findOrFail($id)
                    ->where('bill_status', '=', 'waiting to pay')
                    ->get();
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
        
        return "update success";
    }

}
