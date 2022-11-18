<?php $__env->startSection('title', 'Especialidades'); ?>

<?php $__env->startSection('search'); ?>
<div class="input-field search bordered">
	<label for="">Pesquisar especialidades</label>
	<input type="search" id="search-on-page" class="dataTable_search">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('btn-add-title','Adicionar especialidade'); ?>
<?php $__env->startSection('btn-add'); ?>
<button class="modal-trigger btn btn-floating gradient-45deg-deep-orange-orange waves-effect waves-light" data-link="<?php echo e(route('clinica.especialidades.add')); ?>" data-target="modal_especialidade" data-tooltip="<?php echo $__env->yieldContent('btn-add-title'); ?>" data-href="<?php echo $__env->yieldContent('btn-add-route'); ?>">
	<i class="material-icons bolder">add</i>
</button>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('container'); ?>
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
			<div class="card-content scroller" style="overflow: auto; height: calc(100vh - 200px)">
				<div class="card-body responsive-table">
					<table class="table dataTable no-footer dataTable-fixed" data-link="<?php echo e(route('clinica.especialidades.index')); ?>">
						<thead>
							<tr>
								<th data-disabled="true">
									<label class="grey-text text-darken-2 font-14 left">
										<input type="checkbox" name="check-all" id="check-all" class="filled-in">
										<span></span>
									</label>
								</th>
								<th class="center-align">Especialidade</th>
								<th class="center-align">Descrição</th>
								<th class="center-align">Data de cadastro</th>
								<th class="center-align">Data de atualiação</th>
								<th class="center-align" class="center-align" data-disabled="true">Ações</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo $__env->make('clinica.especialidades.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('clinica.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/especialidades/index.blade.php ENDPATH**/ ?>