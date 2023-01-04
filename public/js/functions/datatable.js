'use strict';

class Datatable {

	table = $('table.dataTable');
	url = this.table.data('url') ? this.table.data('url') : window.location.href;
	datatable;
	order = 1;
	direction = 'asc';

	constructor(element) {

		this.table = element ? element : this.table;

	}

	reload() {
		this.datatable = this.table.DataTable();
		this.datatable.draw();
		console.log('Datatable reloaded.');
	}

	create() {

		if (!this.table || (typeof this.table.data('ajax') !== 'undefined' && !this.table.data('ajax'))) {
			return false;
		}

		this.datatable = this.table.DataTable({
			retrieve: true,
			serverSide: true,
			processing: true,
			scrollCollapse: true,
			displayLength: 50,
			ajax: {
				type: 'get',
				dataType: 'html',
				url: this.url,
				beforeSend: () => {

				},
				success: (response) => {

					var parser = new DOMParser();
					var content = parser.parseFromString(response, 'text/html');

					this.table.find('tbody').html(response).find('#pagination, #info').remove();
					this.table.find('tr').each(function() {
						if ($(this).data('disabled')) {
							$(this).addClass('disabled').find('td').css({
								'cursor': 'text !important'
							})
						}
					}).find('td').bind('click', function(e) {
						e.preventDefault();
						var tr = $(this).parent('tr');
						if (!tr.data('disabled') && !$(this).data('disabled')) {
							new Request(tr);
						}
					});

					var pagination = $(content).find('#pagination').html();
					var info = $(content).find('#info').html();

					this.table.parents('.dataTables_wrapper').find('.dataTables_info').html(info);
					this.table.parents('.dataTables_wrapper').find('.dataTables_paginate').html(pagination).find('[data-href]').each(function() {
						new Request($(this));
					});

					this.table.parents('.dataTables_wrapper').find('.dataTables_processing').hide();

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
				sSearch: this.table.data('label') || '',
				sSearchPlaceholder: this.table.data('placeholder') || '',
				oPaginate: {
					sNext: 'Próximo',
					sPrevious: 'Anterior',
					sFirst: 'Primeiro',
					sLast: 'Último',
				},
				order: [this.order, this.direction],
				columnDefs: [{

				}]
			}
		});

		this.search();

	}

	search() {

		var search = $('body').find('.dataTable_search');

		if (search) {
			search.bind('keyup paste', delay(function() {
				this.datatable.search(this.value).draw();
			}));

			if (search.val()) {
				this.datatable.search(search.value).draw();
			}
		}

	}

}
