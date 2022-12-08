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
	<div id="app-calendar">
		<div class="row">
			<div class="col s12">
				<div class="card">
					<div id="calendar" class="card-content calendar">
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

@include('clinica.agendamentos.form')

@endsection
