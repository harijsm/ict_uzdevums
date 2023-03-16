<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:api']], function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::group(['prefix'=>'products', 'middleware' => ['auth:api']], function () {
    Route::any('list', [ProductsController::class, 'list']);
    Route::any('create', [ProductsController::class, 'create']);
    Route::any('info/{product_id}', [ProductsController::class, 'info']);
    Route::any('delete/{product_id}', [ProductsController::class, 'delete']);
});