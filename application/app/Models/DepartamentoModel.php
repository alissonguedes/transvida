<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepartamentoModel extends Model
{

	use HasFactory;

	protected $table = 'tb_departamento';
	protected $order = [
		null,
		'titulo',
		'descricao',
		'created_at',
		'updated_at',
		'status',
	];

	private $path = 'assets/clinica/img/departamentos/';

	public function getDepartamentos($data = null)
	{

		$get = $this->select(
			'id',
			'titulo',
			'descricao',
			DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") AS data_cadastro'),
			DB::raw('DATE_FORMAT(updated_at, "%d/%m/%Y") AS data_atualizacao'),
			'status'
		);

		if (isset($data) && $search = $data['search']['value']) {
			$get->where(function ($query) use ($search) {
				$query
					->orWhere('id', 'like', $search . '%')
					->orWhere('titulo', 'like', $search . '%')
					->orWhere('descricao', 'like', $search . '%');
			});
		}

		// Order By
		if (isset($_GET['order']) && $_GET['order'][0]['column'] != 0) {
			$get->orderBy($this->order[$_GET['order'][0]['column']], $_GET['order'][0]['dir']);
		} else {
			$get->orderBy($this->order[1], 'asc');
		}

		return $get->paginate(isset($_GET['length']) ? $_GET['length'] : 50);

	}

	public function getDepartamentoById($id)
	{

		return $this->getDepartamentos()
			->where('id', $id)
			->first();

	}

	public function getDepartamentoEmpresa($id_empresa, $id_departamento = null)
	{

		$dp = $this->select('id', 'titulo', 'descricao', 'status')
			->from('tb_departamento')
			->whereIn('id', function ($query) use ($id_empresa, $id_departamento) {
				$query->select('id_departamento')
					->from('tb_departamento_empresa')
					->whereColumn('id_departamento', 'tb_departamento.id')
					->where('id_empresa', $id_empresa)
					->where('id_departamento', $id_departamento);
			})
			->get()
			->first();

		return $dp;

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

	public function cadastraDepartamento($post)
	{

		$id        = $post->id;
		$titulo    = $post->titulo;
		$descricao = $post->descricao;
		$imagem    = $this->uploadImage($post);
		$status    = $post->status ?? '0';

		$data = [
			'titulo'    => $titulo,
			'descricao' => $descricao,
			// 'imagem'              => $imagem,
			'status'    => $status,
		];

		$id = $this->from('tb_departamento')
			->insertGetId($data);

		return $id;

	}

	public function editaDepartamento(Request $post, $id)
	{

		$id        = $post->id;
		$titulo    = $post->titulo;
		$descricao = $post->descricao;
		$imagem    = $this->uploadImage($post);
		$status    = $post->status ?? '0';

		$data = [
			'titulo'    => $titulo,
			'descricao' => $descricao,
			// 'imagem'              => $imagem,
			'status'    => $status,
		];

		if (!is_null($imagem)) {
			$data['imagem'] = $imagem;
		}

		$id = $this->from('tb_departamento')
			->where('id', $id)
			->update($data);

		return $id;

	}

	public function atualizaDepartamento($id, $campos = [])
	{

		return $this->from('tb_departamento')
			->whereIn('id', $id)
			->update($campos);

	}

	public function removeDepartamento($id)
	{
		return $this->from('tb_departamento')
			->whereIn('id', $id)
			->delete();
	}
}
