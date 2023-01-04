@extends('clinica.layouts.index')

@section('title', 'Agendamentos')

@section('search')
<div class="input-field search bordered border-round z-depth-1">
	<label for="">Pesquisar agendamentos</label>
	<input type="search" id="search-on-page" class="dataTable_search">
</div>
@endsection

@section('btn-add-title','Agendar paciente')
@section('btn-add')
<a href="#" data-target="agendamento" data-link="{{ route('clinica.agendamentos.add') }}" class="form-sidenav-trigger btn btn-floating gradient-45deg-deep-orange-orange waves-effect waves-light z-depth-3" data-tooltip="Agendar">
	<i class="material-icons bolder">add</i>
</a>
@endsection

@section('main')
<a href="#" data-target="agendamento" data-link="{{ route('clinica.agendamentos.add') }}" class="form-sidenav-trigger btn btn-floating gradient-45deg-deep-orange-orange waves-effect waves-light z-depth-3 hide" data-tooltip="Agendar">
	<i class="material-icons bolder">add</i>
</a>
<div class="container pt-1 scroller" style="overflow: auto; height: calc(100vh - 65px)">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<div class="card-title">
						<button class="btn btn-small white modal-trigger waves-effect" data-target="modal-filter" style="padding: 10px 15px;line-height: 1;height: auto;">
							<i class="material-icons-outlined black-text">filter_alt</i>
						</button>
					</div>
					<div id="calendar" class="calendar">
						<div style="display: flex; align-items: center;">
							<div class="preloader-wrapper small active" style="margin-right: 20px;">
								<div class="spinner-layer spinner-green-only">
									<div class="circle-clipper left">
										<div class="circle"></div>
									</div>
									<div class="gap-patch">
										<div class="circle"></div>
									</div>
									<div class="circle-clipper right">
										<div class="circle"></div>
									</div>
								</div>
							</div>
							<p class="calendar-loading">
								Carregando o calendário...
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="modal_add_event_calendar" class="modal">
	<div class="modal-content">modal_add_event_calendar</div>
	<div class="modal-footer"></div>
</div>

<div id="modal-filter" class="modal modal-fixed-footer">
	<div class="modal-content">
		<div class="row">
			<div class="col s12">
				<h5>Filtros</h5>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<div class="row">
					<div class="col s12">
						<div class="input-field">
							<label for="filtro" class="active">Tipo de atendimento</label>
							<select name="filtro" id="filtro">
								<option value="1">Consulta</option>
								<option value="2">Exame</option>
								<option value="3">Procedimento</option>
								<option value="4">Cirurgia</option>
								<option value="5">Laboratorial</option>
								<option value="6">Imagem</option>
								<option value="7">Outros</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<div class="input-field">
							<label for="paciente" class="active">Paciente</label>
							<input type="text" name="paciente" id="paciente">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<div class="input-field">
							<label for="filtro" class="active">Médico</label>
							<select name="filtro" id="filtro">
								<option value="1">Consulta</option>
								<option value="2">Exame</option>
								<option value="3">Procedimento</option>
								<option value="4">Cirurgia</option>
								<option value="5">Laboratorial</option>
								<option value="6">Imagem</option>
								<option value="7">Outros</option>
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<div class="input-field">
							<label for="filtro" class="active">Clínica</label>
							<select name="filtro" id="filtro">
								{{-- <option value="1">Consulta</option>
									<option value="2">Exame</option>
									<option value="3">Procedimento</option>
									<option value="4">Cirurgia</option>
									<option value="5">Laboratorial</option>
									<option value="6">Imagem</option>
									<option value="7">Outros</option> --}}
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn blue lighten-1 modal-close">Ok</button>
	</div>
</div>

@include('clinica.agendamentos.form')

@endsection
