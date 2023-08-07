<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\MainController;


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


});

