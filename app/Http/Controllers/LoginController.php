<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

<<<<<<< HEAD
        $user = User::where('email', '=', $request->input('email'))->first();
        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            $request->session()->put('user', $user);
            return redirect('/home')->with('message', 'Super Admin logged in!');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
=======
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home')->with('message', 'Super Admin logged in!');
>>>>>>> 066ad62 (auth)
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/')->with('success', 'Logged out successfully');
    }
}
