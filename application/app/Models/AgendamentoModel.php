<?php

namespace App\Models;

use App\Models\FuncionarioModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendamentoModel extends AppModel
{

	use HasFactory;

	private $path = 'assets/clinica/img/agendamentos/';

	protected $table = 'tb_atendimento';
	protected $order = [
		null,
		'nome_fantasia',
		'cnpj',
		'cidade',
		'uf',
		'created_at',
		'status',
	];

	public function __construct()
	{
		$this->funcionario_model = new FuncionarioModel();
	}

	public function getAgendamentos($data = null)
	{

		$get = $this->select(
			'id',
			'titulo',
			'descricao',
			'id_parent',
			'id_tipo',
			'id_medico',
			'id_paciente',
			'id_categoria',
			DB::raw('DATE_FORMAT(data, "%d/%m/%Y") AS data'),
			'hora_agendada',
			'hora_inicial',
			'hora_final',
			'recorrencia',
			'periodo',
			'cor',
			'criador',
			'lembrete',
			'tempo_lembrete',
			DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") AS data_cadastro'),
			DB::raw('DATE_FORMAT(updated_at, "%d/%m/%Y") AS data_atualizacao'),
			'status'
		);

		// if (isset($data) && $search = $data['search']['value']) {
		// 	$get->where(function ($query) use ($search) {
		// 		$query
		// 			->orWhere(DB::raw('REGEXP_REPLACE(cnpj, "[^\\x20-\\x7E]", "")'), 'like', limpa_string($search, '') . '%')
		// 			->orWhere('nome_fantasia', 'like', $search . '%')
		// 			->orWhere('razao_social', 'like', $search . '%')
		// 			->orWhere('inscricao_estadual', 'like', $search . '%')
		// 			->orWhere('inscricao_municipal', 'like', $search . '%')
		// 			->orWhere('email', 'like', $search . '%')
		// 			->orWhere(DB::raw('REGEXP_REPLACE(telefone, "[^\\x20-\\x7E]", "")'), 'like', limpa_string($search, '') . '%')
		// 			->orWhere(DB::raw('REGEXP_REPLACE(celular, "[^\\x20-\\x7E]", "")'), 'like', limpa_string($search, '') . '%');
		// 	});
		// }

		// Order By
		if (isset($_GET['order']) && $_GET['order'][0]['column'] != 0) {
			$get->orderBy($this->order[$_GET['order'][0]['column']], $_GET['order'][0]['dir']);
		} else {
			$get->orderBy($this->order[1], 'asc');
		}

		return $get->paginate(isset($_GET['length']) ? $_GET['length'] : 50);

	}

	public function getAgendamentoById($id)
	{

		return $this->getAgendamentos()
			->where('id', $id)
			->first();

	}

	public function uploadImage(Request $image)
	{
		$imagem = null;

		if ($image->file('imagem')) {
			$file     = $image->imagem;
			$fileName = sha1($file->getClientOriginalName());
			$fileExt  = $file->getClientOriginalExtension();
			$imgName  = explode('.', $file->getClientOriginalName());
			$origName = limpa_string($imgName[count($imgName) - 2], '-') . '.' . $fileExt;
			$imagem   = limpa_string($fileName) . '.' . $fileExt;
			$file->storeAs($this->path, $imagem);
			$imagem = $this->path . $imagem;
		}

		return $imagem;

	}

	public function cadastraAgendamento($post)
	{

		$id             = $post->id;
		$titulo         = $post->titulo;
		$descricao      = $post->descricao;
		$id_parent      = $post->parent;
		$id_tipo        = $post->tipo;
		$id_medico      = $post->medico;
		$id_paciente    = $post->paciente;
		$id_categoria   = $post->categoria;
		$data           = $post->data;
		$hora_agendada  = $post->hora_agendada;
		$hora_inicial   = $post->hora_inicial;
		$hora_final     = $post->hora_final;
		$recorrencia    = $post->recorrencia;
		$periodo        = $post->periodo;
		$cor            = $post->cor;
		$criador        = $post->criador;
		$lembrete       = $post->lembrete ?? 'off';
		$tempo_lembrete = $post->tempo_lembrete;
		$status         = $post->status ?? '0';

		$data = [
			'titulo'         => $titulo,
			'descricao'      => $descricao,
			'id_parent'      => $id_parent,
			'id_tipo'        => $id_tipo,
			'id_medico'      => $id_medico,
			'id_paciente'    => $id_paciente,
			'id_categoria'   => $id_categoria,
			'data'           => $data,
			'hora_agendada'  => $hora_agendada,
			'hora_inicial'   => $hora_inicial,
			'hora_final'     => $hora_final,
			'recorrencia'    => $recorrencia,
			'periodo'        => $periodo,
			'cor'            => $cor,
			'criador'        => $criador,
			'lembrete'       => $lembrete,
			'tempo_lembrete' => $tempo_lembrete,
			'status'         => $status,
		];

		$id_agendamento = $this->from('tb_atendimento')
			->insertGetId($data);

		// if ($id_agendamento) {

		// 	$data = [];

		// 	if (isset($post->departamento) && !empty($post->departamento)) {

		// 		$departamento_model = new DepartamentoModel();

		// 		foreach ($post->departamento as $departamento) {

		// 			$dep = $departamento_model->getDepartamentoAgendamento($id_agendamento, $departamento);

		// 			if (!isset($dep)) {
		// 				$data[] = ['id_departamento' => $departamento, 'id_agendamento' => $id_agendamento];
		// 			}

		// 		}

		// 		return $this->cadastraDepartamento($data);

		// 	}

		// }

		return $id;

	}

	public function editaAgendamento(Request $post, $id_agendamento)
	{

		$id             = $post->id;
		$titulo         = $post->titulo;
		$descricao      = $post->descricao;
		$id_parent      = $post->parent;
		$id_tipo        = $post->tipo;
		$id_medico      = $post->medico;
		$id_paciente    = $post->paciente;
		$id_categoria   = $post->categoria;
		$data           = $post->data;
		$hora_agendada  = $post->hora_agendada;
		$hora_inicial   = $post->hora_inicial;
		$hora_final     = $post->hora_final;
		$recorrencia    = $post->recorrencia;
		$periodo        = $post->periodo;
		$cor            = $post->cor;
		$criador        = $post->criador;
		$lembrete       = $post->lembrete ?? 'off';
		$tempo_lembrete = $post->tempo_lembrete;
		$status         = $post->status ?? '0';

		$data = [
			'titulo'         => $titulo,
			'descricao'      => $descricao,
			'id_parent'      => $id_parent,
			'id_tipo'        => $id_tipo,
			'id_medico'      => $id_medico,
			'id_paciente'    => $id_paciente,
			'id_categoria'   => $id_categoria,
			'data'           => $data,
			'hora_agendada'  => $hora_agendada,
			'hora_inicial'   => $hora_inicial,
			'hora_final'     => $hora_final,
			'recorrencia'    => $recorrencia,
			'periodo'        => $periodo,
			'cor'            => $cor,
			'criador'        => $criador,
			'lembrete'       => $lembrete,
			'tempo_lembrete' => $tempo_lembrete,
			'status'         => $status,
		];

		$isUpdated = $this->from('tb_atendimento')
			->where('id', $id)
			->update($data);

		if ($isUpdated) {

			$param                     = [];
			$remove_deptos             = 0;
			$departamentos_cadastrados = 0;
			$dpto                      = new DepartamentoModel();

			$p['id_agendamento'] = $id_agendamento;

			if (!empty($post->departamento)) {

				foreach ($post->departamento as $id_departamento) {

					$issetDepartamento = $dpto->getDepartamentoAgendamento($id_agendamento, $id_departamento);

					// Adicionar o departamento à tabela `tb_departamento_agendamento`;
					if (!isset($issetDepartamento)) {

						$param = ['id_agendamento' => $id_agendamento, 'id_departamento' => $id_departamento];
						if ($this->cadastraDepartamento($param)) {
							$departamentos_cadastrados++;
						}

					}

					$p['id_departamento'][] = $id_departamento;

				}

				if (!$this->removeDepartamento($p)) {
					return false;
				}

				if ($departamentos_cadastrados > 0) {
					return true;
				}

			} else {

				return $this->removeDepartamento($p);

			}

		}

		return $id_agendamento;

	}

	public function cadastraDepartamento($dados = [])
	{

		return $this->from('tb_departamento_agendamento')
			->insert($dados);

	}

	public function removeDepartamento($dados = [])
	{

		if (!empty($dados)) {

			$departamento_removido     = 0;
			$departamento_nao_removido = 0;
			$departamentos             = [];

			$id_agendamento  = isset($dados['id_agendamento']) ? $dados['id_agendamento'] : false;
			$id_departamento = isset($dados['id_departamento']) ? $dados['id_departamento'] : false;

			$get = $this->select('id', 'id_departamento', 'id_agendamento')
				->from('tb_departamento_agendamento')
				->where('id_agendamento', $id_agendamento);

			if ($id_departamento) {
				$get->whereNotIn('id_departamento', $id_departamento);
			}

			$issetDepartamentos = $get->get();

			if ($issetDepartamentos->count() > 0) {

				foreach ($issetDepartamentos as $depto) {

					$funcionario = $this->funcionario_model->getFuncionariosDepartamento($depto->id);

					if ($funcionario) {

						$departamentos[] = $funcionario->departamento;
						$departamento_nao_removido++;

					} else {

						$deleted = $this->from('tb_departamento_agendamento')
							->where('id', $depto->id)
							->delete();

						$departamento_removido++;

					}

				}

			}

			if ($departamento_nao_removido > 0) {
				$message       = 'Você não pode remover os departamentos "' . implode('", "', $departamentos) . '" desta agendamento enquanto houver funcionário nele';
				$this->error[] = $message;
			}

			if ($departamento_removido > 0) {
				$message       = $departamento_removido . ' departamento' . ($departamento_removido > 1 ? 's' : null) . ' removido' . ($departamento_removido > 1 ? 's' : null);
				$this->error[] = $message;
			}

			if ($this->error) {
				return false;
			}

			return true;

		}

	}

	public function atualizaAgendamento($id, $campos = [])
	{

		return $this->from('tb_atendimento')
			->whereIn('id', $id)
			->update($campos);

	}

	public function removeAgendamento($id_agendamento)
	{

		$agendamentos_removidas     = [];
		$agendamentos_nao_removidas = [];

		foreach ($id_agendamento as $ind => $id) {

			$departamentos = $this->select('id')
				->from('tb_departamento_agendamento')
				->where('id_agendamento', $id)
				->get();

			if ($departamentos->count() > 0) {

				foreach ($departamentos as $departamento) {

					$issetFuncionarios = $this->funcionario_model->getFuncionariosDepartamento($departamento->id);

					if ($issetFuncionarios) {

						$agendamentos_nao_removidas[] = $issetFuncionarios->agendamento;
						array_splice($id_agendamento, $ind, 1);

					} else {

						$agendamentos_removidas[] = $id;

					}

				}

			} else {

				$agendamentos_removidas['sem_departamentos'][] = $id;

			}

		}

		if (!empty($id_agendamento)) {

			$removidas = $this->from('tb_atendimento')
				->whereIn('id', $id_agendamento)
				->delete();

			if ($removidas) {

				$s             = count($id_agendamento) > 1 ? 's' : null;
				$this->error[] = 'A' . $s . ' agendamento' . $s . ' ' . (implode(', ', $id_agendamento)) . ' ' . (count($id_agendamento) > 1 ? ' foram ' : ' foi ') . ' removida' . $s;

			} else {

				$this->error[] = 'Não foi possível remover as agendamentos ' . (implode(', ', $id_agendamento));

			}
		}

		if (!empty($agendamentos_nao_removidas)) {
			$s             = count($agendamentos_nao_removidas) > 1 ? 's' : null;
			$this->error[] = 'A' . $s . ' agendamento' . $s . ' <b>' . (implode(', ', $agendamentos_nao_removidas)) . '</b> não ' . (count($agendamentos_nao_removidas) > 1 ? ' podem ' : ' pode ') . ' ser removida enquanto existirem funcionários cadastrados nela.' . $s;
		}

		if (!empty($this->error)) {
			return false;
		}

		return true;

	}
}
