<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\shopController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\RestaurentController;


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


    // Restaurent
    Route::get('getRestaurentById/{id}', [RestaurentController::class, 'getRestaurentById']);
    Route::get('getRestaurentMealById/{branche_id}/{meal_id}', [RestaurentController::class, 'getRestaurentMealById']);
    Route::get('getRestaurentMealsOfCategory/{branche_id}/{cat_id}', [RestaurentController::class, 'getRestaurentMealsOfCategory']);

    Route::post('addMealToCart/{id}', [RestaurentController::class,'addMealToCart']);
    Route::get('removeMealFromCart/{id}',[RestaurentController::class,'removeMealFromCart']);
    Route::get('getMealsCart/{branche_id}', [RestaurentController::class, 'getMealsCart']);

    Route::get('RestaurentReservations', [RestaurentController::class, 'RestaurentReservations']);
    Route::post('table_reservation/{branche_id}', [RestaurentController::class, 'table_reservation']);
    Route::get('mealsOfCategory/{cat_id}', [RestaurentController::class, 'mealsOfCategory']);



    // Shop
    Route::get('getShopBrancheById/{id}', [shopController::class, 'getShopBrancheById']);
    Route::get('getShopProductById/{id}', [shopController::class, 'getShopProductById']);
    Route::get('addOrRemoveShopProductLikes/{id}', [shopController::class, 'addOrRemoveShopProductLikes']);
    Route::get('getBrancheProductsOfCategory/{branche_id}/{cat_id}', [shopController::class, 'getBrancheProductsOfCategory']);

    Route::post('addProductToCart/{id}', [shopController::class,'addProductToCart']);
    Route::get('removeProductFromCart/{id}',[shopController::class,'removeProductFromCart']);
    Route::get('getProductsCart/{branche_id}', [shopController::class, 'getProductsCart']);

    Route::get('allOrders', [shopController::class, 'allOrders']);
    Route::get('processedOrder', [shopController::class, 'processedOrder']);
    Route::get('chargedOrder', [shopController::class, 'chargedOrder']);
    Route::get('shopInvoices', [shopController::class, 'shopInvoices']);
    Route::get('productsOfCategory/{cat_id}', [shopController::class, 'productsOfCategory']);


    // Event
    Route::get('getEventById/{id}', [EventController::class, 'getEventById']);
    Route::get('getEventProductById/{id}', [EventController::class, 'getEventProductById']);
    Route::get('addOrRemoveEventProductLikes/{id}', [EventController::class, 'addOrRemoveEventProductLikes']);
    Route::post('reservationEvent/{id}', [EventController::class, 'reservationEvent']);
    Route::get('EventReservations', [EventController::class, 'EventReservations']);
    Route::get('eventsOfCategory/{cat_id}', [EventController::class, 'eventsOfCategory']);



    Route::get('allcoupons', [HomeController::class, 'allcoupons']);
    Route::get('allPackages', [HomeController::class, 'allPackages']);
    Route::get('allBranches', [HomeController::class, 'allBranches']);
    Route::get('allReservations', [HomeController::class, 'allReservations']);
    Route::get('allInvoices', [HomeController::class, 'allInvoices']);

});

