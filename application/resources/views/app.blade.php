@section('site-title', 'Médicus24h - Soluções em Saúde')

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>@yield('site-title')</title>

	@section('styles')
	@include('styles')
	@show

</head>

<body>

	<div id="page">

		@yield('body')

		<script>
			var BASE_URL = "{{ base_url() }}";
			var BASE_PATH = "{{ implode('/', explode('/index.php', $_SERVER['SCRIPT_FILENAME'])) }}";
		</script>

		<meta name="csrf-token" content="{{ csrf_token() }}">

	</div>

	@section('scripts')
	@include('scripts')
	@show

</body>

</html>
