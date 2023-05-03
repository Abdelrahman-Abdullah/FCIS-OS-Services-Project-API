<?php

use App\Http\Controllers\API\V1\FavouriteListController;
use App\Http\Controllers\API\V1\JobPhotosController;
use App\Http\Controllers\API\V1\OrderController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'v1' , 'namespace'=>'App\Http\Controllers\API\V1'] , function (){
    Route::get('workers',         [UserController::class, 'index']);
    Route::post('users/register', [RegisterController::class, 'create']);
    Route::post( 'users/login',   [LoginController::class, 'login']);
});

Route::group(['prefix' => 'v1' , 'namespace'=>'App\Http\Controllers\API\V1' , 'middleware' => 'auth:sanctum'] , function () {
    Route::get('user',  [UserController::class, 'show']);
    Route::put('user',  [UserController::class, 'update']);
    Route::post('user', [UserController::class, 'logout']);
    // User Only Can Access
    Route::middleware('user-access:user')->group(function () {
        Route::post('orders' ,                             [OrderController::class , 'store']);
        Route::get('favourites' ,                          [FavouriteListController::class , 'index']);
        Route::post('add-favourite' ,                      [FavouriteListController::class , 'store']);
        Route::delete('delete-favourite/{favouriteList}' , [FavouriteListController::class , 'destroy']);
        Route::delete('orders/{order}' ,                   [OrderController::class , 'delete']);
    });

    // Workers Only Can Access
    Route::middleware('user-access:worker')->group(function () {
        Route::post('job-photos' ,     [jobPhotosController::class , 'store']);
        Route::put('orders/{order}' ,  [OrderController::class , 'update']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
