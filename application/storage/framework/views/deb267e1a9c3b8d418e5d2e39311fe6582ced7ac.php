<?php $__env->startSection('title', 'Departamentos'); ?>

<?php $__env->startSection('search'); ?>
<div class="input-field search bordered border-round z-depth-1">
	<label for="">Pesquisar departamentos</label>
	<input type="search" id="search-on-page" class="dataTable_search">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('btn-add-title','Adicionar departamento'); ?>
<?php $__env->startSection('btn-add'); ?>
<button class="modal-trigger btn btn-floating gradient-45deg-deep-orange-orange waves-effect waves-light z-depth-3" data-link="<?php echo e(route('clinica.departamentos.add')); ?>" data-target="modal_departamento" data-tooltip="<?php echo $__env->yieldContent('btn-add-title'); ?>" data-href="<?php echo $__env->yieldContent('btn-add-route'); ?>">
	<i class="material-icons bolder">add</i>
</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content scroller">
				<div class="card-body responsive-table">
					<table class="table dataTable no-footer dataTable-fixed" data-link="<?php echo e(route('clinica.departamentos.index')); ?>">
						<thead>
							<tr>
								<th data-orderable="false">
									<label class="grey-text text-darken-2 font-14 left">
										<input type="checkbox" name="check-all" id="check-all" class="filled-in">
										<span></span>
									</label>
								</th>
								<th>Departamento</th>
								<th>Descrição</th>
								<th class="center-align">Data de cadastro</th>
								<th class="center-align">Status</th>
								<th class="center-align" class="center-align" data-orderable="false">Ações</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $__env->make('clinica.departamentos.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('clinica.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/departamentos/index.blade.php ENDPATH**/ ?>