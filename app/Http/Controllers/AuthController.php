<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Mail\SendPasswordReset;
use Illuminate\Http\Request;
use App\Events\UserLoggedIn;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function showLogin(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $remember = $request->has('remember_token');


    if (Auth::guard('web')->validate($credentials)) {
        $user = User::where('email', $credentials['email'])->first();


        if ($user->status === 'INACTIVE') {
            return redirect()->back()->withErrors(['email' => 'Your account is inactive.']);
        }


        if (Auth::guard('web')->attempt($credentials, $remember)) {
            event(new UserLoggedIn(Auth::user()));
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'You have been logged in');
        }
    }

    return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
}


    public function register()
    {
        return view('auth.register');
    }

    public function showRegister(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'confirm_password' => 'required|same:password',
    ]);

    try {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auth::login($user);

       return redirect()->route('login')->with('success', 'User registered successfully.');


    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong. Please try again.');
    }
    }

    public function forgetPassword()
    {

        return view('auth.forget-password');
    }

    public function processforgetPassword(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return redirect()->back()->withErrors(['email' => 'Email not found']);
    }

    $token = Str::random(60);

    DB::table('password_reset_tokens')->where('email', $request->email)->delete();

    DB::table('password_reset_tokens')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => Carbon::now(),
    ]);

   Mail::to($request->email)->send(new SendPasswordReset($token, $request->email));


    return redirect()->back()->with('success', 'Password reset link has been sent to your email.');
}

    public function showResetForm($token, Request $request)
    {
        return view('auth.reset-password', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $reset = DB::table('password_reset_tokens')
                    ->where('email', $request->email)
                    ->where('token', $request->token)
                    ->first();

        if (!$reset) {
            return redirect()->back()->withErrors(['email' => 'Invalid or expired token.']);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'User not found.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();


        DB::table('password_reset_tokens')->where('email', $request->email)->delete();

        return redirect()->route('login')->with('success', 'Password has been reset successfully!');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out');
    }
}
