<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function customRegister(Request $request)
    {
        $existingUser = User::where('email', $request['email'])->first();

        // Generate a random numeric verification code
        $verificationCode = rand(100000, 999999);

        if ($existingUser) {
            // Email already exists, update the verification code and send the email
            // You can customize the email content and subject as needed
            Mail::raw("Your updated verification code: $verificationCode", function ($message) use ($request) {
                $message->to($request['email'])->subject('Updated Verification Code');
            });

            // Update the verification code in the requestbase
            $existingUser->update(['verification_code' => $verificationCode]);
        } else {
            // Email doesn't exist, create a new user with the verification code
            // You can customize the email content and subject as needed
            Mail::raw("Your verification code: $verificationCode", function ($message) use ($request) {
                $message->to($request['email'])->subject('Verification Code');
            });

            // Store the code and email in the requestbase
            User::create([
                'email' => $request['email'],
                'verification_code' => $verificationCode,
            ]);
        }
        $email = $request['email'];
        $request= $request->all();
      return view('verification',compact('email','request'));

        // The rest of your code
    }

    public function verify_code(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'verification_code' => 'required|numeric',
        ]);

        $user = User::where('email', $request->email)
                    ->where('verification_code', $request->verification_code)
                    ->first();

        if ($user) {
            // Verification successful, log in the user
            Auth::login($user);

            // Clear the verification code in the database
            $user->update(['verification_code' => null]);

            return view('home'); // Redirect to the dashboard or any desired route after successful login
        }
        else
        {
            return redirect()->route('customRegister', [
                'email' => $request->email,
                'error' => 'Invalid verification code or email a new code has been sent again to your email.',
            ]);

        }
    }

   
}
