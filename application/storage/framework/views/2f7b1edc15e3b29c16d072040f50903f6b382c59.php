<?php $__env->startSection('title', 'Empresas'); ?>

<?php $__env->startSection('main'); ?>

<div class="container pt-1" style="width: 100%">
	<div class="row">
		<div class="col s12">
			<form action="<?php echo e(route('clinica.clinicas.post')); ?>" method="post" enctype="multipart/form-data" autocomplete="random-string" novalidate>

				<?php if($row): ?>
					<input type="hidden" name="id" value="<?php echo e($row->id); ?>">
					<input type="hidden" name="_method" value="put">
				<?php endif; ?>

				<div class="card">
					<div class="card-content fixed-height">
						<div class="card-title mb-1">
							Adicionar clínica
						</div>
						<div class="row">
							<div id="tabs">
								<ul class="tabs">
									<li class="tab col l3"><a href="#dados_fiscais">Dados Fiscais</a></li>
									<li class="tab col l3"><a href="#departamentos">Departamentos</a></li>
									<li class="tab col l2"><a href="#informacoes_endereco">Endereço</a></li>
									<li class="tab col l2"><a href="#informacoes_contato">Contato</a></li>
									<li class="tab col l2"><a href="#outras_informacoes">Outros</a></li>
								</ul>
							</div>
						</div>
						<div class="card-body pt-2 fixed-height scroller" data-hide-x="true">

							<div class="row">
								<div class="col s12 m10 l10 offset-m2 offset-l1">

									<!-- BEGIN #dados_fiscais -->
									<div id="dados_fiscais">
										<div class="row">
											<div class="col s12 mt-1 mb-4">
												<h6>Dados Fiscais</h6>
											</div>
										</div>
										<div class="row">
											<div class="col s12 m2 l2 mb-4">
												<div class="foto circle flex flex-column flex-center mt-5">
													<div class="preview z-depth-4">
														<img src="<?php echo e(asset($row->logomarca ?? 'img/avatar/capa.jpg')); ?>" alt="" style="<?php echo e(isset($row) && empty($row->logomarca) ? 'opacity: 0.1;filter: grayscale(1);' : null); ?>">
													</div>
													<div class="change-photo btn btn-floating z-depth-3 waves-effect blue lighten-1" data-tooltip="Alterar imagem">
														<label for="logomarca" class="material-icons white-text cursor-pointer" style="line-height: inherit;">photo_camera</label>
														<input type="file" name="logomarca" id="logomarca" style="position: absolute; left: 0; top: 0; bottom: 0; opacity: 0; z-index: -1; cursor: pointer">
													</div>
												</div>
											</div>
											<div class="col s12 m10 l10">
												<div class="row">
													<div class="col s12 m6 l6">
														<div class="input-field">
															<label for="razao_social">Razão Social</label>
															<input type="text" name="razao_social" id="razao_social" value="<?php echo e($row->razao_social ?? null); ?>" autocapitalize="on">
														</div>
													</div>
													<div class="col s12 m6 l6">
														
													<div class="input-field">
														<label for="titulo">Descrição</label>
														<input type="text" name="titulo" id="titulo" value="<?php echo e($row->titulo ?? null); ?>" autocapitalize="on">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col s12 m4 l4">
													<div class="input-field">
														<label for="cnpj">CNPJ</label>
														<input type="tel" name="cnpj" id="cnpj" class="is_cnpj" value="<?php echo e($row->cnpj ?? null); ?>">
													</div>
												</div>
												<div class="col s12 m4 l4">
													<div class="input-field">
														<label for="inscricao_estadual">Inscrição Estadual</label>
														<input type="tel" name="inscricao_estadual" id="inscricao_estadual" value="<?php echo e($row->inscricao_estadual ?? null); ?>">
													</div>
												</div>
												<div class="col s12 m4 l4">
													<div class="input-field">
														<label for="inscricao_municipal">Inscriçao Municipal</label>
														<input type="tel" name="inscricao_municipal" id="inscricao_municipal" value="<?php echo e($row->inscricao_municipal ?? null); ?>">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- END #dados_fiscais -->

								<!-- BEGIN #departamentos -->
								<div id="departamentos">
									<div class="row">
										<div class="col s12 mt-1 mb-2">
											<h6>Atribuir Departamentos</h6>
										</div>
									</div>
									<div class="row">
										<div class="col s12 m12 l12">
											<div class="input-field">
												<table class="table dataTable" data-ajax="false">
													<thead>
														<tr data-disabled="true">
															<th class="sorting_disabled">
																<label class="grey-text text-darken-2 font-14 left">
																	<input type="checkbox" name="check-all" id="check-all" class="filled-in">
																	<span></span>
																</label>
															</th>
															<th class="sorting_disabled">Nome</th>
															<th class="sorting_disabled">Descrição</th>
														</tr>
													</thead>
													<tbody>

														<?php if(isset($row) ): ?>
															<?php
																$departamento_model = new App\Models\DepartamentoModel();
															?>
														<?php endif; ?>

														<?php $__currentLoopData = $departamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<?php if(isset($row)): ?>
																<?php
																	$dep = $departamento_model->getDepartamentoEmpresa($row->id, $departamento->id);
																	$checked = isset($dep) && $departamento->id === $dep->id ? 'checked=checked' : null;
																?>
															<?php endif; ?>
															<tr class="sorting_disabled">
																<td class="sorting_disabled">
																	<label>
																		<input type="checkbox" name="departamento[]" class="filled-in" value="<?php echo e($departamento->id); ?>" data-status="<?php echo e($departamento->status); ?>" <?php echo e($checked ?? null); ?>>
																		<span></span>
																	</label>
																</td>
																<td class="sorting_disabled"><?php echo e($departamento->titulo); ?></td>
																<td class="sorting_disabled"><?php echo e($departamento->descricao); ?></td>
															</tr>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</tbody>
												</table>
												
												
												
												
											</div>
										</div>
									</div>
								</div>
								<!-- END #departamentos -->

								<!-- BEGIN #informacoes_endereco -->
								<div id="informacoes_endereco">
									<div class="row">
										<div class="col s12 mt-1 mb-4">
											<h6>Endereço</h6>
										</div>
									</div>
									<div class="row">
										<div class="col s12 m3 l3">
											<div class="input-field">
												<label for="cep">CEP</label>
												<input type="tel" name="cep" id="cep" class="is_cep" value="<?php echo e($row->cep ?? null); ?>">
											</div>
										</div>
										<div class="col s18 m6 l6">
											<div class="input-field">
												<label for="logradouro">Logradouro</label>
												<input type="text" name="logradouro" id="logradouro" value="<?php echo e($row->logradouro ?? null); ?>">
											</div>
										</div>
										<div class="col s4 m3 l3">
											<div class="input-field">
												<label for="numero">Número</label>
												<input type="tel" name="numero" id="numero" value="<?php echo e($row->numero ?? null); ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col s12 m6 l6">
											<div class="input-field">
												<label for="complemento">Complemento</label>
												<input type="text" name="complemento" id="complemento" value="<?php echo e($row->complemento ?? null); ?>">
											</div>
										</div>
										<div class="col s12 m6 l6">
											<div class="input-field">
												<label for="bairro">Bairro</label>
												<input type="text" name="bairro" id="bairro" value="<?php echo e($row->bairro ?? null); ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col s12 m5 l5">
											<div class="input-field">
												<label for="cidade">Cidade</label>
												<input type="text" name="cidade" id="cidade" value="<?php echo e($row->cidade ?? null); ?>">
											</div>
										</div>
										<div class="col s12 m3 l3">
											<div class="input-field">
												<label for="uf">UF</label>
												<input type="text" name="uf" id="uf" value="<?php echo e($row->uf ?? null); ?>">
											</div>
										</div>
										<div class="col s12 m4 l4">
											<div class="input-field">
												<label for="pais">País</label>
												<input type="text" name="pais" id="pais" value="<?php echo e($row->pais ?? null); ?>">
											</div>
										</div>
									</div>
								</div>
								<!-- END #informacoes_endereco -->

								<!-- BEGIN #informacoes_contato -->
								<div id="informacoes_contato">
									<div class="row">
										<div class="col s12 mt-1 mb-4">
											<h6>Informações de contato</h6>
										</div>
									</div>
									<div class="row">
										<div class="col s12 m6 l4">
											<div class="input-field">
												<label for="email">E-mail</label>
												<input type="email" name="email" id="email" value="<?php echo e($row->email ?? null); ?>">
											</div>
										</div>
										<div class="col s12 m3 l4">
											<div class="input-field">
												<label for="telefone">Telefone</label>
												<input type="tel" name="telefone" id="telefone" value="<?php echo e($row->telefone ?? null); ?>" class="is_phone">
											</div>
										</div>
										<div class="col s12 m3 l4">
											<div class="input-field">
												<label for="celular">Celular</label>
												<input type="tel" name="celular" id="celular" value="<?php echo e($row->celular ?? null); ?>" class="is_celular">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col s12 mt-2 mb-3">
											<h6>Redes Sociais</h6>
										</div>
									</div>
									<div class="row">
										<div class="col s12 m3 l4">
											<div class="input-field">
												<label for="instagram">Instagram</label>
												<input type="tel" name="instagram" id="instagram" value="<?php echo e($row->instagram ?? null); ?>">
											</div>
										</div>
										<div class="col s12 m3 l4">
											<div class="input-field">
												<label for="facebook">Facebook</label>
												<input type="tel" name="facebook" id="facebook" value="<?php echo e($row->facebook ?? null); ?>">
											</div>
										</div>
										<div class="col s12 m3 l4">
											<div class="input-field">
												<label for="youtube">YouTube</label>
												<input type="tel" name="youtube" id="youtube" value="<?php echo e($row->youtube ?? null); ?>">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col s12">
											<div class="input-field">
												<label for="gmaps">Mapa</label>
												<input type="tel" name="gmaps" id="gmaps" value="<?php echo e($row->gmaps ?? null); ?>">
											</div>
										</div>
									</div>
								</div>
								<!-- END #informacoes_contato -->

								<!-- BEGIN #outras_informacoes -->
								<div id="outras_informacoes">
									<div class="row">
										<div class="col s12 mt-1 mb-4">
											<h6>Outras informações</h6>
										</div>
									</div>
									<div class="row">
										<div class="col s12 m2 l12 mb-4">
											<div class="input-field">
												<label class="active">Imagem de apresentação</label>
											</div>
											<div class="foto capa flex flex-column flex-center mt-5">
												<div class="preview z-depth-4">
													<img src="<?php echo e(asset($row->imagem ?? 'img/avatar/capa.jpg')); ?>" alt="" style="<?php echo e(isset($row) && empty($row->imagem) ? 'opacity: 0.1;filter: grayscale(1);' : null); ?>">
												</div>
												<div class="change-photo btn btn-large btn-floating z-depth-3 waves-effect blue lighten-1" data-tooltip="Alterar imagem">
													<label for="imagem" class="material-icons white-text cursor-pointer" style="line-height: inherit;">photo_camera</label>
													<input type="file" name="imagem" id="imagem" style="position: absolute; left: 0; top: 0; bottom: 0; opacity: 0; z-index: -1; cursor: pointer">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col s12 m4 l4">
											<label for="status" class="active blue-text text-accent-1">Clinica ativa</label>
											<div class="switch mt-3" id="status">
												<label>
													Off
													<input type="checkbox" name="status" id="status" value="1" <?php echo e(!$row || ($row && $row->status == '1') ? 'checked=checked' : null); ?>>
													<span class="lever"></span>
													On
												</label>
											</div>
										</div>
										
							</div>
						</div>
						<!-- END #outras_informacoes -->
					</div>
				</div>
		</div>

		<div class="card-footer right-align">
			<button type="reset" class="btn white black-text waves-effect mr-2" data-tooltip="Voltar" data-href="<?php echo e(route('clinica.clinicas.index')); ?>">
				<i class="material-icons">arrow_back</i>
			</button>

			<button type="submit" class="btn green waves-effect" data-tooltip="Salvar">
				<i class="material-icons">save</i>
			</button>
		</div>
	</div>
</div>
</form>
</div>
</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('clinica.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/empresas/form.blade.php ENDPATH**/ ?>