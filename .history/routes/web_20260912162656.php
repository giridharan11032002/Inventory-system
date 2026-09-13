<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [LoginController::class, 'login']);
Route::get('generate/bill'[LoginController])