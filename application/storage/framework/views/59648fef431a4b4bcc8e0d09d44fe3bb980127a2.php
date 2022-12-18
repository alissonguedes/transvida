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

		<?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<div class="col s12 m6 l3 grid-view animated fadeIn slow delay-<?php echo e($i); ?>">
				<div class="pacientes card card-border border-radius-6 z-depth-3 gradient-45deg-indigo-light-blue">
					<div class="card-content white-text">
						<div class="foto-paciente">
							<div class="foto circle z-depth-4 left">
								<?php
									$style = null;
									if ($paciente->status === '0'):
									$style = 'opacity: 0.3; filter: grayscale(1)';
									endif;
								?>
								<img class="img-responsive" src="<?php echo e(asset($paciente->imagem ?? (is_null($paciente->sexo) ? 'img/avatar/icon.png' : ($paciente->sexo == 'M' ? 'img/avatar/homem.png' : 'img/avatar/mulher.png') ) )); ?>" alt="" style="<?php echo e($style); ?>">
								<?php if($paciente->status === '0'): ?>
									<i class="material-icons" style="position: absolute; left: 18px; top: 18px;">lock</i>
								<?php endif; ?>
							</div>
							<h6 class="white-text"><?php echo e($paciente->nome); ?></h6>
							<p>
								<a href="#"><i class="material-icons-outlined left">cake</i><?php echo e($paciente->data_nascimento ?? 'Não informado'); ?></a>
								<a href="#"><i class="material-icons-outlined left">credit_card</i><?php echo e($paciente->cpf ?? 'Não informado'); ?></a>
							</p>
							<div class="clear"></div>
						</div>
						<div class="contato">
							<p class="mt-4">
								<a href="#"><i class="material-icons-outlined left">phone</i> <?php echo e($paciente->telefone ?? 'Não informado'); ?></a>
								<a href="#"><i class="material-icons-outlined left">message</i> <?php echo e($paciente->whatsapp ?? 'Não informado'); ?></a>
								<a href="#"><i class="material-icons-outlined left">mail</i> <?php echo e($paciente->email ?? 'Não informado'); ?></a>
							</p>
						</div>
						
						<div class="acoes flex flex-center mt-5">
							<a class="waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Prontuário">
								<i class="material-icons-outlined">assignment_ind</i>
							</a>
							<a href="#" data-link="<?php echo e(route('clinica.pacientes.{id}.agendamento',$paciente->id)); ?>" name="id" id="<?php echo e($paciente->id); ?>" data-target="agendamento" class="form-sidenav-trigger waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Agendar">
								<i class="material-icons-outlined">event</i>
							</a>
							<a href="<?php echo e(route('clinica.pacientes.edit', $paciente->id)); ?>" class="waves-effect gradient-45deg-deep-orange-orange center-align icon-background circle white-text z-depth-3 mx-auto" data-tooltip="Editar">
								<i class="material-icons-outlined">edit</i>
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
<?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/pacientes/results.blade.php ENDPATH**/ ?>