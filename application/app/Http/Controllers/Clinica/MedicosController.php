<?php

namespace App\Http\Controllers\Clinica{

	use App\Models\ConvenioModel;
	use App\Models\EstadoCivilModel;
	use App\Models\PacienteModel;
	use Illuminate\Http\Request;

	class MedicosController extends Controller
	{

		public function __construct()
		{

			$this->convenio_model    = new ConvenioModel();
			$this->paciente_model    = new PacienteModel();
			$this->estadoCivil_model = new EstadoCivilModel();

		}

		public function index(Request $request)
		{

			if ($request->ajax()) {
				$dados['pacientes'] = $this->paciente_model->searchPacientes($request);
				return response(view('clinica.pacientes.list', $dados), 200);
			}

			$dados['pacientes'] = $this->paciente_model->getPacientes();
			return view('clinica.pacientes.index', $dados);

		}

		public function form(Request $request, $id = null)
		{

			$dados['row']          = $this->paciente_model->getPacienteById($id);
			$dados['acomodacoes']  = $this->paciente_model->getAcomodacao();
			$dados['etnias']       = $this->paciente_model->getEtnia();
			$dados['convenios']    = $this->convenio_model->getConvenio();
			$dados['estado_civil'] = $this->estadoCivil_model->getEstadoCivil();
			return view('clinica.pacientes.form', $dados);

		}

		public function create(Request $request)
		{

			$request->validate([
				'nome'  => 'required',
				'email' => 'nullable|email|required_if:receber_notificacoes,on',
			]);

			$id = $this->paciente_model->cadastraPaciente($request);

			$status = 'success';
			$url    = url()->route('clinica.pacientes.index');
			$type   = 'send';

			return response()->json([
				'status'  => $status,
				'message' => 'Paciente cadastrado realizado com sucesso!',
				'type'    => $type,
				'url'     => $url,
			]);
		}

		public function edit(Request $request)
		{

			$request->validate([
				'nome'  => 'required',
				'email' => 'nullable|email|required_if:receber_notificacoes,on',
			]);

			$id = $request->id;
			$this->paciente_model->editaPaciente($request, $id);

			return response()->json(['message' => 'Dados atualizados com sucesso!']);

		}

		public function patch(Request $request)
		{

			$this->paciente_model->from('tb_paciente')
				->whereIn('id', $request->id)
				->update([$request->field => $request->value]);

			return response()->json([
				'message' => 'Paciente atualizado com sucesso!',
			]);

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
