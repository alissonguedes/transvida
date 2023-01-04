@php
	use App\Models\PermissaoModel;
@endphp

@if($pacientes->total() > 0)

	@if(request()->get('query'))
		<div class="row">
			<div class="col s12">
				<h6>{{ $pacientes->total() }} @if ($pacientes->total()>1) resultados encontrados @else resultado encontrado. @endif </h6>
			</div>
		</div>
	@endif

	<div class="row">

		@foreach($pacientes as $i => $paciente)

			<div class="col s12 m6 l3 grid-view animated fadeIn slow delay-{{ $i }}">
				<div class="pacientes card card-border border-radius-6 z-depth-3 gradient-45deg-indigo-light-blue">
					<div class="card-content white-text">
						<div class="foto-paciente">
							<div class="foto circle z-depth-4 left">
								@php
									$style = null;
									if ($paciente->status === '0'):
									$style = 'opacity: 0.3; filter: grayscale(1)';
									endif;
								@endphp
								<img class="img-responsive" src="{{ asset($paciente->imagem ?? (is_null($paciente->sexo) ? 'img/avatar/icon.png' : ($paciente->sexo == 'M' ? 'img/avatar/homem.png' : 'img/avatar/mulher.png') ) ) }}" alt="" style="{{ $style }}">
								@if($paciente->status === '0')
									<i class="material-icons" style="position: absolute; left: 18px; top: 18px;">lock</i>
								@endif
							</div>
							<h6 class="white-text">{{ $paciente->nome }}</h6>
							<p>
								<a href="#"><i class="material-icons-outlined left">cake</i>{{ $paciente->data_nascimento ?? 'Não informado' }}</a>
								<a href="#"><i class="material-icons-outlined left">credit_card</i>{{ $paciente->cpf ?? 'Não informado' }}</a>
							</p>
							<div class="clear"></div>
						</div>
						<div class="contato">
							<p class="mt-4">
								<a href="#"><i class="material-icons-outlined left">phone</i> {{ $paciente->telefone ?? 'Não informado' }}</a>
								<a href="#"><i class="material-icons-outlined left">message</i> {{ $paciente->whatsapp ?? 'Não informado' }}</a>
								<a href="#"><i class="material-icons-outlined left">mail</i> {{ $paciente->email ?? 'Não informado' }}</a>
							</p>
						</div>
						{{-- <p class="center-align">
							<a href="{{ route('clinica.pacientes.edit', $paciente->id) }}" class="waves-effect waves-light btn gradient-45deg-deep-orange-orange border-round mt-7 z-depth-4">Alterar</a>
						</p> --}}
						<div class="acoes flex flex-center mt-5">
							<a data-link="{{ route('clinica.pacientes.{id}.prontuarios',$paciente->id) }}" name="id" id="{{ $paciente->id }}" data-target="prontuario" class="waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Prontuário">
								<i class="material-icons-outlined">assignment_ind</i>
							</a>
							<a href="#" data-link="{{ route('clinica.pacientes.{id}.agendamento',$paciente->id) }}" name="id" id="{{ $paciente->id }}" data-target="agendamento" class="form-sidenav-trigger waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Agendar">
								<i class="material-icons-outlined">event</i>
							</a>
							<a href="{{ route('clinica.pacientes.edit', $paciente->id) }}" class="waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Editar">
								<i class="material-icons-outlined">edit</i>
							</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach

	</div>

@else

	<div class="row">
		<div class="col s12">
			<h6>Nenhum resultado encontrado.</h6>
		</div>
	</div>

@endif
