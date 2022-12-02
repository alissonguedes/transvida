@extends('clinica.body')

@section('main')

<div class="topbar flex flex-center">
	<div class="topbar-fixed topbar-color flex flex-auto z-depth-1">
		<div class="flex flex-auto flex-center">
			<div class="flex flex-auto flex-start flex-center" style="">
				<button class="dropdown-trigger btn white black-text z-depth-3 border-round" data-target="dropdown-actions">
					<i class="material-icons checkbox">check_box</i>
					<i class="material-icons">keyboard_arrow_down</i>
				</button>
				<ul id="dropdown-actions" class="dropdown-content">
					<li>
						<button type="button" data-link=" #route('clinica.medicos.delete', $row->id) " data-method="get">
							<i class="material-icons">file_download</i>PDF
						</button>
					</li>
					<li>
						<button type="button" data-link=" #route('clinica.medicos.delete', $row->id) " data-method="get">
							<i class="material-icons">file_download</i>XLS
						</button>
					</li>
					<li class="divider" tabindex="-1"></li>
					<li class="disabled red-text">
						<button type="button" disabled="disabled" id="btn-delete" data-link="@yield('btn-delete-route')" data-method="delete">
							<i class="material-icons">delete</i>Excluir
						</button>
					</li>
				</ul>
				@section('search')
				<div class="input-field search bordered border-round z-depth-1">
					@section('search-label', 'Pesquisar...')
					<label for="">@yield('search-label')</label>
					<input type="search" id="search-on-page" data-search="@yield('data-search')" >
				</div>
				@show
			</div>
			<div class="action-buttons">
				<button class="btn btn-floating blue lighten-1 list gradient-45deg-indigo-light-blue waves-effect waves-light hide" id="change-mode" disabled="disabled">
					<i class="material-icons">list</i>
				</button>
				@section('btn-add')
				<button class="btn btn-floating gradient-45deg-deep-orange-orange waves-effect waves-light z-depth-3" data-tooltip="@yield('btn-add-title')" data-href="@yield('btn-add-route')" data-position="">
					<i class="material-icons">@yield('btn-add-icon')</i>
				</button>
				@show
			</div>
		</div>
	</div>
</div>

<div class="container pt-1 scroller" style="height: calc(100vh - 145px); width: 100%;">
	<div class="progress">
		<div class="indeterminate blue lighten-1"></div>
	</div>
	<div id="results">
		@yield('container')
	</div>
</div>

@yield('form-sidenav')

@endsection
