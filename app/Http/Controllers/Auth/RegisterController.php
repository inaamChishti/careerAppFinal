<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $existingUser = User::where('email', $data['email'])->first();

        // Generate a random numeric verification code
        $verificationCode = rand(100000, 999999);

        if ($existingUser) {
            // Email already exists, update the verification code and send the email
            // You can customize the email content and subject as needed
            Mail::raw("Your updated verification code: $verificationCode", function ($message) use ($data) {
                $message->to($data['email'])->subject('Updated Verification Code');
            });

            // Update the verification code in the database
            $existingUser->update(['verification_code' => $verificationCode]);
        } else {
            // Email doesn't exist, create a new user with the verification code
            // You can customize the email content and subject as needed
            Mail::raw("Your verification code: $verificationCode", function ($message) use ($data) {
                $message->to($data['email'])->subject('Verification Code');
            });

            // Store the code and email in the database
            User::create([
                'email' => $data['email'],
                'verification_code' => $verificationCode,
            ]);
        }

        return redirect()->route('dashboard');

        // The rest of your code
    }
}
