<?php

namespace App\Http\Controllers\Clinica{

	use App\Models\AgendamentoModel;
	use App\Models\ConvenioModel;
	use App\Models\DepartamentoModel;
	use App\Models\EstadoCivilModel;
	use Illuminate\Http\Request;

	// use Illuminate\Validation\Rule;

	class AgendamentosController extends Controller
	{

		public function __construct()
		{

			$this->convenio_model     = new ConvenioModel();
			$this->agendamento_model  = new AgendamentoModel();
			$this->departamento_model = new DepartamentoModel();
			$this->estadoCivil_model  = new EstadoCivilModel();

		}

		public function index(Request $request, $tipo = null)
		{

			// Pesquisar agendamentos
			if ($request->ajax()) {
				$dados['paginate'] = $this->agendamento_model->getAgendamentos($request);
				return response(view('clinica.agendamentos.list', $dados), 200);
			}

			return response(view('clinica.agendamentos.index'), 200);

		}

		public function form(Request $request, $id = null, $paciente = null)
		{

			$dados['row']           = $this->agendamento_model->getAgendamentoById($request->id);
			$dados['departamentos'] = $this->departamento_model->getDepartamentos();
			return response(view('clinica.agendamentos.form', $dados), 200);

		}

		public function get_eventos(Request $request, $tipo = null)
		{

			if (!$request->ajax) {
				return response(view('clinica.agendamentos.index'), 200);
			}

			$eventos = [];

			$dados = $this->agendamento_model->getEventos($request);

			if ($dados) {
				foreach ($dados as $row) {
					$medico = $this->agendamento_model->select('nome')
						->from('tb_funcionario AS F')
						->where('id', function ($query) use ($row) {
							$query->select('id_funcionario')
								->from('tb_medico AS M')
								->whereColumn('M.id_funcionario', 'F.id')
								->where('M.id', function ($query) use ($row) {
									$query->select('id_medico')
										->from('tb_medico_clinica')
										->where('id', $row->id_medico);
								});
						})
						->first();

					$evento = '<b>' . date('H:i', strtotime($row->hora_agendada)) . '</b></p></td>';
					$evento .= 'Paciente: ';
					$evento .= $row->paciente . '<br>';
					$evento .= 'Médico: ' . $medico->nome;
					$eventos[] = [
						'title' => $evento,
						// 'title' => 'Paciente: ' . $row->paciente . "<br>" . 'alisson',
						'start' => $row->data . 'T' . $row->hora_agendada,
						'end'   => $row->data . 'T' . $row->hora_agendada,
						// 'backgroundColor' => '#ff0000',
						// 'color'           => '#00ff00',
					];
				}
			}

			return response()->json($eventos);

		}

		public function getDepartamentos(Request $request)
		{

			$dados['select'] = $this->agendamento_model->getDepartamentos($request->clinica);
			return view('clinica.agendamentos.select_departamentos', $dados);

		}

		public function validateForm(Request $request)
		{

			return $request->validate([
				'especialidade' => 'required',
				'clinica'       => 'required',
				'medico'        => [
					'required',
					// 'regex:/[\d]{2}\.[\d]{3}\.[\d]{3}\/[\d]{4}\-[\d]{2}/i',
					// Rule::unique('tb_agendamento', 'cnpj')->ignore($request->post('id'), 'id'),
				],
				'tipo'          => [
					'required',
					// Rule::unique('tb_agendamento', 'inscricao_estadual')->ignore($request->post('id'), 'id'),
				],
				'categoria'     => [
					'required',
					'required_if:receber_notificacoes,on',
				],
				'data'          => [
					'required',
					'regex:/(([0-2][0-9])|([3][0-1]))\/(([0][0-9])|([1][0-2]))\/([20][0-9]{2})/i',
				],
				'hora'          => [
					'required',
					'regex:/(([0-1][0-9])|[2][0-3])\:([0-5][0-9])/i',
				],
				'nome_paciente' => 'required',
			]);

		}

		public function create(Request $request)
		{

			$this->validateForm($request);
			$id = $this->agendamento_model->cadastraAgendamento($request);

			$status  = 'success';
			$message = 'Agendamento cadastrada realizado com sucesso!';
			$close   = true;

			$data['status']      = $status;
			$data['type']        = 'null';
			$data['close_modal'] = $close;
			$data['url']         = url()->route('clinica.agendamentos.index');
			$data['message']     = $message;

			return response()->json($data);

		}

		public function edit(Request $request)
		{

			$this->validateForm($request);

			$id = $request->id;

			if ($this->agendamento_model->editaAgendamento($request, $id)) {
				$status  = 'success';
				$message = 'Cadastro alterado com sucesso!';
			} else {
				$status = 'error';
				// $message = 'Não foi possível atualizar os dados.';
				$message = $this->agendamento_model->getErros();
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
			$message = 'Não foi possível atualizar a agendamento.';

			if ($this->agendamento_model->atualizaAgendamento($request->id, [$request->field => $request->value])) {

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

			if ($this->agendamento_model->removeAgendamento($request->id)) {
				$status  = 'success';
				$message = 'Clínia removida com sucesso!';
			} else {
				$status  = 'error';
				$message = $this->agendamento_model->getErros();
			}

			$data['status']      = $status;
			$data['message']     = $message;
			$data['type']        = 'refresh';
			$data['clean_form']  = true;
			$data['close_modal'] = true;
			$data['url']         = url()->route('clinica.clinicas.index');

			return response()->json($data);

		}

	}

}
