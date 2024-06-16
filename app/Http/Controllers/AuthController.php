<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Authentication passed, regenerate session to prevent fixation attacks
            $request->session()->regenerate();

            // Redirect the user to their intended destination or home page

            if (auth()->user()->is_faculty === 0) {
                return redirect()->route('admin-dashboard');
            } elseif (auth()->user()->is_faculty === 1) {
                return redirect()->route('dashboard');
            } elseif (auth()->user()->is_faculty === 99999) {
                return redirect()->route('support-dashboard');
            }

            // return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->except('password'));
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request)
    {
        // Clear all session data
        $request->session()->invalidate();

        // Log the user out
        Auth::logout();

        // Regenerate the session to prevent fixation attacks
        $request->session()->regenerateToken();

        // Redirect to the homepage or any other desired location
        return redirect('/');
    }
}
