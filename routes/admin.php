<?php

use App\Http\Controllers\admin\AboutUsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;


// Admin Dashboard
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('adminInfo', [DashboardController::class, 'adminInfo'])->name('adminInfo');
Route::post('editAdminInfo', [DashboardController::class, 'editAdminInfo'])->name('editAdminInfo');

// Users
Route::get('users', [DashboardController::class, 'users'])->name('users');

// Sellers
Route::get('sellers', [DashboardController::class, 'sellers'])->name('sellers');

Route::get('upgradeAccountsPage', [DashboardController::class, 'upgradeAccountsPage'])->name('upgradeAccountsPage');
Route::post('upgradeAccounts', [DashboardController::class, 'upgradeAccounts'])->name('upgradeAccounts');

// Categories
Route::get('categories', [DashboardController::class, 'categories'])->name('categories');
Route::post('addCategory', [DashboardController::class, 'addCategory'])->name('addCategory');
Route::post('updateCategory/{id}', [DashboardController::class, 'updateCategory'])->name('updateCategory');
Route::get('deleteCategory/{id}', [DashboardController::class, 'deleteCategory'])->name('deleteCategory');

// AboutUs
Route::get('aboutUs', [AboutUsController::class, 'aboutUs'])->name('aboutUs');
Route::post('storeAboutUs', [AboutUsController::class, 'storeAboutUs'])->name('aboutUs.store');
Route::patch('updateAboutUs/{id}', [AboutUsController::class, 'updateAboutUs'])->name('aboutUs.update');
Route::delete('deleteAboutUs/{id}', [AboutUsController::class, 'deleteAboutUs'])->name('aboutUs.delete');

// ContactUs
Route::get('usersMessages', [AboutUsController::class, 'usersMessages'])->name('usersMessages');
