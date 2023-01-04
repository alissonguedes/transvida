'use strict';

var formSidenav = () => {

	var http = new Http();

	$('.form-sidenav-trigger').on('click', function() {

		progress('in')

		var link = typeof $(this).data('link') !== 'undefined' && $(this).data('link') != '' ? $(this).data('link') : null;
		var target = typeof $(this).data('target') !== 'undefined' && $(this).data('target') != '' ? $(this).data('target') : null;
		var name = typeof $(this).attr('name') !== 'undefined' ? $(this).attr('name') : null;
		var id = typeof $(this).attr('id') !== 'undefined' ? $(this).attr('id') : null;
		var modal = $('.form-sidenav#' + target);

		var overlay = $('<div/>', {
			class: 'modal-overlay',
			style: 'z-index: 996; display: block; opacity: 0.5;'
		})

		var params = {
			[name]: id
		};

		modal.find('form').html('Carregando formulário');

		http.get(link, {
			datatype: 'html',
			data: params
		}, (response) => {

			var errors = isJSON(response) ? JSON.parse(response) : null;

			if (errors != null) {
				modal.find('.modal-close').click(function() {
					modal.removeClass('open')
					modal.next('div.modal-overlay').remove();
				});
				modal.find('.modal-close').click();
				alert(errors, errors.status);
				progress('out')
				return false;
			}

			modal.addClass('open').parent().remove('.modal-overlay').append(overlay);
			modal.find('form').html($(response).find('#' + target).html());

			if (typeof modal.data('dismissible') !== 'undefined' && !modal.data('dismissible')) {
				overlay.on('click', function() {
					modal.find('.modal-close').click();
				});
			}

			modal.find('.modal-close').click(function() {
				modal.removeClass('open')
				modal.next('div.modal-overlay').remove();
			});

			$('#recorrente').on('change', function() {

				if ($(this).prop('checked')) {
					$(this).parents('.input').css({
						'border-bottom-left-radius': '0px',
						'border-bottom-right-radius': '0px'
					}).next('.days-of-week').slideDown(100);
				} else {
					$(this).parents('.input').css({
						'border-bottom-left-radius': '24px',
						'border-bottom-right-radius': '24px'
					}).next('.days-of-week').slideUp(100);
				}
			});

			// Selects
			var clinica, especialidade, medico;

			autocomplete($('#especialidade'), () => {

				$('#especialidade').on('change', function() {

					especialidade = $(this).val();

					$('#clinica').val('');
					$('#medico').val('');

					autocomplete($('#clinica'), {
						'especialidade': especialidade
					});

					autocomplete($('#medico'), {
						'especialidade': especialidade
					});

				})

			})

			autocomplete($('#clinica'), () => {

				$('#clinica').on('change', function() {

					clinica = $(this).val();

					$('#medico').val('');

					autocomplete($('#medico'), {
						'especialidade': especialidade,
						'clinica': clinica,
					})

				})

			});

			autocomplete($('#medico'))
			autocomplete($('#tipo'));
			autocomplete($('#categoria'));

			if (!$('input[name="paciente"]').val())
				autocomplete($('#nome_paciente'), () => {
					$('#nome_paciente').on('change', function() {
						var id = $(this).val();
						$('input[name="paciente"]').val(id);
						$.ajax({
							url: BASE_URL + 'pacientes/' + id + '/dados',
							method: 'get',
							success: (response) => {
								for (var i in response) {
									var val = response[i] ? response[i] : '-';
									$('[name="' + i + '"]').val(val).parent('.input-field').find('label').addClass('active');
								}
							}
						})
					});
				});

			new Request(modal);
			new Scroller();
			progress('out');

		});

	});

}

formSidenav();
