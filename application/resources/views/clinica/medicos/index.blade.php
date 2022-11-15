@extends('clinica.layouts.index')

@section('title', 'Pacientes')

@section('search-label', 'Pesquisar pacientes')
@section('data-search', 'pacientes')

@section('btn-add-title','Adicionar paciente')
@section('btn-add-route', route('clinica.pacientes.add'))

@section('container')

<div id="index" class="row">

	@foreach($pacientes as $paciente)

		<div class="col s12 m6 l3 grid-view">
			<div class="pacientes card card-border border-radius-6 z-depth-3 gradient-45deg-indigo-light-blue">
				<div class="card-content white-text">
					<div class="flex center-align flex-center">
						<img class="responsive-img circle z-depth-4 mr-6" src="{{ asset($paciente->imagem ?? (is_null($paciente->sexo) ? 'img/avatar/icon.png' : ($paciente->sexo == 'M' ? 'img/avatar/homem.png' : 'img/avatar/mulher.png') ) ) }}" alt="" style="width: 80px; height: 80px; {{ isset($paciente) && $paciente->status == '0' ? 'opacity: 0.3;filter: grayscale(1);' : null }}">
						@if($paciente->status == '0')
							<i class="material-icons" style="position: absolute; left: 55px;">lock</i>
						@endif
						<h6 class="white-text mb-1 left-align">{{ $paciente -> nome }}</h6>
					</div>
					<br>
					<div class="info mt-3">
						<p>
							<i class="material-icons">cake</i> {{ $paciente->data_nascimento ?? 'Não informado' }}
						</p>
						<p class="mt-10">
							<i class="material-icons">credit_card</i> {{ $paciente->cpf  ?? 'Não informado' }} <br>
						</p>
						<p>
							<i class="material-icons">phone</i> {{ $paciente->telefone ?? 'Não informado' }}
						</p>
						<p>
							<i class="material-icons">message</i> {{ $paciente->celular ?? 'Não informado' }}
						</p>
						<p>
							<i class="material-icons">mail</i> {{ $paciente->email ?? 'Não informado' }}
						</p>
					</div>
					{{-- <p class="center-align">
							<a href="{{ route('clinica.pacientes.edit', $paciente->id) }}" class="waves-effect waves-light btn gradient-45deg-deep-orange-orange border-round mt-7 z-depth-4">Alterar</a>
					</p> --}}
					<div class="acoes flex flex-center mt-5" style="font-size: 22px; line-height: 22px;">
						<a class="waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Prontuário">
							<i class="material-icons">content_paste</i>
						</a>
						<a href="#" class="waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Agendar">
							<i class="material-icons">event</i>
						</a>
						<a href="{{ route('clinica.pacientes.edit', $paciente->id) }}" class="waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Editar">
							<i class="material-icons">edit</i>
						</a>
					</div>
				</div>
			</div>
		</div>
	@endforeach

</div>

@endsection
