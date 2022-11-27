/* Set the defaults for DataTables initialisation */
$.extend(true, $.fn.dataTable.defaults, {
	"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'p i>>",
	"sPaginationType": "materialize",
	"oLanguage": {
		"sLengthMenu": "_MENU_"
	}
});

/* Default class modification */
$.extend($.fn.dataTableExt.oStdClasses, {
	"sWrapper": "dataTables_wrapper form-inline"
});

/* API method to get paging information */
$.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
	oSettings = {
		"iStart": oSettings._iDisplayStart,
		"iEnd": oSettings.fnDisplayEnd(),
		"iLength": oSettings._iDisplayLength,
		"iTotal": oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage": oSettings._iDisplayLength === -1 ? 0 : Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
		"iTotalPages": oSettings._iDisplayLength === -1 ? 0 : Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
	};

	return oSettings;
};

/* Materialize style pagination control */
$.extend($.fn.dataTableExt.oPagination, {

	"materialize": {

		"fnInit": function(oSettings, nPaging, fnDraw) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function(e) {
				e.preventDefault();
				if (oSettings.oApi._fnPageChange(oSettings, e.data.action)) {
					fnDraw(oSettings);
				}
			};

			var $li = '<ul> \
					<li class="prev disabled"> \
						<a href="javascript:void(0);"> \
							<i class="material-icons">keyboard_arrow_left</i> \
						</a> \
					</li> \
					<li class="next disabled"> \
						<a href="javascript:void(0);"> \
							<i class="material-icons">keyboard_arrow_right</i> \
						</a> \
					</li> \
				</ul>';

			$(nPaging).addClass('pagination').append($li);
			var els = $('a', nPaging);
			$(els[0]).bind('click.DT', {
				action: "previous"
			}, fnClickHandler);
			$(els[1]).bind('click.DT', {
				action: "next"
			}, fnClickHandler);

		},

		"fnUpdate": function(oSettings, fnDraw) {

			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i,
				ien,
				j,
				sClass,
				iStart,
				iEnd,
				iHalf = Math.floor(iListLength / 2);

			if (oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			} else if (oPaging.iPage <= iHalf) {
				iStart = 1;
				iEnd = iListLength;
			} else if (oPaging.iPage >= (oPaging.iTotalPages - iHalf)) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}

			for (i = 0,
				ien = an.length; i < ien; i++) {

				// Remove the middle elements
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();

				// Add the new list items and their event handlers
				for (j = iStart; j <= iEnd; j++) {
					sClass = (j == oPaging.iPage + 1) ? 'class="active"' : '';
					$('<li ' + sClass + '> \
						<a href="javascript:void(0);">' + j + '</a> \
					</li>').insertBefore($('li:last', an[i])[0]).bind('click', function(e) {
						e.preventDefault();
						oSettings._iDisplayStart = (parseInt($('a', this).text(), 10) - 1) * oPaging.iLength;
						fnDraw(oSettings);
					});
				}

				// Add / remove disabled classes from the static elements
				if (oPaging.iPage === 0) {
					$('li:first', an[i]).addClass('disabled');
				} else {
					$('li:first', an[i]).removeClass('disabled');
				}

				if (oPaging.iTotal === 0) {
					$('<li class="disabled">').insertBefore($('li:last', an[i])).html('<a class="disabled">0</a>');
				}

				if (oPaging.iPage === oPaging.iTotalPages - 1 || oPaging.iTotalPages === 0) {
					$('li:last', an[i]).addClass('disabled');
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
		}

	}
});

