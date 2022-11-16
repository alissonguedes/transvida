<?php

namespace App\Http\Controllers\Clinica{

	use App\Models\ConvenioModel;
	use App\Models\EstadoCivilModel;
	use App\Models\MedicoModel;
	use Illuminate\Http\Request;

	class MedicosController extends Controller
	{

		public function __construct()
		{

			$this->convenio_model    = new ConvenioModel();
			$this->medico_model      = new MedicoModel();
			$this->estadoCivil_model = new EstadoCivilModel();

		}

		public function index(Request $request)
		{

			if ($request->ajax()) {
				$dados['medicos'] = $this->medico_model->searchMedicos($request);
				return response(view('clinica.medicos.list', $dados), 200);
			}

			$dados['medicos'] = $this->medico_model->getMedicos();
			return view('clinica.medicos.index', $dados);

		}

		public function form(Request $request, $id = null)
		{

			$dados['row']          = $this->medico_model->getMedicoById($id);
			$dados['acomodacoes']  = $this->medico_model->getAcomodacao();
			$dados['etnias']       = $this->medico_model->getEtnia();
			$dados['convenios']    = $this->convenio_model->getConvenio();
			$dados['estado_civil'] = $this->estadoCivil_model->getEstadoCivil();
			return view('clinica.medicos.form', $dados);

		}

		public function create(Request $request)
		{

			$request->validate([
				'nome'  => 'required',
				'email' => 'nullable|email|required_if:receber_notificacoes,on',
			]);

			$id = $this->medico_model->cadastraMedico($request);

			$status = 'success';
			$url    = url()->route('clinica.medicos.index');
			$type   = 'send';

			return response()->json([
				'status'  => $status,
				'message' => 'Médico cadastrado realizado com sucesso!',
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
			$this->medico_model->editaMedico($request, $id);

			return response()->json(['message' => 'Dados atualizados com sucesso!']);

		}

		public function patch(Request $request)
		{

			$this->medico_model->from('tb_medico')
				->whereIn('id', $request->id)
				->update([$request->field => $request->value]);

			return response()->json([
				'message' => 'Médico atualizado com sucesso!',
			]);

		}

		public function delete(Request $request)
		{

			$this->medico_model->from('tb_medico')->whereIn('id', $request->id)->delete();

			$status  = 'success';
			$message = 'Medico removido com sucesso!';
			$url     = url()->route('clinica.medicos.index');
			$type    = 'send';

			return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url], 200);

		}

	}

}
