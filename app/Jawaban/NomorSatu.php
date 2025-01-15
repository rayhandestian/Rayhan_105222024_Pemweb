<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NomorSatu {

	public function auth (Request $request) {
        $credentials = $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $loginField = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        $authData = [
            $loginField => $request->login,
            'password' => $request->password
        ];

        if (Auth::attempt($authData)) {
            $request->session()->regenerate();
            return redirect()->route('event.home')->with('success', 'Login successful!');
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
	}

	public function logout (Request $request) {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('event.home')->with('success', 'Logged out successfully!');
	}

    public function register(Request $request) {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'username' => 'required|string|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = \App\Models\User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'username' => $validated['username'],
                'password' => bcrypt($validated['password']),
            ]);

            if (!$user) {
                return back()->withErrors(['general' => 'Failed to create user.'])->withInput();
            }

            Auth::login($user);
            
            return redirect()->route('event.home')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            return back()->withErrors(['general' => 'Registration failed: ' . $e->getMessage()])->withInput();
        }
    }
}

?>