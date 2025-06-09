<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function index()
    {
        return view('admin.adminLogin');
    }

    public function postAdminLogin(Request $request)
    {
        $success = "Welcome Chief to our website";
        $error = "You are not admin! So don't access admin panel";

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        $creds = $request->only('email', 'password');

        // Attempt to log in as admin
        if (Auth::guard('admin')->attempt($creds)) {
            if (Auth::guard('admin')->user()->role !== 0) {
                Auth::guard('admin')->logout();
                return redirect()->route('adminLogin')->with('error', $error);
            }
            return redirect()->intended(route('dashboard'))->with('success', $success);
        }

        return redirect()->route('adminLogin')->with('error', 'Invalid email or password!');
    }


    public function adminLogout()
    {
        $success = "Your Logout Successfully";
        Auth::guard('admin')->logout();
        return redirect()->route('adminLogin')->with('success', $success);
    }

}