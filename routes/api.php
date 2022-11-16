<?php

use App\Http\Controllers\MdCategoryController;
use App\Http\Controllers\MdStoreController;
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

Route::get('file/download/{id}', [MdFileController::class, "download"]);
Route::apiResource('file', MdFileController::class);

Route::prefix('counter')->group(function () {
    Route::put("increment", [MdCounterController::class, "increment"]);
    Route::put("decrement", [MdCounterController::class, "decrement"]);
});
Route::apiResource('counter', MdCounterController::class);


Route::prefix('store')->group(function () {
    Route::put('toggle-seller', [MdStoreController::class, 'toggleSeller']);
    Route::get('download-logo/{id}', [MdStoreController::class, "downloadLogo"]);
});

Route::apiResource('store', MdStoreController::class);

Route::apiResource('category', MdCategoryController::class);
