<?php

namespace App\Http\Controllers\Clinica{

	use App\Models\DepartamentoModel;
	use App\Models\EmpresaModel;
	use App\Models\EstadoCivilModel;
	use App\Models\FuncaoModel;
	use App\Models\FuncionarioModel;
	use Illuminate\Http\Request;
	use Illuminate\Validation\Rule;

	class FuncionariosController extends Controller
	{

		public function __construct()
		{

			$this->departamento_model = new DepartamentoModel();
			$this->funcoes_model      = new FuncaoModel();
			$this->empresa_model      = new EmpresaModel();
			$this->funcionario_model  = new FuncionarioModel();
			$this->estadoCivil_model  = new EstadoCivilModel();

		}

		public function index(Request $request)
		{

			if ($request->ajax()) {
				$dados['paginate'] = $this->funcionario_model->getFuncionarios($request);
				return response(view('clinica.funcionarios.list', $dados), 200);
			}

			// $dados['funcionarios'] = $this->funcionario_model->getFuncionarios();
			// $dados['funcoes']      = $this->funcoes_model->getFuncoes();
			// $dados['clinicas']     = $this->empresa_model->getEmpresas();

			return view('clinica.funcionarios.index');

		}

		public function form(Request $request, $id = null)
		{

			$dados['row']           = $this->funcionario_model->getFuncionarioById($id);
			$dados['departamentos'] = $this->departamento_model->getDepartamentos();
			$dados['etnias']        = $this->funcionario_model->getEtnia();
			$dados['estado_civil']  = $this->estadoCivil_model->getEstadoCivil();
			$dados['funcoes']       = $this->funcoes_model->getFuncoes();
			$dados['clinicas']      = $this->empresa_model->getEmpresasComDepartamento();
			// $dados['clinicas']      = $this->empresa_model->getEmpresas();

			return view('clinica.funcionarios.form', $dados);

		}

		public function formValidate(Request $request)
		{
			return $request->validate([
				'nome'   => 'required',
				'email'  => [
					'nullable|email|required_if:receber_notificacoes,on',
					Rule::unique('tb_funcionario', 'email')->ignore($request->post('id'), 'id'),
				],
				'cpf'    => [
					'required',
					Rule::unique('tb_funcionario', 'cpf')->ignore($request->post('id'), 'id'),
				],
				'rg'     => [
					'required',
					Rule::unique('tb_funcionario', 'rg')->ignore($request->post('id'), 'id'),
				],
				'funcao' => 'required',

			]);
		}

		public function create(Request $request)
		{

			$this->formValidate($request);

			$id = $this->funcionario_model->cadastraFuncionario($request);

			$status = 'success';
			$url    = url()->route('clinica.funcionarios.index');
			$type   = 'send';

			$data['status']      = 'success';
			$data['type']        = 'refresh';
			$data['clean_form']  = true;
			$data['close_modal'] = true;
			$data['url']         = url()->route('clinica.funcionarios.index');
			$data['message']     = 'Funcoe cadastrada com sucesso!';

			return response()->json($data);

		}

		public function edit(Request $request)
		{

			$this->formValidate($request);

			$id = $request->id;
			$this->funcionario_model->editaFuncionario($request, $id);

			$data['status']      = 'success';
			$data['type']        = 'refresh';
			$data['clean_form']  = true;
			$data['close_modal'] = true;
			$data['url']         = url()->route('clinica.funcionarios.index');
			$data['message']     = 'Funcoe cadastrada com sucesso!';

			return response()->json($data);

		}

		public function patch(Request $request)
		{

			$this->funcionario_model->from('tb_funcionario')
				->whereIn('id', $request->id)
				->update([$request->field => $request->value]);

			return response()->json([
				'message' => 'Médico atualizado com sucesso!',
			]);

		}

		public function delete(Request $request)
		{

			$this->funcionario_model->from('tb_funcionario')->whereIn('id', $request->id)->delete();

			$status  = 'success';
			$message = 'Funcionário removido com sucesso!';
			$url     = url()->route('clinica.funcionarios.index');
			$type    = 'send';

			return json_encode(['status' => $status, 'message' => $message, 'type' => $type, 'url' => $url], 200);

		}

	}

}