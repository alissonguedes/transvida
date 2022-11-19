<?php
	use App\Models\PermissaoModel;
?>

<?php if($pacientes->total() > 0): ?>

	<?php if(request()->get('query')): ?>
		<div class="row">
			<div class="col s12">
				<h6><?php echo e($pacientes->total()); ?> <?php if($pacientes->total()>1): ?> resultados encontrados <?php else: ?> resultado encontrado. <?php endif; ?> </h6>
			</div>
		</div>
	<?php endif; ?>

	<div class="row">

		<?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="col s12 m6 l3 grid-view">
				<div class="pacientes card card-border border-radius-6 z-depth-3 gradient-45deg-indigo-light-blue">
					<div class="card-content white-text">
						<div class="foto-paciente">
							<div class="foto circle z-depth-4 left">
								<img class="img-responsive" src="<?php echo e(asset($paciente->imagem ?? (is_null($paciente->sexo) ? 'img/avatar/icon.png' : ($paciente->sexo == 'M' ? 'img/avatar/homem.png' : 'img/avatar/mulher.png') ) )); ?>" alt="">
							</div>
							<h6 class="white-text"><?php echo e($paciente->nome); ?></h6>
							<p>
								<a href="#"><i class="material-icons">cake</i><?php echo e($paciente->data_nascimento ?? 'Não informado'); ?></a>
								<a href="#"><i class="material-icons">credit_card</i><?php echo e($paciente->cpf ?? 'Não informado'); ?></a>
							</p>
							<div class="clear"></div>
						</div>
						<div class="contato">
							<p class="mt-4">
								<a href="#"><i class="material-icons left">phone</i> <?php echo e($paciente->telefone ?? 'Não informado'); ?></a>
								<a href="#"><i class="material-icons left">message</i> <?php echo e($paciente->whatsapp ?? 'Não informado'); ?></a>
								<a href="#"><i class="material-icons left">mail</i> <?php echo e($paciente->email ?? 'Não informado'); ?></a>
							</p>
						</div>
						
						<div class="acoes flex flex-center mt-5">
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
<?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/empresas/results.blade.php ENDPATH**/ ?>