<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userDashboard()
    {
        return view('user.dashboard');
    }

    public function UserController()
    {
        // dd(Auth::id());
        $userdetails = UserDetails::where('user_id',Auth::id())->first();
        return view('user.applicationForm',compact('userdetails'));
    }
}
