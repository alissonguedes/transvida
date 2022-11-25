@extends('app')

@section('menu-list')
<li>
	<a href="{{ route('main.home') }}">
		<span>Início</span>
	</a>
</li>
<li>
	<a href="{{ route('main.about') }}">
		<span>Sobre nós</span>
	</a>
</li>
<li>
	<a class="dropdown-menu" href="Javascript:void(0)" data-target="services">
		<span class="dropdown-title">Serviços</span>
	</a>
	<ul class="dropdown-content dropdown-horizontal-list" id="services">
		<li tabindex="0">
			<a href="{{ route('main.services.medicos') }}">
				<span data-i18n="Modern Menu">Serviços Médicos</span>
			</a>
		</li>
		<li tabindex="0">
			<a href="{{ route('main.services.area_protegida') }}">
				<span data-i18n="Navbar Dark">Área Protegida</span>
			</a>
		</li>
		<li tabindex="0">
			<a href="{{ route('main.services.remocao') }}">
				<span data-i18n="Gradient Menu">Remoção e Transporte</span>
			</a>
		</li>
		<li tabindex="0">
			<a href="{{ route('main.services.comercial') }}">
				<span data-i18n="Navbar Dark">Comercial</span>
			</a>
		</li>
	</ul>
</li>
<li>
	<a href="{{ url('https://www.clubmedicus24h.com.br/') }}" target="_blank">
		<span class="dropdown-title" data-i18n="Apps">ClubMedicus24h</span>
	</a>
</li>
<li>
	<a href="{{ route('main.contact') }}">
		<span>Atendimento</span>
	</a>
</li>
@endsection
@section('body')

<div class="progress" style="z-index: 9999999; display: none;">
	<div class="indeterminate blue lighten-1"></div>
</div>

@include('main.header')
@yield('capa')
@include('main.sidebar')
@yield('main')
@include('main.footer')

@endsection
