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

		<?php echo $__env->make('clinica.pacientes.results', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	</div>

<?php else: ?>

	<div class="row">
		<div class="col s12">
			<h6>Nenhum resultado encontrado.</h6>
		</div>
	</div>

<?php endif; ?>
<?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/pacientes/list.blade.php ENDPATH**/ ?>