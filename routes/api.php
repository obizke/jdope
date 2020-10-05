<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('v1/access/token', 'MpesaController@generateAccessToken');
Route::post('v1/b2c/simulation', 'MpesaController@B2cSimulate');
Route::post('v1/b2cSimulateTransactionResponse', 'MpesaController@b2cTransactionResponse');
Route::post('v1/simulate', 'MpesaController@simulate');
Route::post('v1/validation', 'MpesaController@mpesaValidation');
Route::post('v1/SimulateTransactionResponse', 'MpesaController@SimulateTransactionResponse')->middleware('log.route');
Route::post('v1/register/url', 'MpesaController@mpesaRegisterUrls');
Route::post('v1/stk/push/', 'MpesaController@stkpush')->name('order.payment');
Route::post('v1/StkTransactionResponse', 'MpesaController@StkTransactionResponse')->middleware('log.route');
