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
        $appraisal_status = $request->input('appraisal_status');
        $detail = $request->input('detail');
        $serialNumber = Warranty::find('serial_number');
        if ($serialNumber !== null) {
            $serial_number = Warranty::find($request->input('serial_number'));
            $warranty_start_date = Warranty::find($request->input('warranty_start_date'));
            $warranty_end_date = Warranty::find($request->input('warranty_end_date'));
            $product_name = Warranty::find($request->input('product_name'));

            Appraisal::create([
                'price' => $price,
                'appraisal_status' => $appraisal_status,
                'detail' => $detail,
                'serial_number' => $serial_number,
                'warranty_start_date' => $warranty_start_date,
                'warranty_end_date' => $warranty_end_date,
                'product_name' => $product_name
            ]);
            return 'success';
        }
    }

    public function showWaitingWork()
    {
        $appraisal = DB::table('appraisals')
                        ->crossJoin('warranties')
                        ->where('appraisal_status', '=', 'waiting confirm')
                        ->get();
        return response()->json($appraisal);
    }

    public function showConfirmWork()
    {
        $appraisal = DB::table('appraisals')
                        ->crossJoin('warranties')
                        ->where('appraisal_status', '=', 'confirmed')
                        ->get();
        return response()->json($appraisal);
    }

    public function updateStatusAppraisal(Request $request, $id){
        $appraisal = Appraisal::findOrFail($id);
        $appraisal->appraisal_status = $request->input('appraisal_status');
        $appraisal->save();

        // if ($appraisal->status == 'confirmed'){
        //     $sql_appraisal_type = $appraisal->type."_left";

        //     DB::update("update work set ".$sql_appraisal_type." = ".$sql_appraisal_type. "- ".$appraisal->appraisal_status." where serial number = ".$appraisal->serial_number);

        // }
        
        return "update success";
    }
}
