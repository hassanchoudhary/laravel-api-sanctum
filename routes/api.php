<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

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
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


Route::middleware(['auth:sanctum'])->group(function () {

    Route::post('logout', [AuthController::class, 'logout']);

    Route::get('products', [ProductController::class, 'index']);
    Route::get('product/{id}/show', [ProductController::class, 'show']);
    Route::post('product/add', [ProductController::class, 'store']);

    //Route::put('product/{id}/update', [ProductController::class, 'update']);
    Route::post('product/{id}/update', [ProductController::class, 'update']);
    Route::delete('product/{id}/delete', [ProductController::class, 'destroy']);

});

///Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  //  return $request->user();
//});



//Route::middleware('auth:api')->get('/user', function (Request $request) {
 //   return $request->user();
//});
