<?php

use App\Models\ConfigModel;
use App\Models\MenuModel;

if (!function_exists('data')) {
	function data($data, $format = 'd.m.Y H:i:s', $new_format)
	{
		$mes  = ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'];
		$data = date($format, strtotime($data));
		$data = preg_replace('/\.(\d){2}\./', $new_format . $mes[date('m', strtotime($data)) - 1] . $new_format, $data);

		return $data;
	}
}

if (!function_exists('convert_to_date')) {
	function convert_to_date($data, $format = 'd/m/Y H:i:s', $to_format = 'Y-m-d H:i:s')
	{
		return \Carbon\Carbon::createFromFormat($format, $data)->format($to_format);
	}
}

if (!function_exists('get_config')) {
	function get_config($config)
	{
		$cfg = new ConfigModel();
		// return $cfg->getConfigByKey($config)->first()->value ?? null;
		return $cfg->getConfigByKey($config) ?? null;
	}
}

function tradutor($traducao, $lang = null, $except = null)
{
	$idioma = is_null($lang) ? (isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : get_config('language')) : $lang;

	// Formata a data e hora de acordo com o Idioma
	if (is_object($traducao)) {
		$date = (string) $traducao;

		switch ($idioma) {
			case 'en':$formato = 'Y-m-d h:ia';
				break;
			case 'pt-br':$formato = 'd/m/Y H\hi';
				break;
			case 'hr':$formato = 'd-m-y h:ia';
				break;
		}

		return date($formato, strtotime($date));
	}

	$return = is_string($traducao) ? json_decode($traducao, true) : $traducao;

	if (is_array($return) && array_key_exists($idioma, $return)) {
		if (!empty($return[$idioma])) {
			return $return[$idioma];
		}
	} else {
		return tradutor([$idioma => $traducao]);
	}

	$catch = [
		'en'    => 'Translation not available for this language',
		'hr'    => 'A fordítás nem érhetó el ezen a nyelven',
		'pt-br' => 'Tradução não disponível para este idioma',
	];

	$except = !is_null($except) ? $except : $catch;

	return $except[$idioma];
}

if (!function_exists('hashCode')) {
	function hashCode($str, $min = 32, $max = 92)
	{
		$pass          = hash('whirlpool', $str);
		$salt          = hash('sha512', $str);
		$password      = substr($pass, $min, 92) . substr($salt, $min, 54);
		$password_hash = hash('sha512', hash('md5', $password));
		$hash          = substr(hash('whirlpool', hash('sha512', $pass . $salt . $password . $password_hash)), 0, 90);

		return !empty($str) ? substr(hash('whirlpool', hash('sha512', $hash)), 0, 77) : null;

		// return !empty($str) ? substr(hash('sha512', $str), 0, 50) : null;
	}
}

function configuracoes()
{
}

/**
 * Remove caratecres especiais
 * Converte todos os caracteres de um arquivo para caixa baixa
 * Remove espaçamentos.
 */
