'use strict';

var links = '[href], [data-href], .link';

var Request = {

	addEvent: (link) => {

		$("[data-action]").on("click", function(e) {
			var action = $(this).data("action");
			if (action === "back") window.history.back();
			else if (action === "next") window.history.forward();
		});

		var ln = typeof link === 'undefined' ? links : link;

		$('body').find(ln).on('click', function(e) {

			var link = $(this).data('href') || $(this).attr('href');
			var target = $(this).attr('target') || false;

			e.preventDefault();

			if (Request.isLink(link) && !target) {


				// if (window.location.origin + link !== window.location.href) {
				if (link !== window.location.href) {
					$('.progress').show();
					// animate($('#main>.container'), 'fadeOut slower', function() {
					// 	$(this).hide();
					// });
					// setTimeout(function() {
						Http.goTo(link);
					// }, 500);


					console.log('verificar sessão antes de redirecionar');
				}

			} else {

				if (target) {
					if (target == '_self')
						window.location.href = link;
					else if (target == '_top')
						return null;
					else
						window.open(link, target);
				}
			}

		});

	},

	refreshUrl: (url) => {

		if (BASE_URL + url !== window.location.href)
			window.history.pushState('', '', url);

	},

	isLink: (href) => {

		if (typeof href === 'undefined') return false;

		var URL = typeof href.split(BASE_URL)[1] === 'undefined' ? href : href.split(BASE_URL)[1];
		var isAnchor = /^[jJ]ava[sS]cript(\:[a-z]+)?/i.test(URL);
		var isNotLink = /^#([a-z0-9]+)?/i.test(URL);

		return href !== '' && !isAnchor && !isNotLink && typeof URL !== 'undefined';

	},

	// Alterado para expandir o menu a partir de qualquer link no sistema.
	menu: () => {

		$('#slide-out').removeClass('active').find('.active').removeClass('active');

		if ($('aside').hasClass('nav-expanded')) {

			var url = [];

			var local = window.location.href.split(BASE_URL).splice(1);

			if (local.length > 0 && typeof local[0].split(/\W+/) !== 'undefined' && local[0].split(/\W+/).length > 1) {
				local = local[0].split(/\W+/).splice(0, 1);
			}

			var $default = link === window.location.href ? 'default' : 'pointer';

			if (typeof local[0] !== 'undefined') {

				var link = local[0].split('/');

				for (var i in link) {

					url.push(link[i]);

					if ($('#slide-out li').find('a[href="' + BASE_URL + url.join('/') + '"').length == 1) {

						$('#slide-out li').find('a[href="' + BASE_URL + url.join('/') + '"').addClass('active').css('cursor', $default).parents().addClass('active').show();
						break;

					} else {

						// $('#slide-out li').find('a').first().addClass('active').parents().addClass('active').show();
						// break;

					}
				}

			} else {

				$('#slide-out li').find('a').first().addClass('active').parents().addClass('active').show();

			}

		}


	}

}
