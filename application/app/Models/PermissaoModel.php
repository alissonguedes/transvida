<?php

namespace App\Models{

	use Illuminate\Database\Eloquent\Factories\HasFactory;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\Session;

	class PermissaoModel extends Model
	{

		use HasFactory;

		public function getPermissao($rota = null)
		{

			$this->session = Session::get('userdata')[Session::get('app_session')];
			return $this->from('tb_acl_modulo_routes AS Rota')
				->where('name', $rota)
				->where('status', '1')
				->where(function ($where) {
					$where->orWhere('Rota.permissao', '<=', $this->session['permissao']);
					$where->orWhere('Rota.permissao', '<=', $this->session['grupo_permissao']);
				})
				->get()->first() ? true : false;

		}

	}

}
