<?php  $records = []  ?>

<?php
	use App\Models\PermissaoModel;
?>

<?php if($paginate->total() > 0): ?>

	<?php
		$permissao = new PermissaoModel();
		$permissao = true;
		// $permissao = $permissao->getPermissao('clinica.medicos.edit');
		$disabled = !$permissao ? true : false;
	?>

	<?php $__currentLoopData = $paginate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ind => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr class="<?php echo e($row->status === '0' ? 'blocked' : null); ?>" style="position: relative;" id="<?php echo e($row->id); ?>" data-disabled="true">
			<td width="1%" data-disabled="true">
				<label>
					<input type="checkbox" name="id[]" class="filled-in" value="<?php echo e($row->id); ?>" data-status="<?php echo e($row->status); ?>">
					<span></span>
				</label>
			</td>
			<td width="15%">
				<p>
					<?php echo e($row->nome); ?>

				</p>
			</td>
			<td width="25%">
				<?php echo e($row->especialidade); ?>

			</td>
			<td>
				<?php echo e($row->crm); ?>

			</td>
			<td class="center-align" width="15%">
				<?php echo e($row->data_cadastro); ?>

			</td>
			<td class="center-align">
				<?php echo e($row->status === '0' ? 'Inativo' : 'Ativo'); ?>

			</td>
			<td data-disabled="true" width="25%" class="center-align">
				<?php if(!$disabled): ?>
					<button type="button" data-link="<?php echo e(route('clinica.medicos.edit', $row->id)); ?>" class="btn-small btn-flat btn-floating float-none waves-effect" data-target="modal_medico" data-tooltip="Editar">
						<i class="material-icons grey-text">edit</i>
					</button>
				<?php endif; ?>
				<?php if(!$disabled): ?>
					<?php  $status = ($row->status === '0' ? '1' : '0');  ?>
					<button class="btn-small btn-flat btn-edit btn-floating waves-effect" name="status" value="<?php echo e($status); ?>" data-tooltip="<?php echo e($status === '0' ? 'Bloquear' : 'Desbloquear'); ?>" data-link="<?php echo e(route('clinica.medicos.patch', 'status', $row->id)); ?>" data-method="patch">
						<i class="material-icons grey-text"><?php echo e($row->status === '1' ? 'lock' : 'lock_open'); ?></i>
					</button>
				<?php endif; ?>
				<?php if(!$disabled): ?>
					<button class="btn-small btn-flat btn-floating excluir waves-effect" data-link="<?php echo e(route('clinica.medicos.delete', $row->id)); ?>" data-method="delete" data-tooltip="Excluir">
						<i class="material-icons grey-text">delete</i>
					</button>
				<?php endif; ?>
			</td>
		</tr>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	<div id="pagination">

		<ul>

			<li>
				<button class="btn btn-flat btn-floating waves-effect" data-tooltip="Anterior" data-href="<?php echo e(!$paginate->onFirstPage() ? $paginate->previousPageUrl() : '#'); ?>" <?php echo e($paginate->onFirstPage() ? 'disabled' : null); ?>>
					<i class="material-icons">keyboard_arrow_left</i>
				</button>
			</li>

			<li>
				<button class="btn btn-flat btn-floating waves-effect" data-tooltip="Próxima" data-href="<?php echo e($paginate->currentPage() < $paginate->lastPage() ? $paginate->nextPageUrl() : '#'); ?>" <?php echo e($paginate->currentPage() === $paginate->lastPage() ? 'disabled' : null); ?>>
					<i class="material-icons">keyboard_arrow_right</i>
				</button>
			</li>

		</ul>

	</div>

	<div id="info">
		<button data-href="#" class="btn btn-flat waves-effect">
			<?php echo e($paginate->firstItem()); ?> - <?php echo e($paginate->lastItem()); ?> de <?php echo e($paginate->total()); ?>

			
		</button>
	</div>

<?php else: ?>

	<tr data-disabled="true">
		<td colspan="6">
			Nenhum registro encontrado.
		</td>
	</tr>

	<div id="pagination"></div>

	<div id="info"></div>

<?php endif; ?>
<?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/medicos/list.blade.php ENDPATH**/ ?>