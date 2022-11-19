<?php

namespace App\Http\Controllers\Clinica{

	use App\Models\ConvenioModel;
	use App\Models\EmpresaModel;
	use App\Models\EstadoCivilModel;
	use Illuminate\Http\Request;

	class EmpresasController extends Controller
	{

		public function __construct()
		{

			$this->convenio_model    = new ConvenioModel();
			$this->empresa_model     = new EmpresaModel();
			$this->estadoCivil_model = new EstadoCivilModel();

		}

		public function index(Request $request)
		{

			// Pesquisar empresas
			if ($request->ajax()) {
				$dados['paginate'] = $this->empresa_model->getEmpresas($request);
				return response(view('clinica.empresas.list', $dados), 200);
			}

			return response(view('clinica.empresas.index'), 200);

		}

		public function form(Request $request, $id = null)
		{

			$dados['row'] = $this->empresa_model->getEmpresaById($request->id);
			return view('clinica.empresas.form', $dados);

		}

		public function create(Request $request)
		{

			$request->validate([
				'nome_fantasia' => 'required',
				'email'         => 'nullable|email|required_if:receber_notificacoes,on',
			]);

			$id = $this->empresa_model->cadastraEmpresa($request);

			$status = 'success';
			$url    = url()->route('clinica.empresas.index');
			$type   = 'send';

			return response()->json([
				'status'  => $status,
				'message' => 'Empresa cadastrada realizado com sucesso!',
				'type'    => $type,
				'url'     => $url,
			]);

		}

		public function edit(Request $request)
		{

			$request->validate([
				'nome_fantasia' => 'required',
				'email'         => 'nullable|email|required_if:receber_notificacoes,on',
			]);

			$id = $request->id;
			$this->empresa_model->editaEmpresa($request, $id);

			$data['status']      = 'success';
			$data['type']        = 'refresh';
			$data['clean_form']  = true;
			$data['close_modal'] = true;
			$data['url']         = url()->route('clinica.especialidades.index');
			$data['message']     = 'Especialidade cadastrada com sucesso!';

			return response()->json($data);

		}

		public function patch(Request $request)
		{

			$this->empresa_model->from('tb_empresa')
				->whereIn('id', $request->id)
				->update([$request->field => $request->value]);

			return response()->json([
				'message' => 'Empresa atualizado com sucesso!',
			]);

		}

		public function delete(Request $request)
		{

			$this->empresa_model->from('tb_empresa')->whereIn('id', $request->id)->delete();

			$status  = 'success';
			$message = 'Empresa removido com sucesso!';
			$url     = url()->route('clinica.empresas.index');
			$type    = 'send';

			$data['status']      = 'success';
			$data['type']        = 'refresh';
			$data['clean_form']  = true;
			$data['close_modal'] = true;
			$data['url']         = url()->route('clinica.especialidades.index');
			$data['message']     = 'Especialidade cadastrada com sucesso!';

			return response()->json($data);

		}

	}

}
