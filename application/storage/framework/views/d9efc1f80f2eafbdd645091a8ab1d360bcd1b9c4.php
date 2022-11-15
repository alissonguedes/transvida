<?php $__env->startSection('title', 'Pacientes'); ?>

<?php $__env->startSection('search-label', 'Pesquisar pacientes'); ?>
<?php $__env->startSection('data-search', 'pacientes'); ?>

<?php $__env->startSection('btn-add-title','Adicionar paciente'); ?>
<?php $__env->startSection('btn-add-route', route('clinica.pacientes.add')); ?>

<?php $__env->startSection('container'); ?>

<div id="index" class="row">

	<?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<div class="col s12 m6 l3 grid-view">
			<div class="pacientes card card-border border-radius-6 z-depth-3 gradient-45deg-indigo-light-blue">
				<div class="card-content white-text">
					<div class="flex center-align flex-center">
						<img class="responsive-img circle z-depth-4 mr-6" src="<?php echo e(asset($paciente->imagem ?? (is_null($paciente->sexo) ? 'img/avatar/icon.png' : ($paciente->sexo == 'M' ? 'img/avatar/homem.png' : 'img/avatar/mulher.png') ) )); ?>" alt="" style="width: 80px; height: 80px; <?php echo e(isset($paciente) && $paciente->status == '0' ? 'opacity: 0.3;filter: grayscale(1);' : null); ?>">
						<?php if($paciente->status == '0'): ?>
							<i class="material-icons" style="position: absolute; left: 55px;">lock</i>
						<?php endif; ?>
						<h6 class="white-text mb-1 left-align"><?php echo e($paciente -> nome); ?></h6>
					</div>
					<br>
					<div class="info mt-3">
						<p>
							<i class="material-icons">cake</i> <?php echo e($paciente->data_nascimento ?? 'Não informado'); ?>

						</p>
						<p class="mt-10">
							<i class="material-icons">credit_card</i> <?php echo e($paciente->cpf  ?? 'Não informado'); ?> <br>
						</p>
						<p>
							<i class="material-icons">phone</i> <?php echo e($paciente->telefone ?? 'Não informado'); ?>

						</p>
						<p>
							<i class="material-icons">message</i> <?php echo e($paciente->celular ?? 'Não informado'); ?>

						</p>
						<p>
							<i class="material-icons">mail</i> <?php echo e($paciente->email ?? 'Não informado'); ?>

						</p>
					</div>
					
					<div class="acoes flex flex-center mt-5" style="font-size: 22px; line-height: 22px;">
						<a class="waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Prontuário">
							<i class="material-icons">content_paste</i>
						</a>
						<a href="#" class="waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Agendar">
							<i class="material-icons">event</i>
						</a>
						<a href="<?php echo e(route('clinica.pacientes.edit', $paciente->id)); ?>" class="waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Editar">
							<i class="material-icons">edit</i>
						</a>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('clinica.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/pacientes/index.blade.php ENDPATH**/ ?>