var checkAll = () => {

	$('table.table')
		.find('thead')
		.find(':input:checkbox:checked')
		.prop('checked', false)
		.change();

	// Ativar preenchimento de checkboxes nas tabelas
	$('body').find('table.table').each(function() {

		var status = 0;
		var btn_status = $(this).parents('.responsive-table').find(':button.update_resources, :button.update');

		var checked;
		var dataTables_wrapper = $(this);

		if (dataTables_wrapper.find('tbody').find(':input:checkbox').length === 0) {
			$('#check-all').attr('disabled', true);
			return false;
		} else {
			$('#check-all').attr('disabled', false);
		}

		$('#check-all').on('change', function() {

			$(this).parents('table.table')
				.find('tbody').find('tr')
				.removeClass('selected');

			if ($(this).prop('checked')) {
				$(this).parents('table.table')
					// .find('.dataTables_wrapper')
					.find('tbody')
					.find(':checkbox')
					.prop('checked', true);
			} else {
				$(this).parents('table.table')
					.find('tbody')
					.find(':checkbox')
					.prop('checked', false);
			}

		});

		dataTables_wrapper.find(':input:checkbox').on('change', function() {

			var checkeds = $(this).parents('table.table').find('tbody').find(':input:checkbox:checked').length;
			var countCheckbox = $(this).parents('table.table').find('tbody').find(':input:checkbox').length;
			var checkAll = $(this).parents('table.table').find('#check-all').attr('id');
			var indeterminateCheckbox = document.getElementById(checkAll);
			var selecteds_label = checkeds > 1 ? checkeds + ' itens selecionados' : checkeds + ' item selecionado';
			var chkStatusLength = $(this).parents('table.table').find('tbody').find(':checkbox[data-status="0"]:checked').length;

			btn_status.each(function() {
				if (chkStatusLength === 0)
					$(this).attr('data-tooltip', $(this).data('on')).val(0).find('i').text($(this).find('i').data('on'));
				else
					$(this).attr('data-tooltip', $(this).data('off')).val(1).find('i').text($(this).find('i').data('off'));
			});

			if (checkeds > 0) {

				checked = true;

				$(this).parents('table.table').find('.hide-buttons')
					.css('display', 'flex')
					.find('button').attr('disabled', false).parents('.action-btns')
					.find('.hide-buttons')
					.find('.selecteds-label').html(selecteds_label);
				$(this).parents('table.table').find('.show-buttons').hide();

				$('#btn-delete').attr('disabled', false);

				if (checkeds === countCheckbox) {
					indeterminateCheckbox.indeterminate = false;
				} else if (checkeds < countCheckbox) {
					if (typeof indeterminateCheckbox !== 'undefined' && indeterminateCheckbox !== null)
						indeterminateCheckbox.indeterminate = true;
				}

			} else {

				$(this).parents('table.table')
					.find('.hide-buttons').hide()
					.find('button').attr('disabled', true)
					.parents('.action-btns')
					.find('.selecteds-label').empty();
				$(this).parents('table.table').find('.show-buttons').css('display', 'flex');

				$('#btn-delete').attr('disabled', true);

				indeterminateCheckbox.indeterminate = false;
				checked = false;

			}

			$(this).parents('table.table').find('#check-all').prop('checked', checked);
			$(this).parents('table.table').find('tbody').find(':input:checkbox:checked').parents('tr').addClass('selected');

			if (!$(this).is(':checked')) {
				$(this).parents('tr').removeClass('selected');
			}

		});

	});

}

