@extends('clinica.body')

@section('title', 'Prontuários')

@section('main')

<div class="container pt-1">
	<div class="row">
		<div class="col s12">
			<div class="card">
				<div class="card-content">
					<div class="card-title mb-3">
						<div class="flex flex-center flex-auto">
							<button class="dropdown-trigger btn pl-1 pr-1 pt-2 pb-2 white black-text mr-1 z-depth-1" data-target="dropdown-actions">
								<i class="material-icons checkbox">check_box</i>
								<i class="material-icons">keyboard_arrow_down</i>
							</button>
							<span class="grey-text selecteds-label"> </span>
							<button data-href="{{ route('clinica.pacientes.add') }}" class="btn blue lighten-1 padding-2 waves-effect waves-light">
								<i class="material-icons">person_add_alt_1</i>
							</button>
						</div>
					</div>
					<ul id="dropdown-actions" class="dropdown-content">
						<li>
							<a>
								<i class="material-icons">file_download</i>PDF
							</a>
						</li>
						<li>
							<a>
								<i class="material-icons">file_download</i>XLS
							</a>
						</li>
						<li class="divider" tabindex="-1"></li>
						<li class="disabled red-text">
							<button disabled>
								<i class="material-icons">delete</i>Excluir
							</button>
						</li>
					</ul>
					<div class="card-body scroller" data-scroll-x="true">
						{{-- class="table dataTable no-footer dataTable-fixed" data-link="{{ route('admin.menus') }}" --}}
						<table>
							<thead>
								<tr>
									<th>
										<label class="grey-text text-darken-2 font-14 left">
											<input type="checkbox" name="check-all" id="check-all">
											<span></span>
										</label>
									</th>
									<th class="table-col">Nome</th>
									<th class="table-col">Telefone</th>
									<th class="table-col">Código</th>
									<th class="table-col">Data de Nascimento</th>
									<th class="table-col">Convênio</th>
									<th class="table-col">Última Consulta</th>
								</tr>
							</thead>
							<tbody>
								@for($i = 1; $i <= 20; $i ++)
									<tr class="table-row padding-0 no-padding">
										<td class="table-col">
											<label class="grey-text text-darken-2 font-14 left">
												<input type="checkbox" name="select-all">
												<span></span>
											</label>
										</td>
										<td class="table-col">Alisson</td>
										<td class="table-col">(83) 9 8811-2444</td>
										<td class="table-col">069.422.924-51</td>
										<td class="table-col">18/01/1987</td>
										<td class="table-col">Bradesco Saúde</td>
										<td class="table-col">10/11/2022</td>
									</tr>
								@endfor
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



@endsection
