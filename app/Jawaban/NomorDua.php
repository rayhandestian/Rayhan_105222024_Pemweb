<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorDua {

	public function submit (Request $request) {
		$validatedData = $request->validate([
			'event' => 'required|string',
			'start' => 'required|date',
			'end' => 'required|date|after_or_equal:start'
		]);

		Event::create([
			'user_id' => Auth::id(),
			'name' => $validatedData['event'],
			'start' => $validatedData['start'],
			'end' => $validatedData['end']
		]);
		
		return redirect()->route('event.home');
	}
}

?>