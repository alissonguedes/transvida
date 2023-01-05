'use strict';

var Materialize = {

	constructor: () => {

		$(".dropdown-trigger").each(function() {

			$(this).dropdown({
				inDuration: 300,
				outDuration: 225,
				constrainWidth: !(typeof $(this).data('constrain-width') !== 'undefined' && $(this).data('constrain-width') === true),
				coverTrigger: !(typeof $(this).data('cover-trigger') !== 'undefined' && $(this).data('cover-trigger') === true),
				alignment: typeof $(this).data('align') !== 'unedfined' && $(this).data('align') != '' ? $(this).data('align') : 'left',
				hover: (typeof $(this).data('hover') !== 'undefined' && $(this).data('hover') === true),
				closeOnClick: !(typeof $(this).data('autoclose') !== 'undefined' && $(this).data('autoclose') === false)
			});

		})

		Materialize.tooltip();
		Materialize.tabs();


	},

	tooltip: () => {

		$('[data-tooltip]').tooltip({
			transitionMovement: 10
		});

	},

	tabs: () => {

		$('.tabs').tabs({
			swipeable: false,
		})

	},

	datepicker: () => {

		$('.datepicekr').datepicker({

		})

	}

}
