'use strict';

$('[data-target="prontuario"]').bind('click', function() {
	console.log($(this).data('link'));
})

$('.reload').on('click', function() {
	var datatable = new Datatable();
	datatable.reload();
})
