<?php

namespace App\Http\Controllers\Main{

	class AboutController extends Controller
	{

		public function index()
		{

			return view('main.about.index');

		}

		public function services()
		{

			return view('main.about.services');

		}

	}

}
