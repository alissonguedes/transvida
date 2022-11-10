<?php

namespace App\Http\Controllers\Clinica{

	class PacientesController extends Controller
	{

		public function index()
		{

			return view('clinica.pacientes.index');

		}

		public function cadastrar()
		{

			return view('clinica.pacientes.form');

		}

	}

}
