<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresaModel extends Model
{

	use HasFactory;

	protected $table = 'tb_empresa';
	protected $order = [
		null,
		'nome_fantasia',
		'cnpj',
		'cidade',
		'uf',
		'convenio',
		'status',
		null,
	];

	private $path = 'assets/clinica/img/empresas/';

	public function getEmpresas($data = null)
	{

		$get = $this->select(
			'id',
			'nome_fantasia',
			'razao_social',
			'cnpj',
			'inscricao_estadual',
			'inscricao_municipal',
			'cep',
			'logradouro',
			'numero',
			'bairro',
			'complemento',
			'cidade',
			'uf',
			'pais',
			'quem_somos',
			'quem_somos_imagem',
			'distribuidor_imagem',
			'contato_imagem',
			'telefone',
			'celular',
			'email',
			'facebook',
			'instagram',
			'youtube',
			'linkedin',
			'github',
			'gmaps',
			'aliquota_imposto',
			'tributacao',
			'certificado',
			'senha_certificado',
			'ambiente',
			'sequence_nfe',
			'serie_nfe',
			'sequence_nfce',
			'tokencsc',
			'csc',
			'matriz',
			DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") AS data_cadastro'),
			DB::raw('DATE_FORMAT(updated_at, "%d/%m/%Y") AS data_atualizacao'),
			'status'
		);

		if (isset($data) && $search = $data['query']) {
			$get->where(function ($query) use ($search) {
				$query
					->orWhere('cnpj', 'like', $search . '%')
					->orWhere('nome_fantasia', 'like', $search . '%')
					->orWhere('razao_social', 'like', $search . '%')
					->orWhere('inscricao_estadual', 'like', $search . '%')
					->orWhere('inscricao_municipal', 'like', $search . '%')
					->orWhere('email', 'like', $search . '%')
					->orWhere('telefone', 'like', $search . '%')
					->orWhere('celular', 'like', $search . '%');
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

	public function getEmpresaById($id)
	{

		return $this->getEmpresas()
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

	public function cadastraEmpresa($post)
	{

		$id                  = $post->id;
		$nome_fantasia       = $post->nome_fantasia;
		$razao_social        = $post->razao_social;
		$cnpj                = $post->cnpj;
		$inscricao_estadual  = $post->inscricao_estadual;
		$inscricao_municipal = $post->inscricao_municipal;
		$cep                 = $post->cep;
		$logradouro          = $post->logradouro;
		$numero              = $post->numero;
		$bairro              = $post->bairro;
		$complemento         = $post->complemento;
		$cidade              = $post->cidade;
		$uf                  = $post->uf;
		$pais                = $post->pais;
		$quem_somos          = $post->quem_somos ?? null;
		$quem_somos_imagem   = $this->uploadImage($post);
		$distribuidor_imagem = $this->uploadImage($post);
		$contato_imagem      = $this->uploadImage($post);
		$telefone            = $post->telefone ?? null;
		$celular             = $post->celular ?? null;
		$email               = $post->email ?? null;
		$facebook            = $post->facebook ?? null;
		$instagram           = $post->instagram ?? null;
		$youtube             = $post->youtube ?? null;
		$linkedin            = $post->linkedin ?? null;
		$github              = $post->github ?? null;
		$gmaps               = $post->gmaps ?? null;
		$aliquota_imposto    = $post->aliquota_imposto ?? 0.00;
		$tributacao          = $post->tributacao ?? 'simples nacional';
		$certificado         = $post->certificado ?? null;
		$senha_certificado   = $post->senha_certificado ?? null;
		$ambiente            = $post->ambiente ?? '0';
		$sequence_nfe        = $post->sequence_nfe ?? 0;
		$serie_nfe           = $post->serie_nfe ?? 0;
		$sequence_nfce       = $post->sequence_nfce ?? 0;
		$tokencsc            = $post->tokencsc ?? null;
		$csc                 = $post->csc ?? null;
		$matriz              = $post->matriz ?? '0';
		$status              = $post->status ?? '0';

		$data = [
			'nome_fantasia'       => $nome_fantasia,
			'razao_social'        => $razao_social,
			'cnpj'                => $cnpj,
			'inscricao_estadual'  => $inscricao_estadual,
			'inscricao_municipal' => $inscricao_municipal,
			'cep'                 => $cep,
			'logradouro'          => $logradouro,
			'numero'              => $numero,
			'bairro'              => $bairro,
			'complemento'         => $complemento,
			'cidade'              => $cidade,
			'uf'                  => $uf,
			'pais'                => $pais,
			'quem_somos'          => $quem_somos,
			'quem_somos_imagem'   => $quem_somos_imagem,
			'distribuidor_imagem' => $distribuidor_imagem,
			'contato_imagem'      => $contato_imagem,
			'telefone'            => $telefone,
			'celular'             => $celular,
			'email'               => $email,
			'facebook'            => $facebook,
			'instagram'           => $instagram,
			'youtube'             => $youtube,
			'linkedin'            => $linkedin,
			'github'              => $github,
			'gmaps'               => $gmaps,
			'aliquota_imposto'    => $aliquota_imposto,
			'tributacao'          => $tributacao,
			'certificado'         => $certificado,
			'senha_certificado'   => $senha_certificado,
			'ambiente'            => $ambiente,
			'sequence_nfe'        => $sequence_nfe,
			'serie_nfe'           => $serie_nfe,
			'sequence_nfce'       => $sequence_nfce,
			'tokencsc'            => $tokencsc,
			'csc'                 => $csc,
			'matriz'              => $matriz,
			'status'              => $status,
		];

		$id = $this->from('tb_empresa')
			->insertGetId($data);

		return $id;

	}

	public function editaEmpresa(Request $post, $id)
	{

		$id                  = $post->id;
		$nome_fantasia       = $post->nome_fantasia;
		$razao_social        = $post->razao_social;
		$cnpj                = $post->cnpj;
		$inscricao_estadual  = $post->inscricao_estadual;
		$inscricao_municipal = $post->inscricao_municipal;
		$cep                 = $post->cep;
		$logradouro          = $post->logradouro;
		$numero              = $post->numero;
		$bairro              = $post->bairro;
		$complemento         = $post->complemento;
		$cidade              = $post->cidade;
		$uf                  = $post->uf;
		$pais                = $post->pais;
		$quem_somos          = $post->quem_somos ?? null;
		$quem_somos_imagem   = $this->uploadImage($post);
		$distribuidor_imagem = $this->uploadImage($post);
		$contato_imagem      = $this->uploadImage($post);
		$telefone            = $post->telefone ?? null;
		$celular             = $post->celular ?? null;
		$email               = $post->email ?? null;
		$facebook            = $post->facebook ?? null;
		$instagram           = $post->instagram ?? null;
		$youtube             = $post->youtube ?? null;
		$linkedin            = $post->linkedin ?? null;
		$github              = $post->github ?? null;
		$gmaps               = $post->gmaps ?? null;
		$aliquota_imposto    = $post->aliquota_imposto ?? 0.00;
		$tributacao          = $post->tributacao ?? 'simples nacional';
		$certificado         = $post->certificado ?? null;
		$senha_certificado   = $post->senha_certificado ?? null;
		$ambiente            = $post->ambiente ?? '0';
		$sequence_nfe        = $post->sequence_nfe ?? 0;
		$serie_nfe           = $post->serie_nfe ?? 0;
		$sequence_nfce       = $post->sequence_nfce ?? 0;
		$tokencsc            = $post->tokencsc ?? null;
		$csc                 = $post->csc ?? null;
		$matriz              = $post->matriz ?? '0';
		$status              = $post->status ?? '0';

		$data = [
			'nome_fantasia'       => $nome_fantasia,
			'razao_social'        => $razao_social,
			'cnpj'                => $cnpj,
			'inscricao_estadual'  => $inscricao_estadual,
			'inscricao_municipal' => $inscricao_municipal,
			'cep'                 => $cep,
			'logradouro'          => $logradouro,
			'numero'              => $numero,
			'bairro'              => $bairro,
			'complemento'         => $complemento,
			'cidade'              => $cidade,
			'uf'                  => $uf,
			'pais'                => $pais,
			'quem_somos'          => $quem_somos,
			'telefone'            => $telefone,
			'celular'             => $celular,
			'email'               => $email,
			'facebook'            => $facebook,
			'instagram'           => $instagram,
			'youtube'             => $youtube,
			'linkedin'            => $linkedin,
			'github'              => $github,
			'gmaps'               => $gmaps,
			'aliquota_imposto'    => $aliquota_imposto,
			'tributacao'          => $tributacao,
			'certificado'         => $certificado,
			'senha_certificado'   => $senha_certificado,
			'ambiente'            => $ambiente,
			'sequence_nfe'        => $sequence_nfe,
			'serie_nfe'           => $serie_nfe,
			'sequence_nfce'       => $sequence_nfce,
			'tokencsc'            => $tokencsc,
			'csc'                 => $csc,
			'matriz'              => $matriz,
			'status'              => $status,
		];

		if (!is_null($quem_somos_imagem)) {
			$data['quem_somos_imagem'] = $quem_somos_imagem;
		}

		if (!is_null($distribuidor_imagem)) {
			$data['distribuidor_imagem'] = $distribuidor_imagem;
		}

		if (!is_null($contato_imagem)) {
			$data['contato_imagem'] = $contato_imagem;
		}

		$id = $this->from('tb_empresa')
			->where('id', $id)
			->update($data);

		return $id;

	}

}
