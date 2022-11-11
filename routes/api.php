<?php

use App\Http\Controllers\MdCounterController;
use App\Http\Controllers\MdFileController;
use App\Http\Controllers\MdSellerController;
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
Route::apiResource('seller', MdSellerController::class);
Route::apiResource('file', MdFileController::class);
Route::apiResource('counter', MdCounterController::class);
