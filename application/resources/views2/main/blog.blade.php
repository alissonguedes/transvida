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

			<div class="nav-background">
				<div class="ea k capa" style="background-image: url('{{ asset('img/site/1.jpg') }}');"></div>
			</div>

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

		<div class="nav-header">
			<h1>Blog</h1>
		</div>

	</header>
