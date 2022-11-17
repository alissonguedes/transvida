<?php $__env->startSection('main'); ?>

<div class="topbar flex flex-center">
	<div class="topbar-fixed topbar-color flex flex-auto z-depth-1">
		<div class="flex flex-auto flex-center">
			<div class="flex flex-auto flex-start flex-center" style="">
				<button class="dropdown-trigger btn white black-text z-depth-1" data-target="dropdown-actions">
					<i class="material-icons checkbox">check_box</i>
					<i class="material-icons">keyboard_arrow_down</i>
				</button>
				<ul id="dropdown-actions" class="dropdown-content">
					<li>
						<a>
							<i class="material-icons">file_download</i>PDF
						</a>
					</li>
					<li>
						<a>
							<i class="material-icons">file_download</i>XLS
						</a>
					</li>
					<li class="divider" tabindex="-1"></li>
					<li class="disabled red-text">
						<button disabled>
							<i class="material-icons">delete</i>Excluir
						</button>
					</li>
				</ul>
				<div class="input-field search bordered">
					<?php $__env->startSection('search-label', 'Pesquisar...'); ?>
					<label for=""><?php echo $__env->yieldContent('search-label'); ?></label>
					<input type="search" id="search-on-page" data-search="<?php echo $__env->yieldContent('data-search'); ?>">
				</div>
			</div>
			<div class="action-buttons">
				<button class="btn btn-floating blue lighten-1 list gradient-45deg-indigo-light-blue waves-effect waves-light hide" id="change-mode" disabled="disabled">
					<i class="material-icons">list</i>
				</button>
				<?php $__env->startSection('btn-add'); ?>
				<button class="btn btn-floating gradient-45deg-deep-orange-orange waves-effect waves-light" data-tooltip="<?php echo $__env->yieldContent('btn-add-title'); ?>" data-href="<?php echo $__env->yieldContent('btn-add-route'); ?>">
					<i class="material-icons">person_add_alt_1</i>
				</button>
				<?php echo $__env->yieldSection(); ?>
			</div>
		</div>
	</div>
</div>

<div class="container pt-1 scroller" style="height: calc(100vh - 145px); width: 100%;">
	<div class="progress" style="position: absolute; top: -9px; left: 0; right: 0; display: none;">
		<div class="indeterminate blue lighten-1"></div>
	</div>
	<div id="results">
		<?php echo $__env->yieldContent('container'); ?>
	</div>
</div>

<?php echo $__env->yieldContent('form-sidenav'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('clinica.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/layouts/index.blade.php ENDPATH**/ ?>