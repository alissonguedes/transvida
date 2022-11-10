@extends('app')

@section('search', '')
@section('styles')
@include('clinica.styles')
@endsection

@section('body')

<div class="horizontal-layout">

	@include('clinica.header')
	@include('clinica.sidebar')

	<div id="main">
		@yield('main')
	</div>


</div>

@section('scripts')
@include('authentication.scripts')
@endsection

@endsection
