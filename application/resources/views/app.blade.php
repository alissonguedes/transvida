@section('site-title', 'Médicus24h - Soluções em Saúde')

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('site-title')</title>

	@include('main.styles')

</head>

<body>

	@section('menu-list')
	<li><a href="{{ route('main.home') }}">Início</a></li>
	<li><a href="{{ route('main.about') }}">Sobre Nós</a></li>
	<li><a href="{{ route('main.services') }}">Serviços</a></li>
	<li><a href="{{ route('main.contato') }}">Saúde</a></li>
	<li><a href="{{ route('main.contato') }}">Atendimento</a></li>
	@endsection

	@include('main.header')
	@yield('capa')

	@include('main.sidebar')

	@yield('content')

	@include('main.footer')
	@include('scripts')

</body>

</html>
