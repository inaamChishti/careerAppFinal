<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function adminDashboard()
    {

        return view('admin.dashboard');
    }

    public function applicationRequest()
    {
        $requests = User::where('is_submit', 1)->get();
        return view('admin.requests', compact('requests'));
    }

    public function executeApplication(Request $request)
{
    $userId = $request->input('user_id');
    $action = $request->input('action');

    // Retrieve the user by user_id
    $user = User::find($userId);

    if ($user) {
        // Update user status based on the action
        $user->application_status = ($action == 'accept') ? 1 : 0;

        if ($action == 'accept') {
            // Generate a random password
            $password = Str::random(8); // You may use a different method to generate a password

            // Hash the password and store it in the database
            $user->password = Hash::make($password);

            // Save the user model
            $user->save();

            // Generate the login link with the unique token
            $loginLink = route('userLogin');

            // Customize the email subject and content based on your requirements
            $subject = 'Application Accepted';
            $content = "Dear " . ucfirst($user->name) . ",\n\n" .
                "Congratulations! Your application has been accepted. Here are your login details:\n" .
                "Email: " . $user->email . "\n" .
                "Password: " . $password . "\n\n" .
                "To login, click the following link:\n" .
                $loginLink . "\n\n" .
                "Best regards,\n" .
                "Support Team Care Staff Service";

            // Send email
            Mail::send([], [], function ($message) use ($user, $content) {
                $message->to($user->email)
                    ->subject('Application Accepted')
                    ->text($content); // Use text method to set plain text content
            });
        }

        // Save the user status
        $user->save();

        // Return a response indicating success
        return response()->json(['message' => 'User status and password updated successfully'], 200);
    } else {
        // Return a response indicating failure (user not found)
        return response()->json(['message' => 'User not found'], 404);
    }
}
}
