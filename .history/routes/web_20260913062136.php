<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [LoginController::class, 'login']);
Route::post('generate/bill',[LoginController::class,'generateBill']);
Route::post('checkout/bill',[LoginController::class,'checko']);
Route::post('email/unique',[LoginController::class,'UniqueCheck']);
Route::get('bill/checkout/{id}',[LoginController::class,'checkOut']);