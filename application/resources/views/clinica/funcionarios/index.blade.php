@extends('clinica.layouts.index')

@section('title', 'Funcionários')

@section('search')
<div class="input-field search bordered border-round z-depth-1">
	<label for="">Pesquisar funcionários</label>
	<input type="search" id="search-on-page" class="dataTable_search">
</div>
@endsection

@section('btn-add-title','Adicionar funcionário')
@section('btn-add')
<button class="modal-trigger btn btn-floating gradient-45deg-deep-orange-orange waves-effect waves-light z-depth-3" data-link="{{ route('clinica.funcionarios.add') }}" data-target="modal_funcionario" data-tooltip="@yield('btn-add-title')" data-href="@yield('btn-add-route')">
	<i class="material-icons bolder">add</i>
</button>
@endsection

{{-- @section('btn-delete-route', route('clinica.funcionarios.delete')) --}}

@section('container')

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content scroller">
				<div class="card-body responsive-table">
					<table class="table dataTable no-footer dataTable-fixed" data-link="{{ route('clinica.funcionarios.index') }}">
						<thead>
							<tr>
								<th data-orderable="false">
									<label class="grey-text text-darken-2 font-14 left">
										<input type="checkbox" name="check-all" id="check-all" class="filled-in">
										<span></span>
									</label>
								</th>
								<th width="15%" class="">Funcionário</th>
								<th class="">Função</th>
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

@include('clinica.funcionarios.form')

@endsection
