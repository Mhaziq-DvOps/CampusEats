<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BanController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PayController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TermController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ShopAdminController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\OrderTrendsController;
use App\Http\Controllers\ReportTableController;
use App\Http\Controllers\ShopCategoryController;
use App\Http\Controllers\CustAnalyticsController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Product_CategoryController;

Route::get('/', function () {
    return view('home');
});
Auth::routes();
Route::get('/', [ProductController::class, 'popularProducts']);


Route::get('about', function () {
    return view('about');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//23 MAY
Route::get('/', [HomeController::class, 'index']);


//kalau customer dah login, so can access this profile details
Route::get('profileDetail', [UserController:: class, 'profileDetail']) ;
//user boleh tukar password atau edit profile-
Route::get('/changePassword', [ChangePasswordController::class, 'showChangePasswordGet'])->name('changePasswordGet');

Route::post('/changePassword', [App\Http\Controllers\ChangePasswordController::class, 'changePasswordPost'])->name('changePasswordPost');

// user boleh edit profile
Route::get('edit/{id}', [UserController:: class, 'edit'])->name('edit') ;

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
// Auth::routes();
Route::post('manager_login', [ManagerController:: class, 'manager_login']) ;
Route::resource('/manager', ManagerController::class);
Route::post('/partnerStore',[ManagerController::class,'partnerStore']);




Route::middleware(['auth:manager'])->group (function(){
    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('layout.index');
//tambah route lain yang khas buat manager


//selepas manager login, manager akan ke dashboard
Route::get('/dashboard', action: [DashboardController::class, 'dashboard']);
// In routes/web.php
Route::get('/dashboard', [ManagerController::class, 'dashboardWithSession'])->middleware('auth');

});

// Route::resource('/businesshour', BusinessHourController::class);
Route::get('/dashboard', [ManagerController::class, 'dashboard'])->name('dashboard');




Route::resource('/order', OrderController::class);
Route::get('/track-order', [OrderController::class, 'trackStatus'])->name('track.order');
// Route::get('/order-status/{id}', [OrderController::class, 'showOrderStatus'])->name('order.status');

// //to see the order status may 2025
Route::get('/order/status/{id}', [OrderController::class, 'showOrderStatus'])->name('order.status');


//to view order trends  analytics
Route::get('/order_trends', [OrderTrendsController::class, 'analytics']); 
//hanya manager yang berdaftar boleh access dashboard 
Route::middleware(['auth'])->get('/dashboard', [ManagerController::class, 'dashboardWithSession']);


//Manager / food stall able to register for CampusEats
Route::get('/partner',[ManagerController::class,'partner']);
Route::post('/shopStore',[ShopAdminController::class,'shopStore']);
Route::resource('/payment', PayController::class);
Route::post('/partnerStore', [ManagerController::class, 'partnerStore'])->name('partnerStore');


Route::get('/dashboard', [DashboardController::class, 'dashboard']);

//manage promotion
Route::resource('/promotion', PromotionController::class);

Route::resource('biz_hour', HourController::class);
Route::resource('faq', FaqController::class);

Route::get('faq_index', [FaqController:: class, 'faqindex']) ;
Route::get('faq_customer', [FaqController:: class, 'faq_index']) ;
Route::get('/tnc',[TermController::class,'view']);
Route::resource('reminder', ReminderController::class);

//untuk simpan data
Route::resource('/data', DataController::class);
//to search for the review product
Route::get('/feedback/search', [App\Http\Controllers\ReviewController::class, 'search'])->name('feedback.search');


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

Route::get('search', [ProductController:: class, 'search']) ;

Route::get('detail/{id}', [ProductController:: class, 'detail']) ;
//user masukkan product ke cart
Route::post('add_to_cart', [CartController:: class, 'addToCart']) ;
Route::get('cartlist', [CartController:: class, 'cartList']) ;
//remove product from cart
Route::get('removecart/{id}', [CartController:: class, 'removeCart']) ;
//user proceed to checkout
Route::get('checkout_shipping', [CheckoutController:: class, 'orderDetails']) ;

//20 MAY
// Route::get('/checkout_shipping', [CartController::class, 'showCheckoutShipping'])->name('checkout_shipping');

//22 MAY PICKED UP FOOD
Route::post('/order/{id}/pickedup', [OrderController::class, 'markAsPickedUp'])->name('order.pickedup');
//23 May checkout status
Route::get('/my-orders', [CheckoutController::class, 'myOrders'])->name('my.orders');



Route::post('/updatecart', [CartController::class, 'updateCart'])->name('updatecart');

// Route::post('checkout_shipping', [CheckoutController::class, 'orderDetails']);

// Route::post('/checkout_shipping', [CartController::class, 'checkoutShipping']);

Route::post('orderplace', [CheckoutController:: class, 'orderPlace']) ;
//MAY 17
// checkout complete - order status
// Route::get('checkout_complete', function () {
//     return view('checkout_complete');
// });

Route::get('/checkout_complete/{orderId}', [OrderController::class, 'checkoutComplete'])->name('checkout_complete');

//user able to cancel order when status still preparing
Route::post('/order/cancel/{id}', [App\Http\Controllers\OrderController::class, 'cancelOrder'])->name('order.cancel');

//To See the checkout summary
Route::get('checkout_summary', function () {
    return view('checkout_summary');
});
Route::post('webhook', [CheckoutController::class, 'stripePay']);

Route::get('checkout_summary', [CheckoutController:: class, 'checkoutstripe']) ;

Route::get('orderplace', [CheckoutController:: class, 'summary']) ;
Route::get('order_history', [UserController::class,'orderHistory']);
Route::get('history_detail/{id}', [UserController::class,'viewHistory']);
Route::get('invoice-order/{id}', [UserController::class, 'invoice']);
Route::get('/order_history', [OrderController::class, 'orderHistory'])->name('order.history');

//writeReview and submitReview
Route::get('write-review/{P_Id}', [ReviewController:: class, 'addReview']) ;
Route::post('/submitReview', [ReviewController:: class, 'submitReview']) -> name ('submitReview') ;

//customer Analytics
Route::get('/cust_analytics', [CustAnalyticsController::class, 'analytics']);


//process the order ``
 Route::get('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');

/*******************************/
/******* //paparan admin *******/
/*******************************/

Route::get('/admin',[UserController::class,'dash']);
// Route::resource('/term', TermController::class);
Route::resource('/customer', CustomerController::class);
// Route::resource('/ban_user', BanController::class);
Route::resource('/shop', ShopAdminController::class);
Route::get('admin-login', function () {
    return view('auth/admin/login');
});
// Route::post('manager_login', [ManagerController:: class, 'manager_login']) ;

Route::post('admin-login', [AdminController:: class, 'admin_login']) ;

//captcho
Route::get('/captcho', [CaptchaServiceController::class,'index']);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);
Route::get('capt-edit/{Capt_Id}', [CaptchaServiceController::class, 'edit']);



Route::get('/indexPend', [RestaurantController::class,'indexPend']);


Route::resource('/shopcategory', ShopCategoryController::class);







Route::resource('/term', TermController::class);
//to ban user
Route::resource('/ban_user', BanController::class);

//logs Pays
Route::get('/logs_pay',[LogController::class,'paymentIndex']);
//record logs for login
Route::get('/logs_login',[LogController::class,'loginIndex']);



//to select for product
Route::get('/catalogue/{id}', [ProductController::class, 'detail'])->name('catalogue.detail');

//admin create new restaurant
Route::get('/add_rest', function () {
    return view('admin-layouts.add_rest');
});
Route::get('/man_rest', function () {
    return view('admin-layouts.man_rest');
});
Route::get('/pending', function () {
    return view('admin-layouts.pending');
});

//admin add manager to the list
Route::get('/add_man', function () {
    return view('admin-layouts.add_man');
});

//admin add customer to the list
Route::get('/add_cust', function () {
    return view('admin-layouts.add_cust');
});
//24 MAY BAN USER INDEX
Route::get('/ban-user', [BanController::class, 'index'])->name('ban_user.index');


Route::get('/layouts.index', [ManagerController::class, 'partner'])->name('layouts.index');

//Feedback
Route::resource('/feedback', ReviewController::class);

//report
Route::resource('/report', ReportTableController::class);
// Route::resource('/customerreport', ReportTableController::class)->name('reports.customerreport');

Route::get('/customerreport', [ReportTableController::class, 'customerData'])->name('reports.customerreport');
Route::get('/businesshour', [ShopController::class, 'index'])->name('layouts.businesshour');

//restaurantController unsuitable term, maintain using adminController
Route::get('/indexBan', [AdminController::class,'indexBan']);
Route::get('/ban_user', [AdminController::class, 'UserBan']);
