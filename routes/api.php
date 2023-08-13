<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\shopController;


// Auth
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/check', [AuthController::class, 'check']);



Route::middleware('auth:sanctum')->group(function(){

    // HomePage
    Route::get('home', [HomeController::class, 'home']);
    Route::get('restaurentProducts', [HomeController::class, 'restaurentProducts']);
    Route::get('shopProducts', [HomeController::class, 'shopProducts']);
    Route::get('eventProducts', [HomeController::class, 'eventProducts']);


    // Shop
    Route::get('getShopBrancheById/{id}', [shopController::class, 'getShopBrancheById']);
    Route::get('getShopProductById/{id}', [shopController::class, 'getShopProductById']);
    Route::get('addOrRemoveShopProductLikes/{id}', [shopController::class, 'addOrRemoveShopProductLikes']);
    Route::get('getBrancheProductsOfCategory/{branche_id}/{cat_id}', [shopController::class, 'getBrancheProductsOfCategory']);

});

