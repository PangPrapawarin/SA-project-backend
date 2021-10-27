<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appraisal;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppraisalController extends Controller
{
    public function create(Request $request)
    {
        $price = $request->input('price');
        $status = $request->input('status');
        $serial_number = Warranty::find($request->input('serial_number'));
        if ($serial_number !== null) {
            $warranty_start_date = Warranty::find($request->input('warranty_start_date'));
            $warranty_end_date = Warranty::find($request->input('warranty_end_date'));

            Appraisal::create([
                'price' => $price,
                'status' => $status,
                'serial_number' => $serial_number,
                'warranty_start_date' => $warranty_start_date,
                'warranty_end_date' => $warranty_end_date
            ]);
            return 'success';
        }
    }

    public function show()
    {
        $appraisal = DB::table('appraisals')
                        ->crossJoin('warranties')
                        ->get();
        return response()->json($appraisal);
    }

    public function showConfirmWorkOnly()
    {
        $appraisal = DB::table('appraisals')
                        ->crossJoin('warranties')
                        ->where('status', '=', 'confirm')
                        ->get();
        return response()->json($appraisal);
    }
}
