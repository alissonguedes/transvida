<?php  $records = []  ?>

<?php
	use App\Models\PermissaoModel;
?>

<?php if($pacientes->total() > 0): ?>

	<div class="row">
		<div class="col s12">
			<h6><?php echo e($pacientes->total()); ?> resultados encontrados.</h6>
		</div>
	</div>

	<div class="row">

		<?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col s12 m6 l4 grid-view">
				<div class="card card-border gradient-45deg-indigo-light-blue">
					<div class="card-content white-text">
						<div class="flex center-align flex-center">
							<img class="responsive-img circle z-depth-4 mr-6" src="<?php echo e(asset($paciente->imagem ?? (is_null($paciente->sexo) ? 'img/avatar/icon.png' : ($paciente->sexo == 'M' ? 'img/avatar/homem.png' : 'img/avatar/mulher.png') ) )); ?>" alt="" style="width: 80px; height: 80px; <?php echo e(isset($paciente) && $paciente->status == '0' ? 'opacity: 0.3;filter: grayscale(1);' : null); ?>">
							<?php if($paciente->status == '0'): ?>
								<i class="material-icons" style="position: absolute; left: 55px;">lock</i>
							<?php endif; ?>
							<h5 class="white-text mb-1 left-align"><?php echo e($paciente -> nome); ?></h5>
						</div>
						<br>
						<div class="info mt-3">
							<div style="display: flex; place-content: start; align-items: center;">
								<i class="material-icons mr-2">cake</i> <?php echo e($paciente->data_nascimento ?? 'Não informado'); ?>

							</div>
							<div class="mt-10" style="display: flex; place-content: start; align-items: center;">
								<i class="material-icons mr-2">credit_card</i> <?php echo e($paciente->cpf  ?? 'Não informado'); ?> <br>
							</div>
							<div style="display: flex; place-content: start; align-items: center;">
								<i class="material-icons mr-2">phone</i> <?php echo e($paciente->telefone ?? 'Não informado'); ?>

							</div>
							<div style="display: flex; place-content: start; align-items: center;">
								<i class="material-icons mr-2">message</i> <?php echo e($paciente->celular ?? 'Não informado'); ?>

							</div>
							<div style="display: flex; place-content: start; align-items: center;">
								<i class="material-icons mr-2">mail</i> <?php echo e($paciente->email ?? 'Não informado'); ?>

							</div>
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

<?php else: ?>

	<div class="row">
		<div class="col s12">
			<h6>Nenhum resultado encontrado.</h6>
		</div>
	</div>

<?php endif; ?>
<?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/pacientes/list.blade.php ENDPATH**/ ?>