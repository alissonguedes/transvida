<?php

namespace App\Models{

	use Illuminate\Foundation\Auth\User as Authenticatable;

	class ConvenioModel extends Authenticatable
	{

		// use HasApiTokens, HasFactory, Notifiable;

		protected $table = 'tb_convenio';

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array<int, string>
		 */
		protected $fillable = [
			'name',
			'email',
			'password',
		];

		/**
		 * The attributes that should be hidden for serialization.
		 *
		 * @var array<int, string>
		 */
		protected $hidden = [
			'password',
			'remember_token',
		];

		/**
		 * The attributes that should be cast.
		 *
		 * @var array<string, string>
		 */
		protected $casts = [
			'email_verified_at' => 'datetime',
		];

		public $timestamps = false;

		public function getConvenio()
		{

			return $this->select('*')
				->get();

		}

	}

}
