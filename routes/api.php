<?php

use App\Helpers\ApiResponser;
use App\Http\Controllers\MdProductController;
use App\Http\Controllers\MdCategoryController;
use App\Http\Controllers\MdStoreController;
use App\Http\Controllers\MdCounterController;
use App\Http\Controllers\MdFileController;
use App\Http\Controllers\MdSellerController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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
    Route::get('{id}/logo', [MdStoreController::class, "downloadLogo"]);
});

Route::apiResource('store', MdStoreController::class);

Route::apiResource('category', MdCategoryController::class);

Route::apiResource('product', MdProductController::class);

Route::post('login-and-token', function (Request $request) {
    Validator::make($request->all(), [
        'email' => 'required|email|max:250',
        'password' => 'required|max:250',
    ], [], ['email' => 'correo electrónico', 'password' => 'contraseña'])->validate();


    $user = User::where('email', $request->email)->first();

    $responser = new ApiResponser();
    if ($user &&
        Hash::check($request->password, $user->password)) {
        $token = $user->createToken('auth_token');
        return $responser->httpOkResponse(['token' => $token->plainTextToken]);
    } else {
        return $responser->generateResponse(['error' => trans('auth.failed')], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
});
