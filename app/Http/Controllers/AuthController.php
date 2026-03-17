<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }
    
    // Login
    public function login(Request $request)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Redirect based on user role
            $role = auth()->user()->role;
            return match($role) {
                'admin' => redirect('/admin/dashboard'),
                'school' => redirect('/school/dashboard'),
                'student' => redirect('/student/dashboard'),
                default => redirect('/login')
            };
        }

        // Login failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
