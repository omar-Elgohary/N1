<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MainController;

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
Route::get('/allBranches', function () {
    return view('admin.branches.allBranches');
});

Route::get('/EditBranchDetails', function () {
    return view('admin.branches.EditBranchDetails');
});

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

Route::get('/restaurantMenu', function () {
    return view('admin.dashboards.restaurants.menu');
});

Route::get('/FoodMenu', function () {
    return view('admin.dashboards.restaurants.FoodMenu');
});

Route::get('/createProduct', function () {
    return view('admin.dashboards.restaurants.create');
});

Route::get('/editProduct', function () {
    return view('admin.dashboards.restaurants.edit');
});

Route::get('/menuDetails', function () {
    return view('admin.dashboards.restaurants.productDetails');
});

Route::get('/DeactivationProduct', function () {
    return view('admin.dashboards.restaurants.DeactivationProduct');
});


##############################################################################################################

// Shop Dashboard
Route::get('/shopMenu', function () {
    return view('admin.dashboards.shops.menu');
});

Route::get('/products', function () {
    return view('admin.dashboards.shops.products');
});

Route::get('/createShopProduct', function () {
    return view('admin.dashboards.shops.create');
});

Route::get('/editShopProduct', function () {
    return view('admin.dashboards.shops.edit');
});

Route::get('/productDetails', function () {
    return view('admin.dashboards.shops.productDetails');
});

Route::get('/DeactivationShopProduct', function () {
    return view('admin.dashboards.shops.DeactivationProduct');
});

##############################################################################################################

// Entertainments Dashboard

Route::get('/entertainmentsMenu', function () {
    return view('admin.dashboards.Entertainments.menu');
});

Route::get('/events', function () {
    return view('admin.dashboards.Entertainments.events');
});

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

Route::get('/restaurantPurchases', function () {
    return view('admin.purchases.RestaurantPurchases.index');
});

Route::get('/restaurantPurchasesDetails', function () {
    return view('admin.purchases.RestaurantPurchases.details');
});

Route::get('/restaurantPurchasesBeingProcessed', function () {
    return view('admin.purchases.RestaurantPurchases.BeingProcessed');
});


##############################################################################################################

// ShopPurchases

Route::get('/shopPurchases', function () {
    return view('admin.purchases.ShopPurchases.index');
});

Route::get('/shopPurchasesDetails', function () {
    return view('admin.purchases.ShopPurchases.details');
});


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
