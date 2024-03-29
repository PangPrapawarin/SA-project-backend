<?php

use App\Http\Controllers\Api\AppraisalController;
use App\Http\Controllers\Api\BillController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\WarrantyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//User route
Route::get('/user/all-users', [UserController::class, 'show']);
Route::get('/user/{id}', [UserController::class], 'getUser');
Route::post('/user/create-employee', [UserController::class], 'create');
Route::post('/user/remove-employee', [UserController::class], 'destroy');

//Warranty route
Route::get('/warranty/{serial_number}', [WarrantyController::class], 'getWarranty');
Route::post('/warranty/create-warranty/{warranty_id}', [WarrantyController::class], 'create'); //ไม่น่าต้องใช้นะเพราะเราไม่สร้าง warranty
Route::post('/warranty/remove-warranty', [WarrantyController::class], 'destroy');

//Appraisal route
Route::get('/appraisal/waiting', [AppraisalController::class, 'showWaitingWork']);
Route::get('/appraisal/confirmed', [AppraisalController::class, 'showConfirmWork']);
Route::post('/appraisal/create-appraisal/{id}', [AppraisalController::class, 'create']);
Route::post('/appraisal/update-status/{id}', [AppraisalController::class, 'updateStatusAppraisal']);

//Invoice route
Route::get('/invoice/all-works', [InvoiceController::class, 'show']);
Route::post('/invoice/create-work', [InvoiceController::class], 'create');
Route::post('/invoice/update-status', [InvoiceController::class], 'updateStatusWork');

//Bill route
Route::get('/bill/paid/{id}', [BillController::class, 'showPaidOnly']);
Route::get('/bill/waiting-to-pay/{id}', [BillController::class, 'showWaitingToPayOnly']);
Route::get('/bill/total-time', [BillController::class], 'totalTime');
Route::post('/bill/not-paid/{id}', [BillController::class], 'create');
Route::post('/bill/status-bill/{id}', [BillController::class], 'updateStatusBill');