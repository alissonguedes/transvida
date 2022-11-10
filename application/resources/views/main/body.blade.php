@extends('app')

@section('menu-list')
<li><a href="{{ route('main.home') }}">Início</a></li>
<li><a href="{{ route('main.about') }}">Sobre Nós</a></li>
<li><a href="{{ route('main.services') }}">Serviços</a></li>
<li><a href="{{ route('main.health') }}">Saúde</a></li>
<li><a href="{{ route('main.contact') }}">Atendimento</a></li>
@endsection

@section('body')

	@include('main.header')
	@yield('capa')
	@include('main.sidebar')
	@yield('main')
	@include('main.footer')

@endsection
