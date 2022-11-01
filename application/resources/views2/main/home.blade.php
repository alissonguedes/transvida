<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Gallery</title>

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

	<!-- Material Icons -->
	<link href="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/gallery-dark-materialize.min.css?v=142186802669395317081490329774" rel="stylesheet">

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	{{-- <link rel="canonical" href="https://themes.materializecss.com/pages/full-header.html"> --}}
	{{-- <link rel="stylesheet" href="css/main.css"> --}}
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/color.css">
	<link rel="stylesheet" href="css/logo.css">

</head>

<body>

	<header>

		<nav class="nav-extended">

			<div class="flex flex-center nav menu-bar">

				<div class="menu menu-left">
					<ul>
						<li><a href="{{ route('main.home') }}">Início</a></li>
						<li><a href="{{ route('main.home') }}">Galeria</a></li>
						<li><a href="{{ route('main.blog') }}">Blog</a></li>
					</ul>
				</div>
				<div class="logo">
					<a href="{{ route('main.home') }}" class="brand-logo">
						<i class="logo"></i>
						<span>Adelma Pedrosa</span>
						<small>fotografia newborn</small>
					</a>
				</div>
				<div class="menu menu-right">
					<ul>
						<li><a href="{{ route('main.home') }}">Sobre</a></li>
						<li><a href="{{ route('main.home') }}">Contato</a></li>
					</ul>
				</div>

				<a href="#" data-activates="nav-mobile" class="button-collapse btn-floating btn-flat hide-on-large-only"><i class="material-icons">menu</i></a>

			</div>

		</nav>

	</header>

	<div id="slider">
		<div class="slider fullscreen">
			<ul class="slides">
				@for($i = 1; $i <= 12; $i ++ )
					<li>
						<img src="{{ asset('img/site/' . $i . '.jpg') }}" alt="">
					</li>
				@endfor
			</ul>
		</div>
	</div>

	<section id="portfolio">
		<div class="row grey darken-3">
			<div class="col s12">
				<div class="title-section">
					<h3>Meus últimos trabalhos</h3>
					<h2>Galeria</h2>
				</div>
			</div>
		</div>
		<div class="b e">
			<div class="d hx hf gu gallery-item gallery-expand ce polygon">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img class="responsive-img" src="{{ asset('img/site/1.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Aquamarine</h3>
							<span class="gj">$29.99</span>
						</div>
						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						{{-- <div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div> --}}
					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>
			<div class="d hx hf gu gallery-item gallery-expand ce polygon">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img src="{{ asset('img/site/2.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Sun</h3>
							<span class="gj">$9.99</span>
						</div>
						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						<div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div>
					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>
			<div class="d hx hf gu gallery-item gallery-expand ce bigbang">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img class="responsive-img" src="{{ asset('img/site/3.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Big Bang 1</h3>
							<span class="gj">$23.99</span>
						</div>
						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						<div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div>
					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>
			<div class="d hx hf gu gallery-item gallery-expand ce polygon">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img src="{{ asset('img/site/4.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Maze</h3>
							<span class="gj">$11.99</span>
						</div>
						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						<div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div>
					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>
			<div class="d hx hf gu gallery-item gallery-expand ce polygon">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img src="{{ asset('img/site/5.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Ice</h3>
							<span class="gj">$14.99</span>
						</div>
						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						<div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div>
					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>
			<div class="d hx hf gu gallery-item gallery-expand ce polygon">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img src="{{ asset('img/site/6.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Cave</h3>
							<span class="gj">$4.99</span>
						</div>
						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						<div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div>
					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>
			<div class="d hx hf gu gallery-item gallery-expand ce polygon">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img src="{{ asset('img/site/7.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Grapefruit</h3>
							<span class="gj">$14.99</span>
						</div>

						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						<div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div>

					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>
			<div class="d hx hf gu gallery-item gallery-expand ce bigbang">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img class="responsive-img" src="{{ asset('img/site/8.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Big Bang 2</h3>
							<span class="gj">$40.99</span>
						</div>
						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						<div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div>
					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>
			<div class="d hx hf gu gallery-item gallery-expand ce bigbang">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img class="responsive-img" src="{{ asset('img/site/9.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Big Bang 3</h3>
							<span class="gj">$18.99</span>
						</div>
						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						<div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div>
					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>

			<div class="d hx hf gu gallery-item gallery-expand ce sacred">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img class="responsive-img" src="{{ asset('img/site/10.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Circle</h3>
							<span class="gj">$10.99</span>
						</div>
						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						<div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div>
					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>

			<div class="d hx hf gu gallery-item gallery-expand ce sacred">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img class="responsive-img" src="{{ asset('img/site/11.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Triangle</h3>
							<span class="gj">$10.99</span>
						</div>
						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						<div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div>
					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>

			<div class="d hx hf gu gallery-item gallery-expand ce sacred">
				<div class="gallery-curve-wrapper">
					<a class="gallery-cover gray">
						<img class="responsive-img" src="{{ asset('img/site/12.jpg') }}" alt="placeholder" crossOrigin="anonymous">
					</a>
					<div class="gallery-body">
						<div class="title-wrapper">
							<h3>Hexagon</h3>
							<span class="gj">$10.99</span>
						</div>
						<p class="fi">
							Literally venmo before they sold out, DIY heirloom forage polaroid offal yr pop-up selfies health goth. Typewriter scenester hammock truffaut meditation, squid before they sold out polaroid portland tousled taxidermy vice. Listicle butcher thundercats, taxidermy pitchfork next level roof party crucifix narwhal kinfolk you probably haven't heard of them portland small batch.</p>
						<p class="fi">
							Ea salvia adipisicing vegan man bun. Flexitarian cupidatat skateboard flannel. Drinking vinegar marfa you probably haven't heard of them consequat post-ironic, shabby chic williamsburg raclette vaporware readymade selfies brunch. Venmo selvage biodiesel marfa. Tbh literally 3 wolf moon, proident elit raclette chambray consequat edison bulb four loko accusamus. Semiotics godard eiusmod, ex esse air plant quinoa vaporware selfies keytar. Actually yuccie ennui flannel single-origin coffee, williamsburg cardigan banjo forage pug distillery tumblr hexagon vinyl occaecat.</p>

						<div class="carousel-wrapper">
							<div class="t carousel">
								<a class="carousel-item" href="#one!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-sun.jpg?v=53287264807679260261487025906" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#two!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-maze.jpg?v=142381636332995208141487025933" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#three!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-ice.jpg?v=104744048428002372381487025923" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#four!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-cave.jpg?v=131272822431341251431487023516" crossOrigin="anonymous"></a>
								<a class="carousel-item" href="#five!"><img src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/geometric-grapefruit.jpg?v=40704836766041654421487026006" crossOrigin="anonymous"></a>
							</div>
						</div>
					</div>
					<div class="gallery-action">
						<a class="btn-floating btn-large waves-effect waves-light"><i class="material-icons">favorite</i></a>
					</div>
				</div>
			</div>

		</div>
	</section>


	<section id="portfolio" class="white darken-3">
		<div class="row">
			<div class="col s12">

				<div class="title-section black-text">
					<h3>Minha história</h3>
					<h2>Sobre mim</h2>
				</div>

				<div class="content-section flow-text">

					<div class="container">

						<div id="lipsum">
							<p>
								<img src="{{ asset('img/site/1.jpg') }}" alt="" class="left mr-20 mt-10 mb-10 w-50">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus blandit tristique metus quis venenatis. Aenean id sem quis dui bibendum pretium. Donec sed velit non nisl volutpat tempor. Nam euismod metus mi, a pharetra lacus cursus nec. Donec eleifend ligula vel augue ullamcorper interdum. Proin iaculis nisl lectus, sit amet euismod ligula elementum eu. Nam blandit dui vel nisl imperdiet sollicitudin. Praesent a blandit risus. Proin tristique felis eget accumsan cursus.
							</p>
							<p>
								Nullam vitae risus nec metus accumsan sollicitudin id eget risus. In sodales ullamcorper purus, sit amet pharetra neque ultrices sed. Mauris varius euismod ex, ut semper nisi luctus quis. Integer diam eros, varius non neque eget, interdum dignissim sem. Praesent neque neque, gravida eu egestas tincidunt, varius a ex. Proin pharetra vulputate ante, ac pulvinar mi sollicitudin quis. Donec ex quam, volutpat facilisis bibendum eu, vulputate at eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In porta nulla a blandit congue.
							</p>
							<p>
								Vestibulum vestibulum ullamcorper tristique. Nullam ac efficitur lorem. Curabitur tincidunt ut arcu cursus suscipit. Aliquam nec congue ante, et ultricies nulla. Vivamus vitae vehicula sem, vitae fringilla erat. Praesent ut nisl in quam ornare molestie. Sed sagittis augue vitae nisl placerat accumsan. Duis posuere imperdiet elit mollis sagittis. Sed sollicitudin rhoncus turpis sagittis commodo. Nullam mollis hendrerit tellus, at pulvinar ipsum efficitur nec. Nam venenatis, leo a porta rhoncus, nunc mi condimentum diam, vitae vulputate ante mauris consequat lectus. Nunc nec gravida leo, vel cursus tortor. Etiam sit amet vestibulum urna, vel ultrices tortor.
							</p>
							<p>
								<img src="{{ asset('img/site/1.jpg') }}" alt="" class="right ml-20 mt-10 mb-10 w-50">
								Proin rhoncus, dui eget aliquet fermentum, arcu lectus pretium felis, dictum sollicitudin risus elit at magna. Phasellus rutrum justo sed eros posuere, sit amet iaculis lacus accumsan. Vestibulum sollicitudin, lectus a interdum pharetra, magna leo fringilla urna, quis aliquam eros ligula id justo. Donec tincidunt interdum urna sed pulvinar. Fusce porttitor libero sed leo dictum accumsan. Cras massa ante, vehicula at feugiat sit amet, cursus nec enim. Maecenas vitae posuere ligula.
							</p>
							<p>
								Sed efficitur tempus ligula. Morbi interdum tortor quis sapien euismod, non condimentum erat tempus. Vivamus finibus laoreet dapibus. Nam maximus lectus ac sem ultricies, ac sagittis diam gravida. Nunc accumsan risus ac lacus accumsan, a euismod lectus luctus. Nam ultricies arcu sit amet tortor fermentum, quis sollicitudin arcu aliquet. Morbi id tellus id lectus malesuada placerat nec et quam.
							</p>
						</div>

					</div>

				</div>
			</div>
		</div>
	</section>

	<footer class="grey darken-3">

		<div class="page-footer container">

			<div class="row">

				<div class="col l4 m4 s12 flex flex-column">
					<div class="logo logo-footer">
						<a href="{{ route('main.home') }}" class="brand-logo white-text">
							<i class="logo"></i>
							<span>Adelma Pedrosa</span>
							<small>fotografia newborn</small>
						</a>
					</div>
				</div>

				<div class="col l4 m4 s12 flex flex-column center-align">
					<h5>Institucional</h5>
					<ul>
						<li>
							<a href="#">Início</a>
						</li>
						<li>
							<a href="#">Galeria</a>
						</li>
						<li>
							<a href="#">Blog</a>
						</li>
						<li>
							<a href="#">Sobre</a>
						</li>
						<li>
							<a href="#">Portfólio</a>
						</li>
						<li>
							<a href="#">Contato</a>
						</li>
					</ul>
				</div>

				<div class="col l4 m4 s12 flex flex-end flex-column">
					<div class="row no-padding">
						<div class="col s12 no-padding">
							Endereço
						</div>
					</div>
					<div class="row no-padding">
						<div class="col s12 no-padding">
							{{-- <h5 class="right-align">Institucional</h5> --}}
							<ul class="social">
								<li>
									<a href="#">
										<i class="icon whatsapp"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon instagram"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon facebook"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon youtube"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>

			</div>

		</div>

		<div class="copy grey darken-4">
			<div class="container">
				<div class="row">
					<div class="col l6 s12 flex flex-start">
						{{ date('Y') }} - Todos os direitos reservados &copy; Adelma Fotografias
					</div>
					<div class="col l6 s12 flex flex-column flex-end">
						Desenvolvido por Alisson Guedes
					</div>
				</div>
			</div>
		</div>

	</footer>

	<!-- Core Javascript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/materialize/0.98.0/js/materialize.min.js"></script>
	<script src="//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/gallery.min.opt.js" crossorigin="anonymous"></script>
	<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>

	<script>
		$(document).ready(function() {
			$('.slider').slider({
				'duration': 2000,
				'indicators': false
			});
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
</body>

</html>
{{-- @extends('app')

@section('content')



@endsection--}}
