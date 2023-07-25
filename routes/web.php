<?php
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\EntertainmentController;
use App\Http\Controllers\Admin\CategoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


    Route::get('/', function()
    {
        return view('front.home');
    });

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register')->name('register');
    Route::post('verify', 'verify')->name('verify');
    Route::post('login', 'login')->name('login');
    Route::get('logOut', 'logOut')->name('logOut');
});

###############################################################################################################################

// Front
Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('contact_us', [MainController::class, 'index'])->name('contact_us');
Route::post('contact_us', [MainController::class, 'store'])->name('contact_us.store');

Route::get('about', function () {
    return view('front.questions');
})->name('front.questions');

###############################################################################################################################

// Admin
Route::middleware(['authenticated'])->group(function(){   // User Must Be Authenticated

    Route::post('addSubCategory', [CategoryController::class, 'addSubCategory'])->name('addSubCategory');

    // ده الراوت الخاص بانه يجيب الفئات الفرعية التابعه لكل قسم
    Route::get('category/{id}', [CategoryController::class, 'getCategorySubs']);

Route::middleware(['CheckUser'])->group(function () {

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

###############################################################################################################################

// Offers
Route::get('/allOffers', function () {
    return view('admin.offers.allOffers');
})->name('alloffers');

Route::get('/homeOffers', function () {
    return view('admin.offers.index');
});

###############################################################################################################################

// Branches
Route::get('allBranches', [BranchController::class, 'allBranches'])->name('allBranches');
Route::post('createBranche', [BranchController::class, 'createBranche'])->name('createBranche');

Route::get('EditBranchPage/{id}', [BranchController::class, 'EditBranchPage'])->name('EditBranchPage');
Route::post('updateBranch/{id}', [BranchController::class, 'updateBranch'])->name('updateBranch');
Route::get('deleteBranch/{id}', [BranchController::class, 'deleteBranch'])->name('deleteBranch');

###############################################################################################################################

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

###############################################################################################################################

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

###############################################################################################################################

// Restaurant Dashboard
Route::middleware(['CheckRestaurent'])->group(function () {

    Route::get('restaurantMenu', [RestaurantController::class, 'restaurantMenu'])->name('restaurantMenu');
    Route::get('foodMenu', [RestaurantController::class, 'foodMenu'])->name('foodMenu');

    Route::get('foodMenu/category/{category_id}', [RestaurantController::class, 'filterProducts'])->name('filterProducts');

    Route::get('ExportrestaurentPDF', [RestaurantController::class, 'ExportrestaurentPDF'])->name('ExportrestaurentPDF');
    Route::post('uploadtrestaurentExcel', [RestaurantController::class, 'uploadtrestaurentExcel'])->name('uploadtrestaurentExcel');

    Route::get('restaurentCategories', [RestaurantController::class, 'restaurentCategories'])->name('restaurentCategories');
    Route::post('createCategory', [RestaurantController::class, 'createCategory'])->name('createCategory');
    Route::post('editCategory/{id}', [RestaurantController::class, 'editCategory'])->name('editCategory');
    Route::post('deleteCategory/{id}', [RestaurantController::class, 'deleteCategory'])->name('deleteCategory');

    Route::get('allSubCategories/{category_id}', [RestaurantController::class, 'allSubCategories'])->name('allSubCategories');
    Route::post('createSubCategory/{category_id}', [RestaurantController::class, 'createSubCategory'])->name('createSubCategory');
    Route::post('editSubCategory/{id}', [RestaurantController::class, 'editSubCategory'])->name('editSubCategory');
    Route::post('deleteSubCategory/{id}', [RestaurantController::class, 'deleteSubCategory'])->name('deleteSubCategory');

    Route::get('createRestaurentProduct', [RestaurantController::class, 'createRestaurentProduct'])->name('createRestaurentProduct');
    Route::post('storeRestaurentProduct', [RestaurantController::class, 'storeRestaurentProduct'])->name('storeRestaurentProduct');

    Route::get('editRestaurentProduct/{id}', [RestaurantController::class, 'editRestaurentProduct'])->name('editRestaurentProduct');
    Route::post('updateRestaurentProduct/{id}', [RestaurantController::class, 'updateRestaurentProduct'])->name('updateRestaurentProduct');

    Route::get('RestaurentProductDetails/{id}', [RestaurantController::class, 'RestaurentProductDetails'])->name('RestaurentProductDetails');
    Route::get('deleteRestaurentProduct/{id}', [RestaurantController::class, 'deleteRestaurentProduct'])->name('deleteRestaurentProduct');

    Route::get('DeactiviteRestaurentProduct/{id}', [RestaurantController::class, 'DeactiviteRestaurentProduct'])->name('DeactiviteRestaurentProduct');
    Route::get('unDeactiviteRestaurentProduct/{id}', [RestaurantController::class, 'unDeactiviteRestaurentProduct'])->name('unDeactiviteRestaurentProduct');

}); // CheckRestaurent middleware

###############################################################################################################################

// Shop Dashboard
Route::middleware(['CheckShop'])->group(function () {

    Route::get('shopMenu', [ShopController::class, 'shopMenu'])->name('shopMenu');
    Route::get('products', [ShopController::class, 'products'])->name('products');

    Route::get('products/category/{category_id}', [ShopController::class, 'filterShopProducts'])->name('filterShopProducts');

    Route::get('ExportShopPDF', [ShopController::class, 'ExportShopPDF'])->name('ExportShopPDF');
    Route::post('uploadShopExcel', [ShopController::class, 'uploadShopExcel'])->name('uploadShopExcel');

    Route::get('shopCategories', [ShopController::class, 'shopCategories'])->name('shopCategories');
    Route::post('createShopCategory', [ShopController::class, 'createShopCategory'])->name('createShopCategory');
    Route::post('editShopCategory/{id}', [ShopController::class, 'editShopCategory'])->name('editShopCategory');
    Route::post('deleteShopCategory/{id}', [ShopController::class, 'deleteShopCategory'])->name('deleteShopCategory');

    Route::get('shopSubCategories/{category_id}', [ShopController::class, 'shopSubCategories'])->name('shopSubCategories');
    Route::post('createShopSubCategory/{category_id}', [ShopController::class, 'createShopSubCategory'])->name('createShopSubCategory');
    Route::post('editShopSubCategory/{id}', [ShopController::class, 'editShopSubCategory'])->name('editShopSubCategory');
    Route::post('deleteShopSubCategory/{id}', [ShopController::class, 'deleteShopSubCategory'])->name('deleteShopSubCategory');

    Route::get('createShopProduct', [ShopController::class, 'createShopProduct'])->name('createShopProduct');
    Route::post('storeShopProduct', [ShopController::class, 'storeShopProduct'])->name('storeShopProduct');

    Route::get('editShopProduct/{id}', [ShopController::class, 'editShopProduct'])->name('editShopProduct');
    Route::post('updateShopProduct/{id}', [ShopController::class, 'updateShopProduct'])->name('updateShopProduct');

    Route::get('shopProductDetails/{id}', [ShopController::class, 'shopProductDetails'])->name('shopProductDetails');
    Route::get('deleteShopProduct/{id}', [ShopController::class, 'deleteShopProduct'])->name('deleteShopProduct');

    Route::get('DeactiviteShopProduct/{id}', [ShopController::class, 'DeactiviteShopProduct'])->name('DeactiviteShopProduct');
    Route::get('unDeactiviteShopProduct/{id}', [ShopController::class, 'unDeactiviteShopProduct'])->name('unDeactiviteShopProduct');

}); // CheckShop middleware

###############################################################################################################################

// Entertainments Dashboard
Route::middleware(['CheckEntertainment'])->group(function () {

    Route::get('entertainmentsMenu', [EntertainmentController::class, 'entertainmentsMenu'])->name('entertainmentsMenu');

    Route::get('events/category/{category_id}', [EntertainmentController::class, 'filterEventProducts'])->name('filterEventProducts');

    Route::get('ExportEventPDF', [EntertainmentController::class, 'ExportEventPDF'])->name('ExportEventPDF');
    Route::post('uploadEventExcel', [EntertainmentController::class, 'uploadEventExcel'])->name('uploadEventExcel');

    Route::get('eventCategories', [EntertainmentController::class, 'eventCategories'])->name('eventCategories');
    Route::post('createEntertainmentCategory', [EntertainmentController::class, 'createEntertainmentCategory'])->name('createEntertainmentCategory');
    Route::post('editEventCategory/{id}', [EntertainmentController::class, 'editEventCategory'])->name('editEventCategory');
    Route::post('deleteEventCategory/{id}', [EntertainmentController::class, 'deleteEventCategory'])->name('deleteEventCategory');

    Route::get('eventSubCategories/{category_id}', [EntertainmentController::class, 'eventSubCategories'])->name('eventSubCategories');
    Route::post('createEventSubCategory/{category_id}', [EntertainmentController::class, 'createEventSubCategory'])->name('createEventSubCategory');
    Route::post('editEventSubCategory/{id}', [EntertainmentController::class, 'editEventSubCategory'])->name('editEventSubCategory');
    Route::post('deleteEventSubCategory/{id}', [EntertainmentController::class, 'deleteEventSubCategory'])->name('deleteEventSubCategory');

    Route::get('events', [EntertainmentController::class, 'events'])->name('events');
    Route::get('createEvent', [EntertainmentController::class, 'createEvent'])->name('createEvent');
    Route::post('storeEvent', [EntertainmentController::class, 'storeEvent'])->name('storeEvent');

    Route::get('editEvent/{id}', [EntertainmentController::class, 'editEvent'])->name('editEvent');
    Route::post('updateEvent/{id}', [EntertainmentController::class, 'updateEvent'])->name('updateEvent');

    Route::get('eventDetails/{id}', [EntertainmentController::class, 'eventDetails'])->name('eventDetails');
    Route::delete('deleteEvent/{id}', [EntertainmentController::class, 'deleteEvent'])->name('deleteEvent');

    Route::post('deactivationEvent/{id}', [EntertainmentController::class, 'deactivationEvent'])->name('deactivationEvent');
    Route::get('activationEvent/{id}', [EntertainmentController::class, 'activationEvent'])->name('activationEvent');

}); // CheckEntertainment middleware

###############################################################################################################################

// RestaurantPurchases
Route::middleware(['CheckRestaurent'])->group(function () {

    Route::get('restaurantPurchases', [RestaurantController::class, 'restaurantPurchases'])->name('restaurantPurchases');
    Route::get('restaurantPurchasesDetails/{id}', [RestaurantController::class, 'restaurantPurchasesDetails'])->name('restaurantPurchasesDetails');
    Route::get('changePurchaseStatus/{id}', [RestaurantController::class, 'changePurchaseStatus'])->name('changePurchaseStatus');

}); // CheckRestaurent middleware
###############################################################################################################################

// ShopPurchases
Route::middleware(['CheckShop'])->group(function () {

    Route::get('shopPurchases', [ShopController::class, 'shopPurchases'])->name('shopPurchases');
    Route::get('shopPurchasesDetails/{id}', [ShopController::class, 'shopPurchasesDetails'])->name('shopPurchasesDetails');

}); // CheckShop middleware

###############################################################################################################################

// EntertainmentPurchases
Route::middleware(['CheckEntertainment'])->group(function () {

    Route::get('entertainmentPurchases', [EntertainmentController::class, 'entertainmentPurchases'])->name('entertainmentPurchases');
    Route::get('eventOrderDetails/{id}', [EntertainmentController::class, 'eventOrderDetails'])->name('eventOrderDetails');

}); // CheckEntertainment middleware

###############################################################################################################################

// RestaurantAdmin

Route::get('RestaurantAdmin', [RestaurantController::class, 'RestaurantAdmin'])->name('RestaurantAdmin');

Route::get('RestaurantAdminDetails/{id}', [RestaurantController::class, 'RestaurantAdminDetails'])->name('RestaurantAdminDetails');

Route::get('changeStatusRestaurantAdminDetails/{id}', [RestaurantController::class, 'changeStatus'])->name('changeStatus');

###############################################################################################################################

// ShopAdmin

Route::get('shopAdmin', [ShopController::class, 'shopAdmin'])->name('shopAdmin');

Route::get('ShopAdminDetails/{id}', [ShopController::class, 'ShopAdminDetails'])->name('ShopAdminDetails');

###############################################################################################################################

// EntertainmentAdmin
Route::middleware(['CheckEntertainment'])->group(function () {

    Route::get('eventsBranchAdmin', [EntertainmentController::class, 'eventsBranchAdmin'])->name('eventsBranchAdmin');
    Route::get('eventAdminDetails/{id}', [EntertainmentController::class, 'eventAdminDetails'])->name('eventAdminDetails');

}); // CheckEntertainment middleware

}); // Middleware CheckUser

}); // middleware authenticated

}); // Localization
