'use strict';

class Request {

	link = [
		'a',
		'[href]',
		'[data-href]',
		'.link'
	];

	constructor(element) {

		var element = typeof element !== 'undefined' ? element : $('body').find(this.link.toString());

		this.createElement(element);

	}

	disableOnClick(el) {

		el.attr('disabled', true);

	}

	enableOnClick(el) {

		el.attr('disabled', false);

	}

	createElement(element) {


		var http = new Http();

		var self = this;
		var links = this.link.toString(); // typeof el !== 'undefined' ? el : this.link.toString();
		var element = typeof element !== 'undefined' ? $(element) : $(element).find(links);

		element.on('click', function(e) {

			e.preventDefault();

			var href = $(this).data('href') || $(this).attr('href');

			// self.disableOnClick($(this));
			if (self.isLink(href)) {
				http.get(href, null, (response) => {
					// console.log(response);
				});
			}
			// self.enableOnClick($(this));

		});

	}

	isLink(href) {

		if (typeof href === 'undefined' || href == '') return false;

		var url = typeof href.split(BASE_URL).splice(1) !== 'undefined' && href.split(BASE_URL).splice(1).length > 0 ? href.split(BASE_URL).splice(1) : href;
		var isAnchor = /^[jJ]ava[sS]cript(\:[a-z]+)?/i.test(url);
		var isLink = /^#([a-z0-9]+)?/i.test(url);

		return !isAnchor && !isLink;

	}

}
