<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorDua {

	public function submit (Request $request) {

		// Tuliskan code untuk menyimpan data Jadwal
		
		return redirect()->route('event.home');
	}
}

?>