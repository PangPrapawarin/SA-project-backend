<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Warranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarrantyController extends Controller
{
    public function create(Request $request, $product_id)
    {
        Product::findOrFail($product_id);
            Warranty::create([
                'warranty_start_date' => $request->input('warranty_start_date'),
                'warranty_end_date' => $request->input('warranty_end_date'),
                'customer_name' => $request->input('customer_name'),
                'product_id' => $product_id
            ]);
            return 'success';
    }

    public function getWarranty($serial_number) 
    {
        $warranty = DB::table('warranties')
                    ->where('serial_number', '=', $serial_number)
                    ->get();
        return $warranty;
    }

    public function destroy(Request $request)
    {
        $warranty = Warranty::find($request->input('serial_number'));
        $warranty->delete();
        return "remove success";
    }
}
