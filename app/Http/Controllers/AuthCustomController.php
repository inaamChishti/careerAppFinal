<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class AuthCustomController extends Controller
{
    public function userLogin()
    {
       return view('auth.userSignIn');
    }
    public function verifyUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Retrieve the user by email
        $existingUser = User::where('email', $request['email'])->first();
        if (!$existingUser) {
            // Email does not exist
            return redirect()->back()->withErrors(['email' => 'Email does not exist']);
        }

        if ($existingUser) {
            // Check if the provided password is correct
            if (Hash::check($request['password'], $existingUser->password)) {
                // Password is correct, proceed with the verification code logic

                // Generate a random numeric verification code
                $verificationCode = rand(100000, 999999);

                // Email already exists, update the verification code and send the email
                // You can customize the email content and subject as needed
                Mail::raw("Your updated verification code: $verificationCode", function ($message) use ($request) {
                    $message->to($request['email'])->subject('Updated Verification Code');
                });

                // Update the verification code in the database
                $existingUser->update(['verification_code' => $verificationCode]);

                // Log in the user (you may use the Auth facade or other login methods)
                auth()->login($existingUser);

                // Redirect the user or perform other actions as needed
                // return redirect()->route('dashboard'); // Adjust the route name as needed
                $email = $request['email'];
                return view('user.verify_code', compact('email'));
            } else {
                // Password is incorrect
                return redirect()->back()->withErrors(['password' => 'Incorrect password']);
            }
        }


    }
    public function registerHere()
    {
        return view('auth.register');
    }
    public function signIn()
    {
        return view('auth.signIn');
    }
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Auth::login(Auth::user());

            return redirect()->route('adminDashboard'); // Redirect to the dashboard or any desired route
        } else {
            return redirect()->back()->withErrors(['password' => 'Invalid email or password.'])->withInput();
        }
    }
    public function registerUser(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required',

        ]);

        if ($validatedData['password'] !== $request->input('password_confirmation')) {
            return redirect()->back()->withErrors(['password' => 'The passwords do not match.'])->withInput();
        }

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect()->route('signIn');
    }
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
        $request = $request->all();
        return view('verification', compact('email', 'request'));

        // The rest of your code
    }
}
