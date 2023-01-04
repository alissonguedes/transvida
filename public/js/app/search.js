'use strict';

var search = $('[data-search]');

search.bind('keyup paste', () => {
	$('.progress').show();
});

$('body').find(search).each(function() {

	$(this).bind('keyup paste', delay(() => {

		var url = BASE_URL + $(this).data('search');
		var query = $(this).val();
		var params = {
			datatype: 'html',
			data: {
				'query': query
			}
		}

		new Http().get(url, params, (response) => {

			$('#results').html(response);
			$('.progress').hide()

			formSidenav();
			new Request($('#results'));

		});

	}, 500));

})