function btnModalForms($button) {

	$button.each(function() {

		var link = typeof $(this).data('link') !== 'undefined' && $(this).data('link') != '' ? $(this).data('link') : null;
		var modal = typeof $(this).data('target') !== undefined && $(this).data('target') != '' ? $(this).data('target') : null;

		if (link == null && modal == null) return false;

		$(this).bind('click', function() {

			var M = $('#' + modal).modal();
			$('#' + modal).find('.modal-content').html('Por favor, aguarde! Estamos carregando seu formulário...');

			$('#' + modal).modal({
				'dismissible': typeof $(this).data('dismissible') !== 'undefined' && $(this).data('dismissible') != '' ? $(this).data('dismissible') : false,
				'isMultiple': true,
				'onOpenStart': () => {
					Http.get(link, {
						'datatype': 'html',
						'data': {},
					}, (response) => {
						$('#' + modal).find('form').html($(response).find('form').html());
					});
				},
				'onOpenEnd': () => {
					var select = $('#' + modal).find('form').find('select').formSelect();
					App.aplicarMascaras();

					select.each(function() {

						var id = $(this).attr('id');
						var link = typeof $(this).data('link') !== 'undefined' ? $(this).data('link') : false;
						var target = typeof $(this).data('target') !== 'undefined' ? $(this).data('target') : false;

						if (link) {

							$('#' + id).change(function() {

								Http.get(link, {
									'datatype': 'json',
									'data': {
										[$(this).attr('name')]: $(this).val()
									}
								}, (response) => {

									if (target) {

										$('#' + target).attr('disabled', false);
										$('#' + target).find('option:not(:disabled)').remove()

										var options = [];
										if (response.length > 0) {
											for (var i of response) {
												var option = $('<option/>', {
													'value': i.id,
													'text': i.titulo
												});
												options.push(option);
											}
											$('#' + target).append(options)
										} else {
											$('#' + target).html($('<option/>', {
												'value': '',
												'selected': true,
												'disabled': true,
												'text': $('#' + target).find('option:disabled').text()
											}));
										}

										$('#' + target).formSelect();

									}

								})

							});

						}

					});

				}
			})

			M.modal('open');

		});

	});

}

function buttonActions($button) {

	if (typeof $button === 'undefined') {
		alert('$button deve ser informado');
		console.error('$button deve ser informado');
		return false;
	}

	$('body').find($button).bind('click', function() {

		var self = $(this),
			id = [],
			type = null,
			link = typeof self.data('link') !== 'undefined' ? self.data('link') : window.location.href,
			field = self.attr('name'),
			status = typeof self.attr('name') ? self.val() : null,
			method = typeof self.data('method') !== 'undefined' ? self.data('method') : alert('Você deve informar o método ["patch/put | delete"]para este botão!');

		if (self.parents().find('.dataTables_wrapper').length > 0) {
			self.parents().find('.dataTables_wrapper').find('tbody :checkbox:checked').each(function() {
				id.push($(this).val());
			});
		} else {
			id.push(self.val());
			type = 'back';
		}

		if (id.length === 0) {
			id.push(self.parents('tr').attr('id'));
		}

		Http.post(link, {
			'method': method,
			'data': {
				'id': id,
				'field': field,
				'value': status,
				'type': type,
			}
		}, (response) => {

			if (response.type === 'back')
				Http.goTo((typeof response.url !== 'undefined' ? response.url : $(this).data('link')), {
					'message': response.message,
					'status': response.status
				});
			else {

				if (typeof response.message !== 'undefined')
					Form.showMessage(response.message, response.status);

				DataTable(true);

			}

		});

	});

}

