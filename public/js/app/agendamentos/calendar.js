'use strict';

$(document).ready(function() {

	$('select').formSelect();
	$('.modal').modal();

	var tipo = $('select[name="filtro"]').val();

	Calendar({
		'tipo': tipo
	});

	$('select[name="filtro"]').on('change', function() {
		tipo = $(this).val();
		Calendar({
			'tipo': tipo
		})
	});

})

function Calendar(params, el) {

	var loading = `<div style="display: flex; align-items: center;">
							<div class="preloader-wrapper small active" style="margin-right: 20px;">
								<div class="spinner-layer spinner-green-only">
									<div class="circle-clipper left">
										<div class="circle"></div>
									</div>
									<div class="gap-patch">
										<div class="circle"></div>
									</div>
									<div class="circle-clipper right">
										<div class="circle"></div>
									</div>
								</div>
							</div>
							<p class="calendar-loading">
								Carregando o calendário...
							</p>
						</div>`;
	$('#calendar').html(loading);

	// Para remover a classe caso não possua itens de calendário na página
	$('body').removeClass('main-full');

	// var calendarEl = document.getElementById('calendar');
	var calendarEl = typeof el === 'undefined' ? document.querySelector('.calendar') : document.querySelector('.calendar');

	if (calendarEl === null) return;

	var p = {};

	p['ajax'] = true;

	if (typeof params !== 'undefined') {
		for (var i in params) {
			p[i] = params[i];
		}
	}

	var calendar = new FullCalendar.Calendar(calendarEl, {
		// height: $(calendarEl).closest('#main').outerHeight() - 60,
		headerToolbar: {
			left: 'dayGridMonth,timeGridWeek,timeGridDay',
			center: 'title',
			right: 'today prev,next',
		},
		titleFormat: {
			month: 'long',
			year: 'numeric',
			day: 'numeric',
			// weekday: 'long'
		},
		timeZone: 'America/Sao_Paulo',
		locale: 'pt-br',
		buttonText: {
			today: 'Hoje',
			month: 'Mês',
			week: 'Semana',
			day: 'Dia',
			list: 'Lista'
		},
		// initialDate: '2022-12-07',
		// navLinks: true, // can click day/week names to navigate views
		selectable: false,
		selectAllow: true,
		selectMirror: true,

		eventDragStop: function(e, a, i) {
			console.log(e);
		},

		// eventAdd: function(a, e, i, o, u) {
		// 	console.log(a, e, i, o, u);
		// },

		eventResize: function(a, b, c, d, e, f, g) {
			console.log(a, b, c, d, e, f, g);
		},

		eventDrop: function(event, dayDelta, minuteDelta, allDay, revertFunc) {

			// alert(
			// 	event.title + " was moved " +
			// 	dayDelta + " days and " +
			// 	minuteDelta + " minutes."
			// );

			// if (allDay) {
			// 	alert("Event is now all-day");
			// } else {
			// 	alert("Event has a time-of-day");
			// }

			// if (!confirm("Are you sure about this change?")) {
			// 	revertFunc();
			// }
			console.log(event, dayDelta, minuteDelta, allDay, revertFunc);

		},

		dateClick: function(arg) {

			var timestamp = arg.dateStr.split('T');
			var date = timestamp.slice(0, 1).toString();
			var hour = timestamp.length == 2 ? timestamp.splice(-1).toString().split(':') : null;

			date = date.split('-');
			var d = date.splice(-1);
			var m = date.splice(1);
			var a = date.splice(0);

			var h = hour !== null ? hour.splice(0, 1) : '00';
			var i = hour !== null ? hour.splice(1) : '00';
			var s = hour !== null ? hour.splice(-1) : '00';

			var dateFormat = d + '/' + m + '/' + a;
			var hourFormat = h + ':' + i;

			var form = $('.form-sidenav-trigger');

			form.click()

			// setTimeout(function() {

			// 	$('#agendamento').find('form').find('input[name="data"]').val(dateFormat);
			// 	$('#agendamento').find('form').find('input[name="hora"]').val(hourFormat);

			// 	Form.submit($('#agendamento').find('form'), function(e) {

			// 		calendar.addEvent({
			// 			title: 'Teste',
			// 			start: arg.dateStr,
			// 			end: arg.dateStr,
			// 			allDay: false
			// 		});

			// 		calendar.unselect();

			// 		console.log(e);

			// 	});

			// }, 300);


			// var modal_add_event = $('#modal_add_event_calendar');
			// $(modal_add_event).modal({
			// 	dismissible: true,
			// 	inDuration: 100,
			// 	startingTop: '35%',
			// 	endingTop: '35%',
			// 	onCloseStart: () => {
			// 	}
			// });
			// modal_add_event.modal('open');
			// $('#alerts').addClass(type).modal({
			// 	dismissible: false,
			// 	inDuration: 100,
			// 	startingTop: '35%',
			// 	endingTop: '35%',
			// 	onCloseStart: () => {
			// 		$(m).removeClass(type);
			// 	}
			// });

			// if (typeof message === 'object') {
			// 	title = message.title;
			// 	message = message.message;
			// } else {
			// 	title = type;
			// }
			// $('#alerts').find('.modal-content').find('.title').html(title);
			// $('#alerts').find('.modal-content').find('.info').html(message);
			// m.modal('open');

			// var title = prompt('Event Title:');
			// if (title) {
			// 	calendar.addEvent({
			// 		title: title,
			// 		start: arg.start,
			// 		end: arg.end,
			// 		allDay: arg.allDay
			// 	})
			// }
			// calendar.unselect()
		},
		eventClick: function(arg) {

			if (confirm('Are you sure you want to delete this event?')) {
				arg.event.remove()
			}

		},
		editable: true,
		dayMaxEvents: true, // allow "more" link when too many events
		fixedWeekCount: false,
		events: {
			url: BASE_URL + 'agendamentos/eventos',
			method: 'get',
			extraParams: p,
		},
	});

	$('body').addClass('main-full').removeClass('active').find('.sidenav-main').find('.active').removeClass('active');
	$('.sidenav-main').removeClass('nav-expanded nav-lock').addClass('nav-collapsed').find('.collapsible-body').hide();
	$('#main').addClass('main-full')

	setTimeout(function() {
		$('#calendar').empty();
		$('#calendar').find('.calendar-loading').remove();
		calendar.render();
		$('.fc-button.fc-prev-button,.fc-button.fc-next-button,.fc-button.fc-today-button').each(function() {
			$(this).addClass('waves-effect waves-light');
		});
	}, 200);

}
