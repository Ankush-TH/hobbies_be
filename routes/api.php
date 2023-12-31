<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HobbyController;

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

Route::post('login', [AuthController::class, 'login']);
Route::group([
    'middleware' => 'api'
], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('hobbies/{user_id}', [HobbyController::class, 'index']);
    Route::post('store_hobby', [HobbyController::class, 'store']);
    Route::delete('delete_hobby/{id}', [HobbyController::class, 'destroy']);
});
