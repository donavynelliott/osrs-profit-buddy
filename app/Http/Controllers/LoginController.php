<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // If user clicked demo login button then use the demo login method
        if ($request->has('demo_login')) {
            return $this->demoLogin();
        }
        
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        Auth::login($user);

        return redirect('/');
    }

    /**
     * Logs in a demo user and redirects to the home page
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function demoLogin()
    {
        // Find or create the demo account
        $demoEmail = 'demo@example.com';
        $demoPassword = 'demopassword';

        $demoUser = User::where('email', $demoEmail)->first();

        if (!$demoUser) {
            $demoUser = User::create([
                'name' => 'Demo User',
                'email' => $demoEmail,
                'password' => Hash::make($demoPassword),
            ]);
        }

        // Log in the demo user
        Auth::login($demoUser);

        return redirect('/');
    }
}