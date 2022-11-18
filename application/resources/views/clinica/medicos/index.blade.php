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

@section('container')
<style>
	td p {
		text-overflow: ellipsis;
		overflow: hidden;
		white-space: nowrap;
		width: 250px;
		transition: 500ms;
	}

	tr.disabled,
	tr.disabled td {
		cursor: text;
	}
</style>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content scroller">
				<div class="card-body responsive-table">
					<table class="table dataTable no-footer dataTable-fixed" data-link="{{ route('clinica.medicos.index') }}">
						<thead>
							<tr>
								<th data-disabled="true">
									<label class="grey-text text-darken-2 font-14 left">
										<input type="checkbox" name="check-all" id="check-all" class="filled-in">
										<span></span>
									</label>
								</th>
								<th class="">Medico</th>
								<th class="">Especialidade</th>
								<th class="center-align">CRM</th>
								<th width="25%" class="center-align">Data de cadastro</th>
								<th class="center-align">status</th>
								<th class="center-align" class="center-align" data-disabled="true">Ações</th>
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
