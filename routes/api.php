<?php

use App\Http\Controllers\Api\UserController;
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