function DataTable(refresh) {

	var table = $('table.dataTable');

	if (typeof table.data('ajax') !== 'undefined' && !table.data('ajax')) {
		return false;
	}

	var url_datatable = // typeof table.data('link') !== 'undefined' ? table.data('link') :
		window.location.href;

	var order = 1,
		direction = 'asc';

	$(table).find('thead').find('th').each(function(e) {

		if ($(this).hasClass('sorting')) order = $(this).index();

		if ($(this).hasClass('sorting') && typeof $(this).data('direction') !== 'undefined')
			direction = $(this).data('direction'),
			$(this).addClass('sorting_' + direction);

	});


	var _self = table.DataTable({
		'retrieve': true,
		'displayLength': 50,
		'oLanguage': {
			'sEmptyTable': '',
			'sInfo': '_START_ - _END_ de _TOTAL_',
			'sInfoEmpty': '',
			'sInfoFiltered': '',
			'sInfoPostFix': '',
			'sInfoThousands': '.',
			'sLengthMenu': '_MENU_',
			'sLengthMenu': '',
			'sLoadingRecords': 'Carregando...',
			'sProcessing': '<div class="progress">\
								<div class="indeterminate"></div>\
							</div>',
			'sZeroRecords': '',
			'sSearch': (typeof table.data('label') !== 'undefined' && table.data('label') ? table.data('label') : ''),
			'sSearchPlaceholder': (typeof table.data('placeholder') !== 'undefined' && table.data('placeholder') ? table.data('placeholder') : null),
			'oPaginate': {
				'sNext': 'próximo',
				'sPrevious': 'anterior',
				'sFirst': 'primeiro',
				'sLast': 'último'
			},
			'oAria': {
				'sSortAscending': ': Ordenar colunas de forma ascendente',
				'sSortDescending': ': Ordenar colunas de forma descendente'
			}
		},
		'scrollCollapse': false,
		'sPaginationType': 'materialize',
		'serverSide': true,
		'processing': true,
		'ajax': {
			type: 'get',
			dataType: 'html',
			url: url_datatable,
			beforeSend: () => {

				if (!Storage.checkSession()) {
					Storage.removeSession('token');
				}

			},
			success: (response) => {

				var parser = new DOMParser();
				var content = parser.parseFromString(response, 'text/html');

				// Adiciona linhas à tabela
				table.find('tbody').html(response).find('#pagination, #info').remove();

				table.find('tr').each(function() {

					Request.addEvent($(this).find('[href], [data-href], .link'));

					if ($(this).data('disabled')) {
						$(this).addClass('disabled').find('td').css({
							'cursor': 'text !important'
						});
					}

				}).find('td').on('click', function(e) {

					var tr = $(this).parents();
					var id = tr.attr('id');
					var url = typeof tr.data('link') !== 'undefined' ? tr.data('link') : tr.parents('.dataTables_wrapper').find('table').data('link') + '/' + id;

					if (!tr.data('disabled') && !$(this).data('disabled')) {
						Http.goTo(url);
					}

				});

				var pagination = $(content).find('#pagination').html();
				var info = $(content).find('#info').html()

				table.parents('.dataTables_wrapper').find('.dataTables_info').html(info);
				table.parents('.dataTables_wrapper').find('.dataTables_paginate').html(pagination).find('[data-href]').each(function() {
					Request.addEvent($(this));
				});

				$('.dropdown-trigger').each(function() {
					$(this).dropdown({
						'alignment': typeof $(this).data('alignment') !== 'undefined' ? $(this).data('alignment') : null,
						'constrainWidth': true
					});
				});

				checkAll();
				resizeBody();
				buttonActions(table.find(':button[data-link]:not([data-target])'));
				btnModalForms(table.find('[data-target]'));

				table.parents('.dataTables_wrapper').find('[data-tooltip]').tooltip();

				if ($('.dataTables_wrapper').length > 0)
					new PerfectScrollbar('.card-content', {
						'suppressScrollX': true
					});

				table.parents('.dataTables_wrapper').find('.dataTables_processing').hide();

			},

			'error': ($_) => {
				Http.renderer($_.responseText, $_.status);
			}

		},
		'order': [order, direction],
		'columnDefs': [{
				'visible': true,
				'targets': 'sortable'
			},
			{
				'orderable': false,
				'targets': 'sortable'
			},
		]
	});

	var search = $('body').find('.dataTable_search');

	if (search.length) {

		search.bind('keyup paste', delay(function() {
			_self.search(this.value).draw();
			// console.log($(this).val);
		}));

		if (search.val() != '') {
			_self.search(search.val()).draw();
		}

	}

	if (refresh) {
		_self.draw()
	}

}

function delay(callback, ms) {

	// if (typeof callback === 'function') {
	// 	setTimeout(function() {
	// 		callback
	// 	}, 1000);
	// 	return;
	// }

	var timer = 0;

	return function() {

		var context = this,
			args = arguments;

		clearTimeout(timer);

		timer = setTimeout(function() {
			callback.apply(context, args);
		}, ms || 250);

	}

}
