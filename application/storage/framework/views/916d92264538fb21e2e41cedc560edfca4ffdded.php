<div class="row">
	<div id="modal_departamento" class="modal col s12 m4 l4 offset-m1 offset-l2" data-dismissible="false">
		<form action="<?php echo e(route('clinica.departamentos.post')); ?>" method="post" enctype="multipart/form-data" autocomplete="off" novalidade>

			<?php if(isset($row)): ?>
				<input type="hidden" name="_method" value="put">
				<input type="hidden" name="id" value="<?php echo e($row->id); ?>">
			<?php endif; ?>
			<div class="modal-content">
				<div class="row">
					<div class="col s12">
						<div class="input-field">
							<label for="titulo" class="<?php echo e(isset($row) && $row->titulo ? 'active' : null); ?>">Título</label>
							<input type="text" name="titulo" id="titulo" value="<?php echo e($row->titulo ?? null); ?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<div class="input-field">
							<label for="descricao" class="<?php echo e(isset($row) && $row->descricao ? 'active' : null); ?>">Descrição</label>
							<textarea name="descricao" id="descricao" class="materialize-textarea" style="min-height: 100px;"><?php echo e($row->descricao ?? null); ?></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<label for="status" class="active blue-text text-accent-1">Departamento ativo</label>
						<div class="switch mt-3" id="status">
							<label>
								Off
								<input type="checkbox" name="status" id="status" value="1" <?php echo e(!isset($row) || ($row && $row->status == '1') ? 'checked=checked' : null); ?>>
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
</div>
<?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/departamentos/form.blade.php ENDPATH**/ ?>