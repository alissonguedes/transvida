{? $records = [] ?}

@php
	use App\Models\PermissaoModel;
@endphp

@if($paginate->total() > 0)

	@php
		$permissao = new PermissaoModel();
		$permissao = $permissao->getPermissao('clinica.clinicas.edit');
		$disabled = !$permissao ? true : false;
	@endphp

	@foreach($paginate as $ind => $row)
		<tr class="{{ $row->status === '0' ? 'blocked' : null }}" style="position: relative;" id="{{ $row->id }}" data-disabled="false">
			<td width="1%" data-disabled="true">
				<label>
					<input type="checkbox" name="id[]" class="filled-in" value="{{ $row->id }}" data-status="{{ $row->status }}">
					<span></span>
				</label>
			</td>
			<td>
				{{ $row->nome_fantasia }}
			</td>
			<td>
				{{ $row->cnpj }}
			</td>
			<td class="center-align">
				{{ $row->cidade }}
			</td>
			<td class="center-align">
				{{ $row->uf }}
			</td>
			<td class="center-align">
				{{ $row->data_cadastro }}
			</td>
			{{-- <td class="center-align">
				{{ $row->data_atualizacao ?? '-' }}
			</td> --}}
			<td>
				{{ $row->status === '0' ? 'Inativo' : 'Ativo' }}
			</td>
			<td data-disabled="true" class="center-align">
				@if(!$disabled)
					<button type="button" data-href="{{ route('clinica.clinicas.edit', $row->id) }}" class="btn-small btn-flat btn-floating float-none waves-effect" data-tooltip="Editar">
						<i class="material-icons grey-text">edit</i>
					</button>
				@endif
				@if(!$disabled)
					{? $status = ($row->status === '0' ? '1' : '0'); ?}
					<button class="btn-small btn-flat btn-edit btn-floating waves-effect" name="status" value="{{ $status }}" data-tooltip="{{ $status === '0' ? 'Bloquear' : 'Desbloquear' }}" data-link="{{ route('clinica.clinicas.patch', 'status', $row->id) }}" data-method="patch">
						<i class="material-icons grey-text">{{ $row->status === '1' ? 'lock' : 'lock_open' }}</i>
					</button>
				@endif
				@if(!$disabled)
					<button class="btn-small btn-flat btn-floating excluir waves-effect" data-link="{{ route('clinica.clinicas.delete', $row->id) }}" data-method="delete" data-tooltip="Excluir">
						<i class="material-icons grey-text">delete</i>
					</button>
				@endif
			</td>
		</tr>
	@endforeach

	<div id="pagination">

		<ul>

			<li>
				<button class="btn btn-flat btn-floating waves-effect" data-tooltip="Anterior" data-href="{{ !$paginate->onFirstPage() ? $paginate->previousPageUrl() : '#' }}" {{ $paginate->onFirstPage() ? 'disabled' : null }}>
					<i class="material-icons">keyboard_arrow_left</i>
				</button>
			</li>

			<li>
				<button class="btn btn-flat btn-floating waves-effect" data-tooltip="Próxima" data-href="{{ $paginate->currentPage() < $paginate->lastPage() ? $paginate->nextPageUrl() : '#' }}" {{ $paginate->currentPage() === $paginate->lastPage() ? 'disabled' : null }}>
					<i class="material-icons">keyboard_arrow_right</i>
				</button>
			</li>

		</ul>

	</div>

	<div id="info">
		<button data-href="#" class="btn btn-flat waves-effect">
			{{ $paginate->firstItem() }} - {{ $paginate->lastItem() }} de {{ $paginate->total() }}
			{{-- {{ $paginate -> perPage() }} --}}
		</button>
	</div>

@else


	<tr data-disabled="true">
		<td colspan="6">
			Nenhum registro encontrado.
		</td>
	</tr>

	<div id="pagination"></div>

	<div id="info"></div>

@endif
