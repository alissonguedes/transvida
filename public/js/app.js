'use strict';

window.onload = () => {

	window.addEventListener('popstate', function() {

		var http = new Http;
		http.get(window.location.href);

	}, true);


	constructor();
	load_scripts();
	progress('out');

}

var constructor = () => {

	Request.constructor();
	Menu.constructor();
	Form.constructor();
	Materialize.constructor();
	Scroller.constructor();
	Datatable.constructor()

	login();

}
