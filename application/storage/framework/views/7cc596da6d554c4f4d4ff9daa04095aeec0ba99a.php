<?php
	$dptos = [];
?>

<?php if(isset($select)): ?>

	<?php $__currentLoopData = $select; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

		<?php
			$dptos[] = ['id' => $s->id, 'titulo' => $s->titulo ];
		?>

	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?>

	<?php
		$dptos = 'Não existem departamentos nesta empresa.';
	?>

<?php endif; ?>

<?php
	echo json_encode($dptos);
?>
<?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/empresas/select_departamentos.blade.php ENDPATH**/ ?>