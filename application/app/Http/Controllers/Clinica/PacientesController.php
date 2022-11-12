<?php

namespace App\Http\Controllers\Clinica{

	use App\Models\ConvenioModel;
	use App\Models\PacienteModel;
	use Illuminate\Http\Request;

	class PacientesController extends Controller
	{

		public function __construct()
		{

			$this->convenio_model = new ConvenioModel();
			$this->paciente_model = new PacienteModel();

		}

		public function index(Request $request)
		{

			if ($request->ajax()) {
				$dados['paginate'] = $this->paciente_model->getPacientes();
				return view('clinica.pacientes.list', $dados);
			}

			return view('clinica.pacientes.index');

		}

		public function form()
		{

			$dados['convenios'] = $this->convenio_model->getConvenio();
			return view('clinica.pacientes.form', $dados);

		}

		public function create(Request $request)
		{

			$id = $this->paciente_model->cadastraPaciente($request);

			$status = 'success';
			$url    = url()->route('clinica.pacientes.index');
			$type   = 'send';

			return response()->json(['message' => 'Dados cadastrados com sucesso!', 'url' => $url, 'type' => $type]);

		}

		public function patch(Request $request)
		{

			$this->paciente_model->from('tb_paciente')
				->whereIn('id', $request->id)
				->update([$request->field => $request->value]);

			$status  = 'success';
			$message = ucfirst($request->field) . ' atualizado com sucesso!';
			$url     = url()->route('clinica.pacientes.index');
			$type    = 'send';

			return response()->json(['message' => 'Paciente atualizado com sucesso!']);
			// return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url], 200);

		}

		public function delete(Request $request)
		{

			$this->paciente_model->from('tb_paciente')->whereIn('id', $request->id)->delete();

			$status  = 'success';
			$message = 'Paciente removido com sucesso!';
			$url     = url()->route('clinica.pacientes.index');
			$type    = 'send';

			return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url], 200);

		}

	}

}
