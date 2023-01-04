'use strict'

class Scroller {

	constructor(scroller) {

		var scroller = typeof scroller !== 'undefined' ? scroller : '.scroller';

		$('body').find(scroller).each(function() {

			var c = '.' + $(this).attr('class').replace(/\s/g, '.');
			var suppressScrollX = (typeof $(this).data('hide-x') !== 'undefined' && $(this).data('hide-x') === true);
			var suppressScrollY = (typeof $(this).data('hide-y') !== 'undefined' && $(this).data('hide-y') === true);
			var wheelPropagation = (typeof $(this).data('propagation') !== 'undefined' && $(this).data('propagation') === true);

			new PerfectScrollbar(c, {
				theme: "dark",
				'wheelPropagation': wheelPropagation,
				'suppressScrollX': suppressScrollX,
				'suppressScrollY': suppressScrollY
			});

		});

	}

	init() {
		console.log('initialize scroller');
	}

}
