'use strict';

var table;
var url;
var datatable;
var order = 1;
var direction = 'asc';

var Datatable = {

	constructor: (element) => {

		table = element ? element : $('table.dataTable');
		url = table.data('url') ? table.data('url') : window.location.href;

		if (!table || (typeof table.data('ajax') !== 'undefined' && !table.data('ajax'))) {
			return false;
		}

		Datatable.create();

	},

	reload: () => {
		datatable = table.DataTable();
		datatable.draw();
		console.log('Datatable reloaded.');
	},

	create: () => {

		// table =  element ? element : table;

		if (typeof table.data('ajax') !== 'undefined' && !table.data('ajax')) {
			return false;
		}

		datatable = table.DataTable({
			retrieve: true,
			serverSide: true,
			processing: true,
			scrollCollapse: true,
			displayLength: 50,
			ajax: {
				type: 'get',
				dataType: 'html',
				url: url,
				beforeSend: () => {

				},
				success: (response) => {

					var parser = new DOMParser();
					var content = parser.parseFromString(response, 'text/html');
					var tr;

					table.find('tbody').html(response).find('#pagination, #info').remove();
					table.find('tr').each(function() {

						tr = $(this);

						if ($(this).data('disabled')) {
							$(this).addClass('disabled').find('td').css({
								'cursor': 'text !important'
							});
						}

						// Adiciona eventos de click a botões de ação
						Request.constructor(tr);

					}).find('td').bind('click', function(e) {
						e.preventDefault();
						tr = $(this).parent('tr');
						if (!tr.data('disabled') && !$(this).data('disabled')) {
							Request.constructor();
						}
					});

					var pagination = $(content).find('#pagination').html();
					var info = $(content).find('#info').html();

					table.parents('.dataTables_wrapper').find('.dataTables_info').html(info);
					table.parents('.dataTables_wrapper').find('.dataTables_paginate').html(pagination).find('[data-href]').each(function() {
						Request.constructor($(this));
					});

					table.parents('.dataTables_wrapper').find('.dataTables_processing').hide();

				}
			},
			// sPaginationType: 'materialize',
			oLanguage: {
				sEmptyTable: 'Nenhum dado encontrado.',
				sInfo: '_START_ - _END_ / _TOTAL_',
				sInfoEmpty: 'Nenhum dado encontrado.',
				sInfoFiltered: '_COUNT_ registro(s) encontrado(s).',
				sInfoPostFix: null,
				sInfoThousands: '.',
				sLengthMenu: '_MENU_',
				sLoadingRecords: 'Carregando...',
				sProcessing: '<div class="progress"></div class="indeterminate"></div></div>',
				sZeroRecords: '',
				sSearch: table.data('label') || '',
				sSearchPlaceholder: table.data('placeholder') || '',
				oPaginate: {
					sNext: 'Próximo',
					sPrevious: 'Anterior',
					sFirst: 'Primeiro',
					sLast: 'Último',
				},
				order: [order, direction],
				columnDefs: [{

				}]
			}
		});

		Datatable.search();

	},

	search: () => {

		var search = $('body').find('.dataTable_search');

		if (search) {
			search.bind('keyup paste', delay(function() {
				datatable.search(this.value).draw();
			}));

			if (search.val()) {
				datatable.search(search.value).draw();
			}
		}

	}

}
