<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appraisal;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppraisalController extends Controller
{
    public function create(Request $request, $warranty_id)
    {
        $price = $request->input('price');
        $detail = $request->input('detail');
        Warranty::findOrFail($warranty_id);
            Appraisal::create([
                'price' => $price,
                'detail' => $detail,
                'warranties_id' => $warranty_id,
            ]);
            return 'success';
    }

    public function showWaitingWork()
    {
        $appraisal = DB::table('appraisals')
                        ->where('appraisal_status', '=', 'waiting confirm')
                        //เวลาเรียกผ่านตัวแปรอื่นใน warraties ใช้ warranties_id น้า 
                        ->get();
        return response()->json(array(
            'data' => $appraisal
        ));
    }

    public function showConfirmWork()
    {
        $appraisal = DB::table('appraisals')
                        ->where('appraisal_status', '=', 'confirmed')
                        //เวลาเรียกเรียกผ่านตัวแปรอื่นใน warraties ใช้ warranties_id น้า 
                        ->get();
        return response()->json(array(
            'data' => $appraisal
        ));
    }

    public function updateStatusAppraisal(Request $request, $id){
        $appraisal = Appraisal::findOrFail($id);
        $appraisal->appraisal_status = $request->input('appraisal_status');
        $appraisal->save();

        return "update success";
    }
}
