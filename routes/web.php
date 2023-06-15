<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Auth\AuthController;

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

Route::get('contact', function () {
    return view('front.contact');
});

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

Route::get('editOfferPage/{id}', [OfferController::class, 'editOfferPage'])->name('editOfferPage');
Route::get('deleteOffer/{id}', [OfferController::class, 'deleteOffer'])->name('deleteOffer');


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

Route::get('/couponDetails', function () {
    return view('admin.coupons.couponDetails');
});

Route::get('/deactivationCoupon', function () {
    return view('admin.coupons.DeactivationCoupon');
});


##############################################################################################################

// Packages
Route::get('addPackage', function () {
    return view('admin.packages.addPackage');
});

Route::get('editPackage/{id}', function () {
    return view('admin.packages.editPackage');
})->name('editPackage');

Route::get('/packageDetails', function () {
    return view('admin.packages.packageDetails');
});

Route::get('/DeactivationPackage', function () {
    return view('admin.packages.DeactivationPackage');
});


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
