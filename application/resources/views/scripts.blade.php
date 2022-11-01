<!-- Core Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>

<script>
	$(document).ready(function() {
		$('.slider').slider({
			'duration': 2000,
			'indicators': false
		});
		$('.sidenav').sidenav();
		$('.parallax').parallax();
	});
	$(function() {
		$(".popup-gallery").magnificPopup({
			delegate: "a",
			type: "image",
			closeOnContentClick: !0,
			fixedContentPos: !0,
			tLoading: "Loading image #%curr%...",
			mainClass: "mfp-img-mobile mfp-no-margins mfp-with-zoom",
			gallery: {
				enabled: !0,
				navigateByImgClick: !0,
				preload: [0, 1]
			},
			image: {
				verticalFit: !0,
				tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
				titleSrc: function(e) {
					return e.el.attr("title") + "<small>by Marsel Van Oosten</small>"
				},
				zoom: {
					enabled: !0,
					duration: 300
				}
			}
		})
	});

</script>
