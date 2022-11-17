<div id="modal_medico" class="modal modal-fixed-footer" data-dismissible="false">
	<form action="{{ route('clinica.medicos.post') }}" method="post" enctype="multipart/form-data" autocomplete="off" novalidade>

		@if(isset($row))
			<input type="hidden" name="_method" value="put">
			<input type="hidden" name="id" value="{{ $row->id }}">
		@endif

		<div class="modal-content">
			<div class="row">
				<div class="col s12">
					<div class="input-field">
						<label for="nome" class="{{ isset($row) && $row->nome ? 'active' : null }}">Médico</label>
						<input type="text" name="nome" id="nome" value="{{ $row->nome ?? null }}">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12 m4 l4">
					<div class="input-field">
						<label for="cpf" class="{{ isset($row) && $row->crm ? 'active' : null }}">CPF</label>
						<input type="tel" name="cpf" id="cpf" class="is_cpf" value="{{ $row->cpf ?? null }}">
					</div>
				</div>
				<div class="col s12 m4 l4">
					<div class="input-field">
						<label for="rg" class="{{ isset($row) && $row->crm ? 'active' : null }}">RG</label>
						<input type="tel" name="rg" id="rg" value="{{ $row->rg ?? null }}">
					</div>
				</div>
				<div class="col s12 m4 l4">
					<div class="input-field">
						<label for="crm" class="{{ isset($row) && $row->crm ? 'active' : null }}">CRM</label>
						<input type="text" name="crm" id="crm" class="right-align" value="{{ $row->crm ?? null }}">
						{{-- <textarea name="descricao" id="descricao" class="materialize-textarea">{{ $row->descricao ?? null }}</textarea> --}}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s12">
					<div class="input-field">
						<label for="especialidade" class="active">Especialidade</label>
						<select name="especialidade" id="especialidade">
							<option value="" disabled selected>Informe o convênio</option>
							@foreach($especialidades as $especialidade)
								<option value="{{ $especialidade->id }}" {{ isset($row) && $especialidade->id==$row->id_especialidade ? 'selected=selected' : null }}>{{ $especialidade->especialidade }}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m4 l4">
					<label for="status" class="active blue-text text-accent-1">Médico ativo</label>
					<div class="switch mt-3" id="status">
						<label>
							Off
							<input type="checkbox" name="status" id="status" value="1" {{ !isset($row) || ($row && $row->status == '1') ? 'checked=checked' : null }}>
							<span class="lever"></span>
							On
						</label>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="reset" class="btn modal-close white waves-effect mr-2" data-toggle="Voltar">
				<i class="material-icons black-text">arrow_back</i>
			</button>
			<button type="submit" class="btn green waves-effect" data-toggle="Salvar">
				<i class="material-icons">save</i>
			</button>
		</div>
	</form>
</div>
