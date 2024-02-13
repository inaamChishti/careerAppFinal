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
Route::get('/second-Step', function () {

    return view('secondStep');
 });

//  Route::get('/step-three', function () {

//     return view('stepThree');
//  });

//  Route::get('/step-four', function () {

//     return view('stepFour');
//  });

 Route::get('/section-one-to-two', function () {

    return view('sectionOneTwo');
 });



//  Route::get('/step-five', function () {

//     return view('stepFive');
//  });


Route::get('/email', function () {
    // Replace with the email address you want to send the test email to
    $recipientEmail = 'inaam.chishti2@gmail.com';

    // Email subject
    $subject = 'Test Email';

    // Email content
    $content = 'This is a test email sent from Laravel.';

    // Send the email
    Mail::raw($content, function ($message) use ($recipientEmail, $subject) {
        $message->to($recipientEmail)->subject($subject);
    });

    return "Test email sent to $recipientEmail";
});
Auth::routes();

Route::get('/logout', function () {
    Auth::logout();

})->name('logout');

Route::get('/', function () {

    return view('auth.login');
 });

Route::get('/customRegister', [App\Http\Controllers\HomeController::class, 'customRegister'])->name('customRegister');
Route::post('/verify_code', [App\Http\Controllers\HomeController::class, 'verify_code'])->name('verify_code');
Route::get('/home', [App\Http\Controllers\AuthController::class, 'home'])->name('home');
Route::POST('/custom-auth-step-1', [App\Http\Controllers\HomeController::class, 'customAuthStepOne'])->name('customAuthStepOne');
Route::get('/custom-auth-step-2', [App\Http\Controllers\HomeController::class, 'customAuthStepTwo'])->name('customAuthStepTwo');
Route::get('/custom-auth-step-3', [App\Http\Controllers\HomeController::class, 'customAuthStepThree'])->name('customAuthStepThree');
Route::get('/custom-auth-step-4', [App\Http\Controllers\HomeController::class, 'customAuthStepFour'])->name('customAuthStepFour');

Route::get('/custom-auth-step-5', [App\Http\Controllers\HomeController::class, 'customAuthStepFive'])->name('customAuthStepFive');
Route::post('/store-all-steps', [App\Http\Controllers\HomeController::class, 'storeAllData'])->name('storeAllData');







