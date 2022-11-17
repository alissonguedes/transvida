<?php $__env->startSection('styles'); ?>
<?php echo $__env->make('admin.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

	<?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<div id="main">
		<?php echo $__env->yieldContent('main'); ?>
	</div>

	<?php $__env->startSection('scripts'); ?>
	<?php echo $__env->make('authentication.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/admin/body.blade.php ENDPATH**/ ?>