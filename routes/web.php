<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/step', function () {

   return view('step');
});
Route::get('/form', function () {

    return view('form');
 });

 Route::get('/section-one-to-two', function () {

    return view('sectionOneTwo');
 });


Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('signIn');
})->name('logout');


Route::get('/', function () {

    return view('auth.login');
 });
 Route::get('/thankYou', function () {
    return view('thankYou');
 });

//custom auth routes
Route::get('/user-login', [App\Http\Controllers\AuthCustomController::class, 'userLogin'])->name('userLogin');
Route::post('/verifyUser', [App\Http\Controllers\AuthCustomController::class, 'verifyUser'])->name('verifyUser');
Route::post('/verify_code', [App\Http\Controllers\HomeController::class, 'verify_code'])->name('verify_code');
Route::get('/register-here', [App\Http\Controllers\AuthCustomController::class, 'registerHere'])->name('registerHere');
Route::get('/signIn', [App\Http\Controllers\AuthCustomController::class, 'signIn'])->name('signIn');
Route::post('/admin-login', [App\Http\Controllers\AuthCustomController::class, 'adminLogin'])->name('adminLogin');
Route::post('/register-user', [App\Http\Controllers\AuthCustomController::class, 'registerUser'])->name('registerUser');
Route::get('/customRegister', [App\Http\Controllers\AuthCustomController::class, 'customRegister'])->name('customRegister');


//admin controller
Route::group(['middleware' => ['auth', 'checkUserType']], function () {
    Route::get('/adminDashboard', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('adminDashboard');
    Route::get('/application-request', [App\Http\Controllers\AdminController::class, 'applicationRequest'])->name('applicationRequest');
    Route::post('/execute-application', [App\Http\Controllers\AdminController::class, 'executeApplication'])->name('executeApplication');

});

// user dashboard

Route::get('/user-dashboard', [App\Http\Controllers\UserController::class, 'userDashboard'])->name('userDashboard');
Route::get('/user-application-form', [App\Http\Controllers\UserController::class, 'UserController'])->name('userApplicationFrom');

// user-application-form

Route::get('/home', [App\Http\Controllers\AuthController::class, 'home'])->name('home');
Route::POST('/custom-auth-step-1', [App\Http\Controllers\HomeController::class, 'customAuthStepOne'])->name('customAuthStepOne');

Route::group(['middleware' => 'check.is_submit'], function () {

    Route::post('/custom-auth-step-5', [App\Http\Controllers\HomeController::class, 'customAuthStepFive'])->name('customAuthStepFive');
    Route::get('/custom-auth-step-2', [App\Http\Controllers\HomeController::class, 'customAuthStepTwo'])->name('customAuthStepTwo');
    Route::get('/custom-auth-step-3', [App\Http\Controllers\HomeController::class, 'customAuthStepThree'])->name('customAuthStepThree');
    Route::get('/custom-auth-step-4', [App\Http\Controllers\HomeController::class, 'customAuthStepFour'])->name('customAuthStepFour');
    Route::get('/custom-auth-Bio', [App\Http\Controllers\HomeController::class, 'customAuthBio'])->name('customAuthBio');
});

Route::post('/store-all-steps', [App\Http\Controllers\HomeController::class, 'storeAllData'])->name('storeAllData');








