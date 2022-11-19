@extends('clinica.layouts.index')

@section('title', 'Medicos')

@section('search')
<div class="input-field search bordered">
	<label for="">Pesquisar medicos</label>
	<input type="search" id="search-on-page" class="dataTable_search">
</div>
@endsection

@section('btn-add-title','Adicionar medico')
@section('btn-add')
<button class="modal-trigger btn btn-floating gradient-45deg-deep-orange-orange waves-effect waves-light" data-link="{{ route('clinica.medicos.add') }}" data-target="modal_medico" data-tooltip="@yield('btn-add-title')" data-href="@yield('btn-add-route')">
	<i class="material-icons bolder">add</i>
</button>
@endsection

{{-- @section('btn-delete-route', route('clinica.medicos.delete')) --}}

@section('container')

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content scroller">
				<div class="card-body responsive-table">
					<table class="table dataTable no-footer dataTable-fixed" data-link="{{ route('clinica.medicos.index') }}">
						<thead>
							<tr>
								<th data-orderable="false">
									<label class="grey-text text-darken-2 font-14 left">
										<input type="checkbox" name="check-all" id="check-all" class="filled-in">
										<span></span>
									</label>
								</th>
								<th width="15%" class="">Medico</th>
								<th class="">Especialidade</th>
								<th class="center-align">CRM</th>
								<th class="center-align">Data de cadastro</th>
								<th class="center-align">status</th>
								<th width="15%" class="center-align" class="center-align" data-orderable="false">Ações</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@include('clinica.medicos.form')

@endsection
