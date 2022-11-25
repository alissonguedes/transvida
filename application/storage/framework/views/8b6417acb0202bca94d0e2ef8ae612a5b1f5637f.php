<?php $__env->startSection('menu-list'); ?>
<li>
	<a href="<?php echo e(route('main.home')); ?>">
		<span>Início</span>
	</a>
</li>
<li>
	<a href="<?php echo e(route('main.about')); ?>">
		<span>Sobre nós</span>
	</a>
</li>
<li>
	<a class="dropdown-menu" href="Javascript:void(0)" data-target="services">
		<span class="dropdown-title">Serviços</span>
	</a>
	<ul class="dropdown-content dropdown-horizontal-list" id="services">
		<li tabindex="0">
			<a href="<?php echo e(route('main.services.medicos')); ?>">
				<span data-i18n="Modern Menu">Serviços Médicos</span>
			</a>
		</li>
		<li tabindex="0">
			<a href="<?php echo e(route('main.services.area_protegida')); ?>">
				<span data-i18n="Navbar Dark">Área Protegida</span>
			</a>
		</li>
		<li tabindex="0">
			<a href="<?php echo e(route('main.services.remocao')); ?>">
				<span data-i18n="Gradient Menu">Remoção e Transporte</span>
			</a>
		</li>
		<li tabindex="0">
			<a href="<?php echo e(route('main.services.comercial')); ?>">
				<span data-i18n="Navbar Dark">Comercial</span>
			</a>
		</li>
	</ul>
</li>
<li>
	<a href="<?php echo e(url('https://www.clubmedicus24h.com.br/')); ?>" target="_blank">
		<span class="dropdown-title" data-i18n="Apps">ClubMedicus24h</span>
	</a>
</li>
<li>
	<a href="<?php echo e(route('main.contact')); ?>">
		<span>Atendimento</span>
	</a>
</li>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

<div class="progress" style="z-index: 9999999; display: none;">
	<div class="indeterminate blue lighten-1"></div>
</div>

<?php echo $__env->make('main.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('capa'); ?>
<?php echo $__env->make('main.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('main'); ?>
<?php echo $__env->make('main.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/main/body.blade.php ENDPATH**/ ?>