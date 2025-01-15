<?php

namespace App\Jawaban;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;

class NomorEmpat {

	public function getJson () {

		// Tuliskan code untuk mengambil semua jadwal, simpan di variabel $data
		$data = [];

		return response()->json($data);
	}
}

?>