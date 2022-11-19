<?php

namespace App\Http\Controllers\Clinica{

	class HomeController extends Controller
	{

		public function index()
		{

			return view('clinica.dashboard');

		}

	}

}
