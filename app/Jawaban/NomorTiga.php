<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorTiga {

	public function getData () {
		// Tuliskan code mengambil semua data jadwal user, simpan di variabel $data 
		$data = [];
		return $data;
	}

	public function getSelectedData (Request $request) {

		// Tuliskan code mengambil 1 data jadwal user dengan id jadwal, simpan di variabel $data 
		$data = [];
		return response()->json($data);
	}

	public function update (Request $request) {

		// Tuliskan code mengupdate 1 jadwal
		return redirect()->route('event.home');
	}

	public function delete (Request $request) {

		// Tuliskan code menghapus 1 jadwal
		return redirect()->route('event.home');
	}
}

?>