'use strict';

window.onload = () => {

	window.addEventListener('popstate', function() {

		var http = new Http;
		http.get(window.location.href);

	}, true);

	new App();

	require([BASE_PATH + 'js/functions/application.js'], function() {
		load_scripts();
	});

	require([BASE_PATH + 'js/functions/progress.js'], function() {
		progress('out');
	});

}

class App {

	constructor() {

		require([
			BASE_PATH + 'js/http.js',
			BASE_PATH + 'js/request.js',
			BASE_PATH + 'js/scroller.js',
			BASE_PATH + 'js/menu.js',
			BASE_PATH + 'js/form.js',
			BASE_PATH + 'js/materialize.js',
			BASE_PATH + 'js/functions/autocomplete.js',
			BASE_PATH + 'js/functions/datatable.js',
			BASE_PATH + 'js/functions/progress.js',
			BASE_PATH + 'js/functions/alert.js',
			BASE_PATH + 'js/functions/view.js',
			BASE_PATH + 'js/functions/json.js',
			BASE_PATH + 'js/functions/delay.js',
			BASE_PATH + 'js/functions/application.js',
		], () => {

			// Inicia Menu
			new Menu();

			// Inicia Request
			new Request();

			// Inicia Form
			new Form();

			// Inicializa Materialize Plugin
			// new Materialize();
			Materializecss();

			// inicia Scroller
			new Scroller();

			// Inicia Datatable
			new Datatable()
				.create();

			require([BASE_PATH + 'js/functions/login.js'], function() {
				login();
			});

		});

	}

}
