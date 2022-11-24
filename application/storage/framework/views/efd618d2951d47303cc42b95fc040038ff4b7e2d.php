<?php $__env->startSection('page-title', 'Contato'); ?>

<?php $__env->startSection('capa'); ?>
<div class="nav-background">
	<div class="capa animated fadeIn teal lighten-2"></div>
	<div class="nav-header">
		<h1><?php echo $__env->yieldContent('page-title'); ?></h1>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main'); ?>

<div class="container mt-8 pt-6 pb-6">
	<div class="row">
		<div class="col s12 m6 l6">

			<div class="row">
				<div class="col s12 flex mb-3">
					<h3 class="mt-1">Endereços</h3>
				</div>
			</div>

			<div class="row">
				<div class="col s12">
					<h5 class="mb-5">Unidade João Pessoa</h5>
					<p>
						Av. Carneiro da Cunha, 64<br>
						Torre - João Pessoa - PB<br>
						<i class="material-icons hide-on-med-and-down" style="font-size: inherit; margin-top: 4px; position: relative; float: left; margin-right: 10px;">phone</i> (83) 3024·9880<br>
						<i class="icon whatsapp-black hide-on-med-and-down" style="margin-top: 4px; position: relative; float: left; margin-right: 10px;"></i> (83) 986 786 130
					</p>
				</div>
				<div class="col s12">
					<h5 class="mb-5">Unidade Campina Grande</h5>
					<p>
						Rua Ascendino Toscano Brito, 114<br>
						Santa Cruz - Campina Grande - PB<br>
						<i class="material-icons hide-on-med-and-down" style="font-size: inherit; margin-top: 4px; position: relative; float: left; margin-right: 10px;">phone</i> (83) 3339·1592<br>
						<i class="icon whatsapp-black hide-on-med-and-down" style="margin-top: 4px; position: relative; float: left; margin-right: 10px;"></i> (83) 988 699 434

					</p>
				</div>

			</div>

		</div>
		<div class="col s12 m6 l6">
			<form action="<?php echo e(route('main.contact')); ?>" method="post" enctype="multipart/form-data" novalidate="novalidate" autocomplete="off">
				<div class="row">
					<div class="col s12">
						<div class="input-field bordered">
							<input type="text" name="nome" placeholder="Seu nome">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s6 m6 l6">
						<div class="input-field bordered">
							<input type="text" name="email" placeholder="Seu e-mail">
						</div>
					</div>
					<div class="col s6 m6 l6">
						<div class="input-field bordered">
							<input type="text" name="telefone" class="is_celular" placeholder="Seu telefone">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<div class="input-field bordered">
							<input type="text" name="assunto" placeholder="Seu assunto">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<div class="input-field bordered">
							<textarea name="mensagem" class="materialize-textarea" placeholder="Sua mensagem"></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						<button type="submit" class="btn right btn-large col s12 flex flex-center teal darken-1 waves-effect border-round" data-toggle="Salvar">
							<span class="mr-1">Enviar</span>
							<i class="material-icons" style="transform: rotate(-45deg); top: -px;position: relative;">send</i>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/main/home/contato.blade.php ENDPATH**/ ?>