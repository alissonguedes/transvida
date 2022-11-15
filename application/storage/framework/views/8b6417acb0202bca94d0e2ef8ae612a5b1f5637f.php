<?php $__env->startSection('menu-list'); ?>
<li><a href="<?php echo e(route('main.home')); ?>">Início</a></li>
<li><a href="<?php echo e(route('main.about')); ?>">Sobre Nós</a></li>
<li><a href="<?php echo e(route('main.services')); ?>">Serviços</a></li>
<li><a href="<?php echo e(route('main.health')); ?>">Saúde</a></li>
<li><a href="<?php echo e(route('main.contact')); ?>">Atendimento</a></li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

	<?php echo $__env->make('main.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('capa'); ?>
	<?php echo $__env->make('main.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldContent('main'); ?>
	<?php echo $__env->make('main.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/main/body.blade.php ENDPATH**/ ?>