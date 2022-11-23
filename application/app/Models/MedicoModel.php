<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicoModel extends Model
{

	use HasFactory;

	protected $table = 'tb_medico';
	protected $order = [];

	private $path = 'assets/clinica/img/medicos/';

	public function getMedicos($data = null)
	{

		$get = $this->select(
			'id',
			'id_especialidade',
			'crm',
			'status',
			DB::raw('(SELECT especialidade FROM tb_especialidade WHERE id = id_especialidade) AS especialidade'),
			DB::raw('(SELECT nome FROM tb_funcionario WHERE id = id_funcionario) AS nome'),
			DB::raw('(SELECT cpf FROM tb_funcionario WHERE id = id_funcionario) AS cpf'),
			DB::raw('(SELECT rg FROM tb_funcionario WHERE id = id_funcionario) AS rg'),
			DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") AS data_cadastro'),
			DB::raw('DATE_FORMAT(updated_at, "%d/%m/%Y") AS data_atualizacao')
		);

		if (isset($data) && $search = $data['search']['value']) {
			$get->where(function ($query) use ($search) {
				$query
					->orWhere('id', 'like', $search . '%')
					->orWhere(DB::raw('REGEXP_REPLACE(crm, "[^\\x20-\\x7E]", "")'), 'like', limpa_string($search, '') . '%')
					->orWhere('id_funcionario', function ($query) use ($search) {
						$query->select('id')
							->from('tb_funcionario')
							->where(function ($query) use ($search) {
								$query->where('nome', 'like', $search . '%')
									->orWhere(DB::raw('REGEXP_REPLACE(cpf, "[^\\x20-\\x7E]", "")'), 'like', limpa_string($search, '') . '%')
									->orWhere(DB::raw('REGEXP_REPLACE(rg, "[^\\x20-\\x7E]", "")'), 'like', limpa_string($search, '') . '%');
							})
							->whereColumn('id', 'id_funcionario');
					})
					->orWhere('id_especialidade', function ($query) use ($search) {
						$query->select('id')
							->from('tb_especialidade')
							->where('especialidade', 'like', $search . '%')
							->whereColumn('id', 'id_especialidade');
					});
			});
		}

		$this->order = [
			null,
			DB::raw('(SELECT nome FROM tb_funcionario WHERE id = id_funcionario)'),
			DB::raw('(SELECT especialidade FROM tb_especialidade WHERE id = id_especialidade)'),
			'crm',
			'created_at',
			'status',
		];

		// Order By
		if (isset($_GET['order']) && $_GET['order'][0]['column'] != 0) {
			$get->orderBy($this->order[$_GET['order'][0]['column']], $_GET['order'][0]['dir']);
		} else {
			$get->orderBy($this->order[1], 'asc');
		}

		return $get->paginate(isset($_GET['length']) ? $_GET['length'] : 50);

	}

	public function getMedicoById($id)
	{

		return $this->getMedicos()
			->where('id', $id)
			->first();

	}

	// public function searchMedicos(Request $request)
	// {
	//
	// $query = $request->get('query');
	//
	// return $this->getMedicos()
	// 	->where('nome', 'like', '%' . $query . '%')
	// 	->paginate(isset($_GET['length']) ? $_GET['length'] : 50);
	//
	// }

	public function getEtnia()
	{
		return $this->select('id', 'descricao')
			->from('tb_etnia')
		// ->orderBy('descricao')
			->get();
	}

	public function getAcomodacao()
	{
		return $this->select('id', 'descricao')
			->from('tb_acomodacao')
			->orderBy('descricao')
			->get();
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

	public function cadastraMedico($post)
	{

		$id_especialidade = $post->especialidade;
		$nome             = $post->nome;
		$imagem           = $this->uploadImage($post);
		// $data_nascimento      = $post->data_nascimento ? convert_to_date($post->data_nascimento, 'd/m/Y', 'Y-m-d') : null;
		$cpf = $post->cpf;
		$rg  = $post->rg;
		$crm = $post->crm;
		// $email                = $post->email;
		// $telefone             = $post->telefone;
		// $celular              = $post->celular;
		$status = $post->status ?? '0';

		$data = [
			'id_especialidade' => $id_especialidade,
			'nome'             => $nome,
			// 'imagem'               => $imagem,
			// 'sexo'                 => $sexo,
			// 'data_nascimento'      => $data_nascimento,
			'cpf'              => $cpf,
			'rg'               => $rg,
			'crm'              => $crm,
			// 'email'                => $email,
			// 'telefone'             => $telefone,
			// 'celular'              => $celular,
			'status'           => $status,
		];

		$id = $this->from('tb_medico')
			->insertGetId($data);

		return $id;

	}

	public function editaMedico(Request $post, $id)
	{

		$id_especialidade = $post->especialidade;
		$nome             = $post->nome;
		$imagem           = $this->uploadImage($post);
		// $data_nascimento      = $post->data_nascimento ? convert_to_date($post->data_nascimento, 'd/m/Y', 'Y-m-d') : null;
		$cpf = $post->cpf;
		$rg  = $post->rg;
		$crm = $post->crm;
		// $email                = $post->email;
		// $telefone             = $post->telefone;
		// $celular              = $post->celular;
		$status = $post->status ?? '0';

		$data = [
			'id_especialidade' => $id_especialidade,
			'nome'             => $nome,
			// 'imagem'               => $imagem,
			// 'sexo'                 => $sexo,
			// 'data_nascimento'      => $data_nascimento,
			'cpf'              => $cpf,
			'rg'               => $rg,
			'crm'              => $crm,
			// 'email'                => $email,
			// 'telefone'             => $telefone,
			// 'celular'              => $celular,
			'status'           => $status,
		];

		if (!is_null($imagem)) {
			$data['imagem'] = $imagem;
		}

		$id = $this->from('tb_medico')
			->where('id', $id)
			->update($data);

		return $id;

	}

}
