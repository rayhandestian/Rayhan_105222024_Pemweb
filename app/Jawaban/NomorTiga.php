<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Log;

class NomorTiga {

	public function getData () {
		$data = Event::where('user_id', Auth::id())->get();
		return $data;
	}

	public function getSelectedData (Request $request) {
		try {
			$data = Event::where('user_id', Auth::id())
				->where('id', $request->id)
				->firstOrFail();
			
			return response()->json([
				'id' => $data->id,
				'name' => $data->name,
				'start' => $data->start,
				'end' => $data->end
			]);
		} catch (\Exception $e) {
			return response()->json(['error' => 'Failed to load event data'], 500);
		}
	}

	public function update (Request $request) {
		try {
			$validatedData = $request->validate([
				'id' => 'required|exists:events,id',
				'event' => 'required|string',
				'start' => 'required|date',
				'end' => 'required|date|after_or_equal:start'
			]);

			$event = Event::where('user_id', Auth::id())
				->where('id', $validatedData['id'])
				->firstOrFail();

			$event->update([
				'name' => $validatedData['event'],
				'start' => $validatedData['start'],
				'end' => $validatedData['end']
			]);

			return response()->json([
				'message' => 'Schedule updated successfully!',
				'status' => 'success'
			]);
		} catch (\Exception $e) {
			Log::error('Schedule update failed: ' . $e->getMessage());
			return response()->json([
				'message' => 'Failed to update schedule: ' . $e->getMessage(),
				'status' => 'error'
			], 500);
		}
	}

	public function delete (Request $request) {
		try {
			$validatedData = $request->validate([
				'id' => 'required|exists:events,id'
			]);

			$event = Event::where('user_id', Auth::id())
				->where('id', $validatedData['id'])
				->firstOrFail();

			$event->delete();

			return response()->json([
				'message' => 'Schedule deleted successfully!',
				'status' => 'success'
			]);
		} catch (\Exception $e) {
			Log::error('Schedule deletion failed: ' . $e->getMessage());
			return response()->json([
				'message' => 'Failed to delete schedule: ' . $e->getMessage(),
				'status' => 'error'
			], 500);
		}
	}
}

?>