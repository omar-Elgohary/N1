<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;


// Admin Dashboard
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Categories
Route::get('categories', [DashboardController::class, 'categories'])->name('categories');
Route::post('addCategory', [DashboardController::class, 'addCategory'])->name('addCategory');