function limpa_string($string, $replace = '-')
{
	$output = [];
	$a      = ['Á' => 'a', 'À' => 'a', 'Â' => 'a', 'Ä' => 'a', 'Ã' => 'a', 'Å' => 'a', 'á' => 'a', 'à' => 'a', 'â' => 'a', 'ä' => 'a', 'ã' => 'a', 'å' => 'a', 'a' => 'a', 'Ç' => 'c', 'ç' => 'c', 'Ð' => 'd', 'É' => 'e', 'È' => 'e', 'Ê' => 'e', 'Ë' => 'e', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e', 'Í' => 'i', 'Î' => 'i', 'Ï' => 'i', 'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i', 'Ñ' => 'n', 'ñ' => 'n', 'O' => 'o', 'Ó' => 'o', 'Ò' => 'o', 'Ô' => 'o', 'Ö' => 'o', 'Õ' => 'o', 'ó' => 'o', 'ò' => 'o', 'ô' => 'o', 'ö' => 'o', 'õ' => 'o', 'ø' => 'o', 'œ' => 'o', 'Š' => 'o', 'Ú' => 'u', 'Ù' => 'u', 'Û' => 'u', 'Ü' => 'u', 'U' => 'u', 'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u', 'Y' => 'y', 'Ý' => 'y', 'Ÿ' => 'y', 'ý' => 'y', 'ÿ' => 'y', 'Ž' => 'z', 'ž' => 'z'];
	$string = strtr($string, $a);
	$regx   = [' ', '.', '+', '@', '#', '!', '$', '%', '¨', '&', '*', '(', ')', '_', '-', '+', '=', ';', ':', ',', '\\', '|', '£', '¢', '¬', '/', '?', '°', '´', '`', '{', '}', '[', ']', 'ª', 'º', '~', '^', "\'", '"'];

	$replacement = str_replace($regx, '|', trim(strtolower($string)));
	$explode     = explode('|', $replacement);

	for ($i = 0; $i < count($explode); ++$i) {
		if (!empty($explode[$i])) {
			$output[] = trim($explode[$i]);
		}
	}

	return implode($replace, $output);
}

function download($path, $filename)
{
	$headers = null;

	// $headers .= ('Content-Description: File Transfer');
	// $headers .= ('Content-Type: application/octet-stream');
	// $headers .= ('Content-Disposition: attachment; filename=' . $filename);
	// $headers .= ('Content-Transfer-Encoding: binary');
	// $headers .= ('Expires: 0');
	// $headers .= ('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	// $headers .= ('Pragma: public');
	// $headers .= ('Content-Length: ' . Storage::size($path));

	return Storage::download($path, $filename);
}

/**
 * Função para exibir o endereço.
 *
 * @param array $config [ col, set, div ]
 * @param col => string - the column name
 * @param set => boolean - show or hide from list
 * @param div => string - separator caracter
 * @param array [ 'col' => 'column1', 'set' => boolean, 'div' => '<separator>']
 */
function exibir_endereco(array $config = [
	[
		'col' => 'address',
		'set' => true,
		'div' => ', ',
	],
	[
		'col' => 'address_nro',
		'set' => true,
		'div' => '<br> ',
	],
	[
		'col' => 'cep',
		'set' => true,
		'div' => ' - ',
	],
	[
		'col' => 'bairro',
		'set' => true,
		'div' => ', ',
	],
	[
		'col' => 'complemento',
		'set' => true,
		'div' => '<br>',
	],
	[
		'col' => 'cidade',
		'set' => true,
		'div' => ', ',
	],
	[
		'col' => 'uf',
		'set' => true,
		'div' => ' - ',
	],
	[
		'col' => 'pais',
		'set' => true,
		'div' => '',
	],
]) {
	$endereco = null;

	foreach ($config as $ind => $val) {
		$local = null;

		if (!empty($val) && !is_null($config[$ind++])) {
			if (!empty(get_config($val['col']))) {
				$local = get_config($val['col']);
			}

			if ($ind < count($config)) {
				if (!is_null(get_config($config[$ind++]['col']))) {
					/*
					 * Aqui, verifica se a condição do próximo array
					 * é válida para exibir o próximo caráctere separador
					 */
					if (!is_null($local)) {
						if ($ind < count($config)) {
							$local .= $val['div'];
						}
					}
				}
			}
		}

		$endereco .= $local;
	}

	return $endereco;
}

if (!function_exists('base_url')) {
	function base_url()
	{

		$path     = '/';
		$base_url = explode('/', request()->getRequestUri());

		foreach ($base_url as $ind => $base) {

			if ($base_url[$ind] == '') {
				$base_url[$ind] = '/';
			}

			$dir = app_path() . '/Http/Controllers/' . ucfirst(str_replace('/', '', $base_url[$ind]));
			if ($base_url[$ind] != '/' && is_dir($dir)) {
				$path = $base;
				break;
			}

		}

		return url($path) . '/';

	}
}

if (!function_exists('site_url')) {
	function site_url()
	{

		return url('/') . '/';

	}
}
/*
 * Fução para obter os menus da página
 */
if (!function_exists('getMenus')) {
	function getMenus($local, $id, $attributes = [])
	{

		$menu_model = new MenuModel();

		$modulo = explode('/', request()->path())[0];
		$idioma = !isset($_COOKIE['idioma']) ? get_config('language') : $_COOKIE['idioma'];
		$ul     = null;

		// Lista o menu principal da aplicação
		$menu = $menu_model->from('tb_acl_menu')
			->where('id_modulo', function ($query) use ($modulo) {
				$query->select('id')
					->from('tb_acl_modulo')
					->where('path', '/' . $modulo);
			})
			->where('id', function ($query) use ($local) {
				$query->select('value')
					->distinct(true)
					->from('tb_sys_config')
					->where('config', $local)
					->where('value', get_config($local))
					->whereColumn('id_modulo', 'id_modulo');
			})
			->where('status', '1')
			->get()
			->first();

		// lista outros menus que são incluídos na aplicação
		if (!isset($menu)) {
			$menu = $menu_model->from('tb_acl_menu')
				->where('id_modulo', function ($query) use ($modulo) {
					$query->select('id')
						->from('tb_acl_modulo')
						->where('path', '/' . $modulo);
				})
				->where('id', function ($query) use ($local) {
					$query->select('id_menu')
						->from('tb_acl_menu_descricao')
						->whereColumn('id_menu', 'id')
						->where('descricao', $local);
				})
				->get()
				->first();
			// $ul .= 'Nenhum menu neste módulo';
		}

		if (isset($menu)) {
			$items = $menu_model->from('tb_acl_menu_item')
				->where('id_menu', $menu->id)
				->where('id_parent', $id)
				->orderBy('ordem', 'asc')
				->where('status', '1')
				->get();

			if ($items->count() > 0) {
				$params = null;
				if (!empty($attributes)) {
					foreach ($attributes as $ind => $val) {
						$params .= ' ' . $ind . '="' . $val . '"';
					}
				}

				$ul = '<ul' . $params . '>';

				foreach ($items as $item) {

					if ($item->divider) {
						$ul .= '<li class="divider" style="margin: 10px 0;"></li>';
					}

					if ($item->item_type) {
						$ul .= '<li class="menu-description"><h6 style="padding-left: 25px; color: var(--grey-accent-4); font-size: 10px; line-height: 3; text-transform: uppercase; font-weight: bold;">' . $item->item_type . '</h6></li>';
					}

					$label = $menu_model->from('tb_acl_menu_item_descricao')
						->where('id_item', $item->id)
						->where('id_idioma', function ($query) {
							$query->select('id')
								->from('tb_sys_idioma')
								->where('sigla', (isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : get_config('language')))
								->get()
								->first();
						})
						->get()
						->first();

					// Se não existir uma tradução válida para o Idioma selecionado, será obtido o Idioma padrão
					if (!isset($label)) {
						$label = $menu_model->from('tb_acl_menu_item_descricao')
							->where('id_item', $item->id)
							->where('id_idioma', function ($query) {
								$query->select('id')
									->from('tb_sys_idioma')
									->where('sigla', get_config('language'))
									->get()
									->first();
							})
							->get()
							->first();
					}

					if (!isset($label)) {
						$label = (object) ['titulo' => 'no title'];
					}

					$submenus = $menu_model->from('tb_acl_menu_item')
						->where('id_parent', $item->id)
						->get();

					$ul .= '<li>';

					$route = $menu_model->select('name')
						->from('tb_acl_modulo_routes')
						->where('id_controller', $item->id_item)
						->first();

					$target = 'target="' . $item->target . '"' ?? null;

					$ul .= '<a ' . (($submenus->count() > 0) ? 'class="collapsible-header waves-effect waves-cyan" href="javascript:void(0);" tabindex="0"' : 'href="' . (route($route->name) ?? null) . '"') . ' ' . $target . '>';
					$ul .= $item->icon ? (preg_match('[^fa\-]', $item->icon) ? '<span class="fa-icon fa-solid ' . $item->icon . '"></span>' : '<span class="material-symbols-outlined">' . $item->icon . '</span>') : '<span class="material-symbols-outlined">radio_button_unchecked</span>';

					$ul .= '<span class="menu-title">' . $label->titulo . '</span>';
					$ul .= '</a>';

					if ($submenus->count() > 0) {
						$ul .= '<div class="collapsible-body">';
						$ul .= getMenus($local, $item->id, [
							'class'            => 'collapsible collapsible-sub',
							'data-collapsible' => 'accordion',
						]);
						$ul .= '</div>';
					}

					$ul .= '</li>';
				}

				$ul .= '</ul>';
			}
		}

		return $ul;
	}
}

if (!function_exists('RecursiveRemove')) {
	function RecursiveRemove($path)
	{

		die('Para utilizar esta função, comente esta linha dentro do arquivo.');

		$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path));

		$files = null;

		foreach ($rii as $file) {

			if ($file->isDir()) {
				continue;
			}

			$files = $file->getPathname();
			unlink($files);

		}

	}
}
