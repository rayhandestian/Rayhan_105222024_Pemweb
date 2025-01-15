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
}

?>