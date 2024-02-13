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
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Response;


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
        $request = $request->all();
        return view('verification', compact('email', 'request'));

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
        } else {
            return redirect()->route('customRegister', [
                'email' => $request->email,
                'error' => 'Invalid verification code or email a new code has been sent again to your email.',
            ]);
        }
    }

    public function customAuthStepOne(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
        ]);

        // Check if the email already exists in the database
        $existingUser = User::where('email', $request->input('email'))->first();

        if (!$existingUser) {
            // Email does not exist, create a new user record
            $newUser = User::create([
                'email' => $request->input('email'),
                // Add other fields as needed
            ]);

            // Log in the newly created user
            Auth::login($newUser);
        } else {
            // Retrieve the existing user instance
            $existingUser = User::where('email', $request->input('email'))->first();

            // Log in the existing user
            Auth::login($existingUser);
        }

        return redirect()->route('customAuthStepTwo');
    }

    public function customAuthStepTwo()
    {
        return view('secondStep');
    }

    public function customAuthStepThree()
    {
        return view('stepThree');
    }

    public function customAuthStepFour(Request $request)
    {
        $formData = $request->all();
        return view('stepFour', compact('formData'));
    }

    public function customAuthStepFive(Request $request)
    {
        $formData = json_decode(request('formData'), true);
        // dd($request->all(),$formData);
        // dd($formData);
        return view('stepFive', compact('formData'));
    }

    public function storeAllData(Request $request)
    {
        // Decode the 'prev_data' JSON string
        $request['prev_data'] = json_decode(request('prev_data'), true);

        // Create the PDF content
        $pdfContent = "Form Data:\n\n";

        foreach ($request->except('_token') as $key => $value) {
            $pdfContent .= $key === 'prev_data'
                ? "Previous Data:\n" . $this->convertArrayToString($value)
                : $this->formatQuestionAnswer($key, $value) . "\n";
        }

        // Generate PDF using Laravel's built-in pdf method
        $pdf = app('dompdf.wrapper');
        $pdf->loadHTML($pdfContent);

        // Download the PDF
        return $pdf->download('form_data.pdf');
    }

    // Helper function to convert an array to a formatted string
    private function convertArrayToString($array)
    {
        $result = "";
        foreach ($array as $key => $value) {
            $result .= $this->formatQuestionAnswer($key, $value) . "\n";
        }
        return $result;
    }

    // Helper function to convert a value to a formatted string (handles nested arrays)
    private function convertValueToString($value)
    {
        if (is_array($value)) {
            return $this->convertArrayToString($value);
        }
        return $value;
    }

    // Helper function to format a question and answer
    private function formatQuestionAnswer($question, $answer)
    {
        // Replace underscores with spaces and format as "Question: Answer"
        $formattedQuestion = str_replace('_', ' ', $question);
        return "$formattedQuestion: " . $this->convertValueToString($answer);
    }
}
