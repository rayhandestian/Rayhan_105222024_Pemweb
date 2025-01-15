<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorEmpat {

	public function getJson () {
		try {
			// Get all events with their associated users
			$events = Event::with('user')->get();
			
			// Get current user id
			$currentUserId = Auth::id();
			
			// Format the data with required fields
			$data = $events->map(function($event) use ($currentUserId) {
				return [
					'id' => $event->id,
					'title' => $event->name,
					'start' => $event->start,
					'end' => $event->end,
					'user' => $event->user->name,
					// Blue for current user's events, gray for others
					'color' => $event->user_id === $currentUserId ? '#007bff' : '#6c757d',
					'allDay' => true
				];
			});

			return response()->json($data);
		} catch (\Exception $e) {
			return response()->json(['error' => $e->getMessage()], 500);
		}
	}
}

?>