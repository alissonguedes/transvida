<?php  $records = []  ?>

<?php
	use App\Models\PermissaoModel;
?>

<?php if($paginate->total() > 0): ?>

	<?php
		$permissao = new PermissaoModel();
		$permissao = $permissao->getPermissao('clinica.clinicas.edit');
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
			<td>
				<?php echo e($row->nome_fantasia); ?>

			</td>
			<td>
				<?php echo e($row->cnpj); ?>

			</td>
			<td class="center-align">
				<?php echo e($row->cidade); ?>

			</td>
			<td class="center-align">
				<?php echo e($row->estado); ?>

			</td>
			<td class="center-align">
				<?php echo e($row->data_cadastro); ?>

			</td>
			
			<td>
				<?php echo e($row->status === '0' ? 'Inativo' : 'Ativo'); ?>

			</td>
			<td data-disabled="true" class="center-align">
				<?php if(!$disabled): ?>
					<button type="button" data-href="<?php echo e(route('clinica.clinicas.edit', $row->id)); ?>" class="btn-small btn-flat btn-floating float-none waves-effect" data-tooltip="Editar">
						<i class="material-icons grey-text">edit</i>
					</button>
				<?php endif; ?>
				
				<?php if(!$disabled): ?>
					<button class="btn-small btn-flat btn-floating excluir waves-effect" data-link="<?php echo e(route('clinica.clinicas.delete', $row->id)); ?>" data-method="delete" data-tooltip="Excluir">
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

	<div class="no-results white-text center-align">
		Nenhum registro encontrado.
	</div>

	<div id="pagination"></div>

	<div id="info"></div>

<?php endif; ?>
<?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/empresas/list.blade.php ENDPATH**/ ?>