<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


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

Route::get('/', function () {
     return redirect('login');
    // return view('welcome');
});

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

Route::get('/customRegister', [App\Http\Controllers\HomeController::class, 'customRegister'])->name('customRegister');
Route::post('/verify_code', [App\Http\Controllers\HomeController::class, 'verify_code'])->name('verify_code');
Route::get('/home', [App\Http\Controllers\AuthController::class, 'home'])->name('home');




