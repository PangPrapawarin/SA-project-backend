<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appraisal;
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

    public function show($id)
    {
        $bill = Bill::findOrFail($id);
        return response()->json(array(
            'data' => $bill
        ));
    }

}
