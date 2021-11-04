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
        Invoice::create([
            'start_fix' => $request->input('start_fix'),
            'end_fix' => $request->input('end_fix'),
            'invoice_status' => $request->input('invoice_status'),
            'employee_id' => $request->input('employee_id'),
            'appraisals_id' => $request->input('appraisals_id')
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
        
        return "update success";
    }

    public function updateDateWork(Request $request, $id){
        $invoice = Invoice::findOrFail($id);
        $invoice->start_fix = $request->input('start_fix');
        $invoice->end_fix = $request->input('end_fix');
        $invoice->save();
        
        return "update success";
    }
}
