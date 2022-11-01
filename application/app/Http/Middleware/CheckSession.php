<?php

namespace App\Http\Middleware {

	use App\Models\ModuloModel;
	use Closure;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Route;
	use Illuminate\Support\Facades\Session;

	class CheckSession
	{

		public function handle(Request $request, Closure $redirector)
		{

			$modulo = new ModuloModel();

			$current_url = url('/') . '/' . request()->path();

			$current_route = Route::currentRouteAction();
			$current_route = explode('@', $current_route);
			$name          = Route::currentRouteName();
			$modulo_path   = request()->path();
			$path          = explode('/', $modulo_path);
			$path_modulo   = '/' . $path[0];
			$controller    = $current_route[0];
			$action        = $current_route[1];

			$is_restrict_module     = $modulo->getIsRestrictModulo($path_modulo);
			$is_restrict_controller = $modulo->getIsRestrictController($controller);
			$is_restrict_route      = $modulo->getIsRestrictRoute($controller, $action, $name);

			if (!Session::exists('userdata')) {

				if ($is_restrict_module || $is_restrict_controller || $is_restrict_route) {

					setcookie('url', $current_url);
					return redirect()->route('account.auth.login')->with('url', $current_url);

				}

			}

			return $redirector($request);

		}

	}

}
