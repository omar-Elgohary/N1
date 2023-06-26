<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RestaurantController;

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register')->name('register');
    Route::post('verify', 'verify')->name('verify');
    Route::post('login', 'login')->name('login');
    Route::get('logOut', 'logOut')->name('logOut');
});

##############################################################################################################

// Front
Route::get('/', function () {
    return view('front.home');
})->name('home');

Route::get('contact_us', [MainController::class, 'index'])->name('contact_us');
Route::post('contact_us', [MainController::class, 'store'])->name('contact_us.store');

Route::get('about', function () {
    return view('front.questions');
})->name('front.questions');

##############################################################################################################

// Admin
Route::middleware(['authenticated'])->group(function(){   // User Must Be Authenticated

    Route::get('admin', function () {
        return view('admin.parts.statistics');
    })->name('admin');


Route::get('personalInfo', function () {
    return view('admin.parts.personalInfo');
})->name('personalInfo');

Route::get('editSellerPage/{id}', [SellerController::class, 'editSellerPage'])->name('editSellerPage');
Route::post('editSellerInfo/{id}', [SellerController::class, 'editSellerInfo'])->name('editSellerInfo');

Route::get('changePasswordPage', [SellerController::class, 'changePasswordPage'])->name('changePasswordPage');
Route::post('changePassword/{id}', [SellerController::class, 'changePassword'])->name('changePassword');



##############################################################################################################

// Offers
Route::get('/allOffers', function () {
    return view('admin.offers.allOffers');
})->name('alloffers');

Route::get('/homeOffers', function () {
    return view('admin.offers.index');
});

##############################################################################################################

// Branches
Route::get('allBranches', [BranchController::class, 'allBranches'])->name('allBranches');
Route::post('createBranche', [BranchController::class, 'createBranche'])->name('createBranche');

Route::get('EditBranchPage/{id}', [BranchController::class, 'EditBranchPage'])->name('EditBranchPage');
Route::post('updateBranch/{id}', [BranchController::class, 'updateBranch'])->name('updateBranch');
Route::get('deleteBranch/{id}', [BranchController::class, 'deleteBranch'])->name('deleteBranch');

##############################################################################################################

// Coupons
Route::get('addCouponPage', function () {
    return view('admin.coupons.addCoupon');
})->name('addCouponPage');

Route::post('addCoupon', [CouponController::class, 'store'])->name('addCoupon');


Route::get('editCoupon/{id}', [CouponController::class, 'edit'])->name('editCoupon');
Route::post('updateCoupon/{id}', [CouponController::class, 'update'])->name('updateCoupon');

Route::get('couponDetails/{id}', [CouponController::class, 'couponDetails'])->name('couponDetails');

Route::get('deactivationCoupon/{id}',[CouponController::class, 'deactivationCoupon'])->name('deactivationCoupon');
Route::get('activationCoupon/{id}',[CouponController::class, 'activationCoupon'])->name('activationCoupon');

Route::get('deleteCoupon/{id}', [CouponController::class, 'deleteCoupon'])->name('deleteCoupon');

##############################################################################################################

// Packages
Route::get('addPackagePage', [PackageController::class, 'index'])->name('addPackagePage');
Route::post('addPackage', [PackageController::class, 'addPackage'])->name('addPackage');

Route::get('editPackage/{id}', [PackageController::class, 'editPackage'])->name('editPackage');
Route::post('updatePackage/{id}', [PackageController::class, 'updatePackage'])->name('updatePackage');

Route::get('packageDetails/{id}',[PackageController::class, 'packageDetails'])->name('packageDetails');

Route::get('deactivationPackage/{id}',[PackageController::class, 'deactivationPackage'])->name('deactivationPackage');
Route::get('activationPackage/{id}',[PackageController::class, 'activationPackage'])->name('activationPackage');


Route::get('/DeactivationPackage', function () {
    return view('admin.packages.DeactivationPackage');
});

Route::get('deletePackage/{id}', [PackageController::class, 'deletePackage'])->name('deletePackage');

##############################################################################################################

// Restaurant Dashboard

Route::get('restaurantMenu', [RestaurantController::class, 'restaurantMenu'])->name('restaurantMenu');
Route::get('foodMenu', [RestaurantController::class, 'foodMenu'])->name('foodMenu');

Route::post('createCategory', [RestaurantController::class, 'createCategory'])->name('createCategory');
Route::post('editCategory/{id}', [RestaurantController::class, 'editCategory'])->name('editCategory');

Route::get('createRestaurentProduct', [RestaurantController::class, 'createRestaurentProduct'])->name('createRestaurentProduct');
Route::post('storeRestaurentProduct', [RestaurantController::class, 'storeRestaurentProduct'])->name('storeRestaurentProduct');

Route::get('editRestaurentProduct/{id}', [RestaurantController::class, 'editRestaurentProduct'])->name('editRestaurentProduct');
Route::post('updateRestaurentProduct/{id}', [RestaurantController::class, 'updateRestaurentProduct'])->name('updateRestaurentProduct');

Route::get('RestaurentProductDetails/{id}', [RestaurantController::class, 'RestaurentProductDetails'])->name('RestaurentProductDetails');
Route::get('deleteRestaurentProduct/{id}', [RestaurantController::class, 'deleteRestaurentProduct'])->name('deleteRestaurentProduct');

Route::get('DeactiviteRestaurentProduct/{id}', [RestaurantController::class, 'DeactiviteRestaurentProduct'])->name('DeactiviteRestaurentProduct');
Route::get('unDeactiviteRestaurentProduct/{id}', [RestaurantController::class, 'unDeactiviteRestaurentProduct'])->name('unDeactiviteRestaurentProduct');


##############################################################################################################

// Shop Dashboard
Route::get('shopMenu', [ShopController::class, 'shopMenu'])->name('shopMenu');
Route::get('products', [ShopController::class, 'products'])->name('products');

Route::post('createShopCategory', [ShopController::class, 'createShopCategory'])->name('createShopCategory');

Route::get('createShopProduct', [ShopController::class, 'createShopProduct'])->name('createShopProduct');
Route::post('storeShopProduct', [ShopController::class, 'storeShopProduct'])->name('storeShopProduct');


Route::get('editShopProduct/{id}', [ShopController::class, 'editShopProduct'])->name('editShopProduct');
Route::post('updateShopProduct/{id}', [ShopController::class, 'updateShopProduct'])->name('updateShopProduct');

Route::get('shopProductDetails/{id}', [ShopController::class, 'shopProductDetails'])->name('shopProductDetails');
Route::get('deleteShopProduct/{id}', [ShopController::class, 'deleteShopProduct'])->name('deleteShopProduct');

Route::get('DeactiviteShopProduct/{id}', [ShopController::class, 'DeactiviteShopProduct'])->name('DeactiviteShopProduct');
Route::get('unDeactiviteShopProduct/{id}', [ShopController::class, 'unDeactiviteShopProduct'])->name('unDeactiviteShopProduct');



##############################################################################################################

// Entertainments Dashboard

Route::get('/entertainmentsMenu', function () {
    return view('admin.dashboards.Entertainments.menu');
});

Route::get('events', function () {
    return view('admin.dashboards.Entertainments.events');
})->name('events');

Route::get('/createEvents', function () {
    return view('admin.dashboards.Entertainments.create');
});

Route::get('/editEvents', function () {
    return view('admin.dashboards.Entertainments.edit');
});

Route::get('/eventDetails', function () {
    return view('admin.dashboards.Entertainments.eventDetails');
});


##############################################################################################################

// RestaurantPurchases

Route::get('restaurantPurchases', [RestaurantController::class, 'restaurantPurchases'])->name('restaurantPurchases');

Route::get('restaurantPurchasesDetails/{id}', [RestaurantController::class, 'restaurantPurchasesDetails'])->name('restaurantPurchasesDetails');

Route::get('changePurchaseStatus/{id}', [RestaurantController::class, 'changePurchaseStatus'])->name('changePurchaseStatus');

##############################################################################################################

// ShopPurchases

Route::get('shopPurchases', [ShopController::class, 'shopPurchases'])->name('shopPurchases');

Route::get('shopPurchasesDetails/{id}', [ShopController::class, 'shopPurchasesDetails'])->name('shopPurchasesDetails');



##############################################################################################################

// EntertainmentPurchases

Route::get('/entertainmentPurchases', function () {
    return view('admin.purchases.EntertainmentPurchases.index');
});

Route::get('/entertainmentPurchasesDetails', function () {
    return view('admin.purchases.EntertainmentPurchases.details');
});


##############################################################################################################

// RestaurantAdmin

Route::get('/RestaurantAdmin', function () {
    return view('admin.branches.admins.Restaurant.index');
});

Route::get('/RestaurantAdminDetails', function () {
    return view('admin.branches.admins.Restaurant.details');
});

Route::get('/deactivateRestaurantAdminDetails', function () {
    return view('admin.branches.admins.Restaurant.deactivate');
});


##############################################################################################################

// ShopAdmin

Route::get('/ShopAdmin', function () {
    return view('admin.branches.admins.Shop.index');
});

Route::get('/ShopAdminDetails', function () {
    return view('admin.branches.admins.Shop.details');
});


##############################################################################################################

// EntertainmentAdmin

Route::get('/EntertainmentAdmin', function () {
    return view('admin.branches.admins.Entertainment.index');
});

Route::get('/EntertainmentAdminDetails', function () {
    return view('admin.branches.admins.Entertainment.details');
});



}); // middleware authenticated
