<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HourController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ShopAdminController;
use App\Http\Controllers\ChangePasswordController;

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


Route::post('/manager_login', [ManagerController::class, 'manager_login'])->name('manager_login');

// // Guest Routes for Manager
// Route::get('manager_login', fn() => view('auth.manager.login'))->name('manager.login');
// Route::post('manager_login', [ManagerController::class, 'manager_login'])->name('manager.login.submit');

//Manager / food stall able to register for CampusEats
Route::get('/partner',[ManagerController::class,'partner']);
Route::post('/shopStore',[ShopAdminController::class,'shopStore']);

Route::post('/partnerStore',[ManagerController::class,'partnerStore']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::resource('/manager', ManagerController::class);

Route::resource('biz_hour', HourController::class);
Route::resource('faq', FaqController::class);

Route::get('faq_index', [FaqController:: class, 'faqindex']) ;
