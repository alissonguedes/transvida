@extends('clinica.layouts.index')

@section('title', 'Clínicas')

@section('search')
<div class="input-field search bordered">
	<label for="">Pesquisar clinicas</label>
	<input type="search" id="search-on-page" class="dataTable_search">
</div>
@endsection

@section('btn-add-title','Adicionar clinica')
@section('btn-add')
<button class="modal-trigger btn btn-floating gradient-45deg-deep-orange-orange waves-effect waves-light" data-link="{{ route('clinica.clinicas.add') }}" data-target="modal_clinica" data-tooltip="@yield('btn-add-title')" data-href="@yield('btn-add-route')" data-position="left">
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
					<table class="table dataTable no-footer dataTable-fixed" data-link="{{ route('clinica.clinicas.index') }}">
						<thead>
							<tr>
								<th data-disabled="true">
									<label class="grey-text text-darken-2 font-14 left">
										<input type="checkbox" name="check-all" id="check-all" class="filled-in">
										<span></span>
									</label>
								</th>
								<th class="center-align" width="25%">nome</th>
								<th class="center-align" width="15%">cnpj</th>
								<th class="center-align" width="15%">cidade</th>
								<th class="center-align">estado</th>
								<th class="center-align">Data de cadastro</th>
								{{-- <th class="center-align">Data de atualização</th> --}}
								<th class="center-align" data-disabled="true">status</th>
								<th class="center-align" width="15%" data-disabled="true">Ações</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
