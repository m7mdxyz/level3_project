<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class loginController extends Controller
{
    public function showLoginForm()
    {
        return view("dashboard.auth.login");
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required|email:rfc,dns|string|max:255',
            'password'=> 'required|min:6|max:255'
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            // return Auth::user();
            return redirect('/');
        }

        // return 0;
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        $request->session()->invalidate(); // Invalidate the session

        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect()->intended('/');
    }
}
