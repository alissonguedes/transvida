<?php $__env->startSection('title', 'Pacientes'); ?>

<?php $__env->startSection('search-label', 'Pesquisar pacientes'); ?>
<?php $__env->startSection('data-search', 'pacientes'); ?>

<?php $__env->startSection('btn-add-title','Adicionar paciente'); ?>
<?php $__env->startSection('btn-add-icon', 'person_add_alt_1'); ?>
<?php $__env->startSection('btn-add-route', route('clinica.pacientes.add')); ?>

<?php $__env->startSection('container'); ?>
<?php echo $__env->make('clinica.pacientes.results', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('form-sidenav'); ?>
<?php echo $__env->make('clinica.agendamentos.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('clinica.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/pacientes/index.blade.php ENDPATH**/ ?>