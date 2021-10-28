<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appraisal;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function create(Request $request)
    {
        $employee_name = User::find($request->input('employee_name'));
        $employee_id = User::find($request->input('employee_id'));
        $product_name = Appraisal::find($request->input('product_name'));
        Invoice::create([
            'employee_name' => $employee_name,
            'employee_id' => $employee_id,
            'product_name' => $product_name,
            'date_of_repair' => $request->input('date_of_repair'),
            'start_fix' => $request->input('start_fix'),
            'end_fix' => $request->input('end_fix'),
            'invoice_status' => $request->input('invoice_status')
        ]);
        return 'success';
    }

    public function show()
    {
        $users = DB::table('invoices')->get();
        return response()->json($users);
    }

    public function edit(Invoice $invoice)
    {
        //
    }

    public function updateStatusWork(Request $request, $id){
        $invoice = Invoice::findOrFail($id);
        $invoice->invoice_status = $request->input('invoice_status');
        $invoice->save();

        // if ($invoice->invoice_status == 'finished'){
        //     $sql_invoice_type = $invoice->type."_left";

        //     DB::update("update work set ".$sql_invoice_type." = ".$sql_invoice_type. "- ".$invoice->invoice_status." where serial number = ".$invoice->serial_number);

        // }
        
        return "update success";
    }
}
