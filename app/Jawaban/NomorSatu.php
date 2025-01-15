<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NomorSatu {

	public function auth (Request $request) {

		// Tuliskan code untuk proses login dengan menggunakan email/username dan password

		return redirect()->route('event.home');
	}

	public function logout (Request $request) {

		// Tuliskan code untuk menangani proses logout
        
        return redirect()->route('event.home');
	}
}

?>