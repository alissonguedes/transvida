<?php $__env->startSection('page-text'); ?>

<div class="row">
	<div class="col s12 mb-4">
		<h3 class="center-align bold red-text text-darken-2">Serviços Médicos</h3>
	</div>
</div>

<div class="row">
	<div class="col s12 mb-4">
		<h5 class="mb-5">Telemedicina</h5>
		<p>
			Serviço médico através da plataforma.
		</p>
		<p>
			Este serviço compõe atendimentos médicos para mais de 30 especialidades <strong>sem cobrança extra</strong>.
		</p>
	</div>
</div>


<div class="row">
	<div class="col s12 mb-4">
		<h5 class="mb-5">Exames a domicílio</h5>
		<p>
			Serviço de exames diversos que poderão ser realizados no domícilio do paciente.
		</p>
		<p>
			Esse serviço pode ter uma coparticipação.
		</p>
	</div>
</div>


<div class="row">
	<div class="col s12 mb-4">
		<h5 class="mb-5">Outros serviços</h5>
		<ul class="list-style-dotted">
			<li>Venda e aluguéis de produtos</li>
			<li>Contratação de serviços médicos</li>
			<li>Cursos e treinamentos</li>
			<li>Doula</li>
		</ul>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('main.services.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/main/services/medicos.blade.php ENDPATH**/ ?>