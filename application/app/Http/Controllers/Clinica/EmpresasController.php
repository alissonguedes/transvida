<?php

namespace App\Http\Controllers\Clinica{

	use App\Models\ConvenioModel;
	use App\Models\DepartamentoModel;
	use App\Models\EmpresaModel;
	use App\Models\EstadoCivilModel;
	use Illuminate\Http\Request;

	class EmpresasController extends Controller
	{

		public function __construct()
		{

			$this->convenio_model     = new ConvenioModel();
			$this->empresa_model      = new EmpresaModel();
			$this->departamento_model = new DepartamentoModel();
			$this->estadoCivil_model  = new EstadoCivilModel();

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

			$dados['row']           = $this->empresa_model->getEmpresaById($request->id);
			$dados['departamentos'] = $this->departamento_model->getDepartamentos();
			return view('clinica.empresas.form', $dados);

		}

		public function getDepartamentos(Request $request)
		{

			$dados['select'] = $this->empresa_model->getDepartamentos($request->clinica);
			return view('clinica.empresas.select_departamentos', $dados);

		}

		public function validateForm(Request $request)
		{

			return $request->validate([
				'nome_fantasia' => 'required',
				'razao_social'  => 'required',
				'cnpj'          => [
					'required',
					'regex:/[\d]{2}\.[\d]{3}\.[\d]{3}\/[\d]{4}\-[\d]{2}/i',
				],
				'email'         => [
					'nullable',
					'email',
					'required_if:receber_notificacoes,on',
				],
				'cep'           => [
					'required',
					'regex:/[\d]{5}\-[\d]{3}/i',
				],
				'logradouro'    => 'required',
				'bairro'        => 'required',
				'cidade'        => 'required',
				'uf'            => [
					'required',
					'min:2',
					'max:2',
				],
			]);

		}

		public function create(Request $request)
		{

			$this->validateForm($request);

			$id = $this->empresa_model->cadastraEmpresa($request);

			$status = 'success';
			$url    = url()->route('clinica.clinicas.index');
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

			$this->validateForm($request);

			$id = $request->id;

			if ($this->empresa_model->editaEmpresa($request, $id)) {
				$status  = 'success';
				$message = 'Cadastro alterado com sucesso!';
			} else {
				$status = 'error';
				// $message = 'Não foi possível atualizar os dados.';
				$message = $this->empresa_model->getErros();
			}

			$data['status']      = $status;
			$data['type']        = 'null';
			$data['clean_form']  = false;
			$data['close_modal'] = false;
			$data['url']         = url()->route('clinica.clinicas.index');
			$data['message']     = $message;

			return response()->json($data);

		}

		public function patch(Request $request)
		{

			$status  = 'error';
			$message = 'Não foi possível atualizar a empresa.';

			if ($this->empresa_model->atualizaEmpresa($request->id, [$request->field => $request->value])) {

				$status  = 'success';
				$message = 'Clínica atualizada com sucesso!';

			}

			$data['status']      = $status;
			$data['type']        = 'refresh';
			$data['clean_form']  = true;
			$data['close_modal'] = true;
			$data['url']         = url()->route('clinica.clinicas.index');
			$data['message']     = $message;

			return response()->json($data);

		}

		public function delete(Request $request)
		{

			if ($this->empresa_model->removeEmpresa($request->id)) {

				$status  = 'success';
				$message = 'Clínia removida com sucesso!';

			} else {

				$status  = 'error';
				$message = 'Clínica não pôde ser removida!';

			}

			$data['status']      = $status;
			$data['type']        = 'refresh';
			$data['clean_form']  = true;
			$data['close_modal'] = true;
			$data['url']         = url()->route('clinica.clinicas.index');
			$data['message']     = $message;

			return response()->json($data);

		}

	}

}
