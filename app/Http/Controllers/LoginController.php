<?php

namespace App\Http\Controllers;

use App\Mail\RecoveryPasswordMail;
use App\Mail\WelcomeNewUserMail;
use App\Models\Coupon;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Mail;
use Validator;

class LoginController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup');
    }
    public function postLoginForm(Request $request)
    {
        $successMessage = "Welcome. Now Your login.";
        $issueMessage = "Opps! Something went wrong please enter correct credentials.";
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [

            'email.required' => 'Please fill email field',
            'email.email' => 'Please enter valid email address',

            'password.required' => 'Please fill password field',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('home'))->with('success', $successMessage);
        } else {
            return redirect()->route('login')->with('error', $issueMessage);
        }
    }
    public function postSignup(Request $request)
    {

        $successMessage = "Welcome. Now Your Registered on BuyFinite.";
        $user = new User();
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ], [
            'name.required' => 'Please fill name field',
            'name.string' => 'Please enter valid name',

            'email.required' => 'Please fill email field',
            'email.email' => 'Please enter valid email address',
            'email.unique' => 'Email already exist',

            'password.required' => 'Please fill password field',

            'password_confirmation.required' => 'Please fill password_confirmation field',
            'password_confirmation.same' => 'Please enter same password!',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 1;
        $user->save();

        $prefix = strtoupper(Str::slug(Str::words($user->name, 1, ''), ''));
        $percentage = rand(10, 50);
        $code = $prefix . $percentage;

        $coupon = new Coupon();
        $coupon->code = $code;
        $coupon->type = 'percent';
        $coupon->value = $percentage;
        $coupon->min_amount = 2000;
        $coupon->start_date = now();
        $coupon->end_date = now()->addDay(3);
        $coupon->usage_limit = 1;
        $coupon->used_count = 0;
        $coupon->is_active = 1;
        $coupon->save();

        $userData = ([
            'user' => $user,
            'coupon' => $coupon,
            'subject' => '🎉 Welcome To Buy Finite.'
        ]);

        Mail::to($user->email)->send(new WelcomeNewUserMail($userData));

        Auth::login($user);
        return redirect()->route('home')->with('success', $successMessage);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', "You are logout. Thank you for comes BuyFinite");
    }

    public function recoveryPassword()
    {
        return view('recoveryPassword');
    }

    public function postRecoveryPassword(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => "required|email|exists:users,email"
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('recovery.password')->withInput()->withErrors($validator);
        }
        $email = $request->email;
        $user = User::where('email', $email)->first();
        $token = Str::random(64);

        DB::table('password_reset_token')->where('email', $email)->delete();

        DB::table('password_reset_token')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $resetInfo = ([
            'user' => $user,
            'token' => $token
        ]);

        Mail::to($email)->send(new RecoveryPasswordMail($resetInfo));

        return back()->with('status', 'Password reset link has been sent to your email.');
    }

    public function recoveryPasswordUrlGenerate($token)
    {
        $tokenData = DB::table('password_reset_token')->where('token', $token)->first();

        if (!$tokenData) {
            return redirect()->route('recovery.password')->with('error', 'Invalid or expired token.');
        }

        if (Carbon::parse($tokenData->created_at)->addMinutes(60)->isPast()) {
            return redirect()->route('recovery.password')->with('error', 'This link has expired.');
        }


        return view('resetPassword', [
            'token' => $token,
            'email' => $tokenData->email,
        ]);
    }

    public function updateResetPassword(Request $request)
    {

        $token = $request->token;

        $validator = Validator::make(
            $request->all(),
            [
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password|min:6'
            ]
        );

        if ($validator->fails()) {
            return redirect()->route("recovery.password.url", $token)->withErrors($validator);
        }

        $tokenData = DB::table('password_reset_token')->where('email', $request->email)->first();

        if (!$tokenData) {
            return redirect()->route('recovery.password')->with('error', 'Invalid or expired token.');
        }


        if (Carbon::parse($tokenData->created_at)->addMinutes(60)->isPast()) {
            DB::table('password_reset_token')->where('token', $request->token)->delete();
            return redirect()->route('recovery.password')->with('error', 'This link has expired.');
        }

        $user = User::where('email', $tokenData->email)->first();

        if (!$user) {
            return redirect()->route('recovery.password')->with('error', 'No user found with this email.');
        }

        User::where('id', $user->id)->update([
            'password' => Hash::make($request->password)
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_reset_token')->where('token', $request->token)->delete();

        return redirect()->route('login')->with('status', 'Password successfully reset. You can now log in.');
    }
}