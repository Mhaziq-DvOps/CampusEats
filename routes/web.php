<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShopAdminController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Product_CategoryController;

Route::get('/', function () {
    return view('home');
});
Auth::routes();

Route::get('about', function () {
    return view('about');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//kalau customer dah login, so can access this profile details
Route::get('profileDetail', [UserController:: class, 'profileDetail']) ;
//user boleh tukar password atau edit profile-
Route::get('/changePassword', [ChangePasswordController::class, 'showChangePasswordGet'])->name('changePasswordGet');

// user boleh edit profile
Route::get('edit/{id}', [UserController:: class, 'edit']) ;

//update data
Route::post('update', [UserController:: class, 'update']) -> name ('update') ;

// Route::get('/register', function () {
//     return view('auth/passwords/register');
// });
// GET is for loading the form.
// POST is for submitting and processing the form data.

//HIDE FOR A WHILE
//view untuk manager /food stall owner
Route::get('manager_login', function () {
    return view('auth/manager/login');
});
Route::post('manager_login', [ManagerController:: class, 'manager_login']) ;

//selepas manager login, manager akan ke dashboard
Route::get('/dashboard', [DashboardController::class, 'dashboard']);


//Manager / food stall able to register for CampusEats
Route::get('/partner',[ManagerController::class,'partner']);
Route::post('/shopStore',[ShopAdminController::class,'shopStore']);

Route::post('/partnerStore',[ManagerController::class,'partnerStore']);

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard']);
Route::resource('/manager', ManagerController::class);

Route::resource('biz_hour', HourController::class);
Route::resource('faq', FaqController::class);

Route::get('faq_index', [FaqController:: class, 'faqindex']) ;

//untuk simpan data
Route::resource('/data', DataController::class);


//View Shop Category
//ShopController
Route::get('shop_category', [ShopController::class, 'shop']);
Route::get('view-shop/{S_Cat_Slug}', [ShopController::class, 'viewshop']);
Route::resource('/shopInfo', ShopController::class);
Route::get('view-shop/{Cat_Slug}/{S_Name}', [ShopController::class, 'inshop']);

//catalogue
Route::get('/searchProduct', 'App\Http\Controllers\CatalogueController@search');
Route::resource('/catalogues', CatalogueController::class);
// Route::get('catalogues/create', [CatalogueController::class, 'add']);

Route::get('/catalogues/showReview/{P_Id}', [CatalogueController::class,'showReview']) ;

//productCategory 
Route::resource('/product_category', Product_CategoryController::class);
//untuk segala product
Route::get('catalogue', [ProductController:: class, 'index']) ;
Route::get('catalogueBooking', [ProductController:: class, 'catalogueBooking']) ;

//user masukkan product ke cart
Route::post('add_to_cart', [CartController:: class, 'addToCart']) ;
Route::get('cartlist', [CartController:: class, 'cartList']) ;
//remove product from cart
Route::get('removecart/{id}', [CartController:: class, 'removeCart']) ;
//user proceed to checkout
Route::get('checkout_shipping', [CheckoutController:: class, 'orderDetails']) ;
Route::post('orderplace', [CheckoutController:: class, 'orderPlace']) ;

Route::get('orderplace', [CheckoutController:: class, 'summary']) ;

//process the order
Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');
