'use strict';

/**
 * Substitui a caixa de alerta padrão do navegador
 * @param {string|object|array} message
 * @param {string} title
 * @param {string} type
 */
var alert = (message, title, type) => {

	var m = $('#alerts');

	m.addClass(type).modal({
		dismissible: false,
		inDuration: 100,
		startingTop: '35%',
		endingTop: '35%',
		onCloseStart: () => {
			m.removeClass(type);
		}
	});

	if (typeof message === 'object') {

		title = message.title;
		message = message.message;

	} else {

		title = type;

	}

	m.find('.modal-content').find('.title').html(title);
	m.find('.modal-content').find('.info').html(message);

	m.modal('open');

}

var message = (info, status, title) => {

	if (typeof message === 'object') {
		var info = info.message;
	}

	var classes = 'z-depth-2';

	M.toast({
		classes: classes + ' ' + (typeof status !== null ? status : ''),
		html: info
	});

}

var confirm = (message, title, type) => {

}
