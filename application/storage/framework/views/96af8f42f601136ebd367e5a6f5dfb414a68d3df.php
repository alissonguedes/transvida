<?php $__env->startSection('title', 'Prontuários'); ?>

<?php $__env->startSection('main'); ?>

<div class="container pt-1" style="width: 100%">
	<div class="row">
		<div class="col s12">
			<form action="<?php echo e(route('clinica.pacientes.post')); ?>" method="post" enctype="multipart/form-data" autocomplete="off" novalidate>

				<?php if($row): ?>
					<input type="hidden" name="id" value="<?php echo e($row->id); ?>">
					<input type="hidden" name="_method" value="put">
				<?php endif; ?>

				<div class="card">
					<div class="card-content fixed-height">
						<div class="card-title mb-1">
							Novo paciente
						</div>
						<div class="row">
							<div id="tabs">
								<ul class="tabs">
									<li class="tab col l3"><a href="#informacoes_pessoais">Dados Pessoais</a></li>
									<li class="tab col l3"><a href="#informacoes_contato">Contato</a></li>
									<li class="tab col l2"><a href="#informacoes_convenio">Convênio</a></li>
									<li class="tab col l2"><a href="#informacoes_endereco">Endereço</a></li>
									<li class="tab col l2"><a href="#outras_informacoes">Outros</a></li>
								</ul>
							</div>
						</div>
						<div class="card-body pt-2 fixed-height scroller" data-hide-x="true">
							<div class="row">
								<div class="col s12 m10 l10 offset-m2 offset-l1">

									<!-- BEGIN #informacoes_pessoais -->
									<div id="informacoes_pessoais">
										<div class="row">
											<div class="col s12 mt-1 mb-4">
												<h6>Informações pessoais</h6>
											</div>
										</div>
										<div class="row">
											<div class="col s12 m2 l2">
												<div class="foto circle flex flex-column flex-center">
													<div class="preview z-depth-3">
														<img src="<?php echo e(asset($row->imagem ?? 'img/avatar/icon.png')); ?>" alt="" style="<?php echo e(isset($row) && empty($row->imagem) ? 'opacity: 0.4;filter: grayscale(1);' : null); ?>">
													</div>
													<div class="change-photo btn btn-floating z-depth-3 waves-effect blue lighten-1">
														<label for="imagem" class="material-icons white-text cursor-pointer" style="line-height: inherit;">photo_camera</label>
														<input type="file" name="imagem" id="imagem" style="position: absolute; left: 0; top: 0; bottom: 0; opacity: 0; z-index: -1; cursor: pointer">
													</div>
												</div>
											</div>
											<div class="col s12 m10 l10">
												<div class="row">
													<div class="col s12 m8 l8">
														<div class="input-field">
															<label for="nome">Nome</label>
															<input type="text" name="nome" id="nome" value="<?php echo e($row->nome ?? null); ?>" autocapitalize="on">
														</div>
													</div>
													<div class="col s12 m4 l4">
														<div class="input-field">
															<label for="codigo" class="active">Código</label>
															<div class="input-label">
																<?php if($row && $row->codigo): ?>
																	<?php echo e($row->codigo); ?>

																<?php else: ?>
																	<span style="font-size: 12px">Será gerado automaticamente</span>
																<?php endif; ?>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col s12 m4 l6">
														<label for="" class="active">Sexo</label>
														<div>
															<label class="input left mr-6">
																<input type="radio" name="sexo" value="M" class="with-gap" <?php echo e($row && $row->sexo == 'M' ? 'checked=checked' : null); ?>>
																<span>Masculino</span>
															</label>
															<label class="input left">
																<input type="radio" name="sexo" value="F" class="with-gap" <?php echo e($row && $row->sexo == 'F' ? 'checked=checked' : null); ?>>
																<span>Feminino</span>
															</label>
														</div>
													</div>
													<div class="col s12 m4 l6">
														<div class="input-field">
															<label for="data_nascimento" class="active">Data nascimento</label>
															<input type="text" name="data_nascimento" class="is_date" value="<?php echo e($row->data_nascimento ?? null); ?>" placeholder="dd/mm/yyyy" data-max-date="<?php echo e(date('d/m/Y')); ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col s12 m6 l6">
														<div class="input-field">
															<label for="estado_civil">Estado civil</label>
															<select name="estado_civil" id="estado_civil">
																<?php $__currentLoopData = $estado_civil; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $est): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<option value="<?php echo e($est->id); ?>" <?php echo e($row && $est->id==$row->id_estado_civil ? 'selected=selected' : null); ?>><?php echo e($est->descricao); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</select>
														</div>
													</div>
													<div class="col s12 m6 l6">
														<div class="input-field">
															<label for="etnia">Cor da pele</label>
															<select name="etnia" id="etnia">
																<option value="" disabled selected>Informe a cor da pele</option>
																<?php $__currentLoopData = $etnias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $etnia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																	<option value="<?php echo e($etnia->id); ?>" <?php echo e($row && $etnia->id==$row->id_etnia ? 'selected=selected' : null); ?>><?php echo e($etnia->descricao); ?></option>
																<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
															</select>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col s12 m4 l4">
														<div class="input-field">
															<label for="cpf">CPF</label>
															<input type="tel" name="cpf" id="cpf" class="is_cpf" value="<?php echo e($row->cpf ?? null); ?>">
														</div>
													</div>
													<div class="col s12 m4 l4">
														<div class="input-field">
															<label for="rg">RG</label>
															<input type="tel" name="rg" id="rg" value="<?php echo e($row->rg ?? null); ?>">
														</div>
													</div>
													<div class="col s12 m4 l4">
														<div class="input-field">
															<label for="cns">CNS</label>
															<input type="tel" name="cns" id="cns" value="<?php echo e($row->cns ?? null); ?>">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col s12 m6 l6">
														<div class="input-field">
															<label for="mae">Nome da mãe</label>
															<input type="text" name="mae" id="mae" value="<?php echo e($row->mae ?? null); ?>" autocapitalize="on">
														</div>
													</div>
													<div class="col s12 m6 l6">
														<div class="input-field">
															<label for="pai">Nome do pai</label>
															<input type="text" name="pai" id="pai" value="<?php echo e($row->pai ?? null); ?>" autocapitalize="on">
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col s12">
														<div class="input-field mb-6">
															<label for="notas">Observações</label>
															<textarea name="notas" id="notas" class="materialize-textarea"><?php echo e($row->notas ?? null); ?></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- END #informacoes_pessoais -->

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
											<div class="col s12 m4 l4">
												<label for="receber_notificacoes" class="blue-text text-accent-1">Receber notificações</label>
												<div class="switch mt-3">
													<label>
														Off
														<input type="checkbox" name="receber_notificacoes" id="receber_notificacoes" value="on" <?php echo e($row && $row->receber_notificacoes == 'on' ? 'checked=checked' : null); ?>>
														<span class="lever"></span>
														On
													</label>
												</div>
											</div>
											<div class="col s12 m4 l4">
												<label for="receber_email" class="active blue-text text-accent-1"> Enviar notificações por e-mail</label>
												<div class="switch mt-3">
													<label>
														Off
														<input type="checkbox" name="receber_email" id="receber_email" value="on" <?php echo e($row && $row->receber_email == 'on' ? 'checked=checked' : null); ?>>
														<span class="lever"></span>
														On
													</label>
												</div>
											</div>
											<div class="col s12 m4 l4">
												<label for="receber_sms" class="active blue-text text-accent-1">Enviar notificações por whatsapp</label>
												<div class="switch mt-3">
													<label>
														Off
														<input type="checkbox" name="receber_sms" id="receber_sms" value="on" <?php echo e($row && $row->receber_sms == 'on' ? 'checked=checked' : null); ?>>
														<span class="lever"></span>
														On
													</label>
												</div>
											</div>
										</div>
									</div>
									<!-- END #informacoes_contato -->

									<!-- BEGIN #informacoes_convenio -->
									<div id="informacoes_convenio">
										<div class="row">
											<div class="col s12 mt-1 mb-4">
												<h6>Convênio</h6>
											</div>
										</div>
										<div class="row">
											<div class="col s12 m4 l4">
												<div class="input-field">
													<label for="convenio">Convênio</label>
													<select name="convenio" id="convenio">
														<option value="" disabled selected>Informe o convênio</option>
														<?php $__currentLoopData = $convenios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $convenio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($convenio->id); ?>" <?php echo e($row && $convenio->id==$row->id_convenio ? 'selected=selected' : null); ?>><?php echo e($convenio->descricao); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
											</div>
											<div class="col s12 m4 l4">
												<div class="input-field">
													<label for="acomodacao">Acomodação</label>
													<select name="acomodacao" id="acomodacao">
														<option value="" disabled selected>Informe o tipo de acomodação</option>
														<?php $__currentLoopData = $acomodacoes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $acomodacao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<option value="<?php echo e($acomodacao->id); ?>" <?php echo e($row && $acomodacao->id==$row->id_acomodacao ? 'selected=selected' : null); ?>><?php echo e($acomodacao->descricao); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
											</div>
											<div class="col s12 m3 l4">
												<div class="input-field">
													<label for="matricula">Matrícula</label>
													<input type="text" name="matricula" id="matricula" value="<?php echo e($row->matricula_convenio ?? null); ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col s12 m3 l4">
												<div class="input-field">
													<label for="validade_convenio">Validade</label>
													<input type="text" name="validade_convenio" id="validade_convenio" value="<?php echo e($row->validade_convenio ?? null); ?>" class="is_date" data-min-date="<?php echo e(date('d/m/Y')); ?>">
												</div>
											</div>
										</div>
									</div>
									<!-- END #informacoes_convenio -->

									<!-- BEGIN #informacoes_endereco -->
									<div id="informacoes_endereco">
										<div class="row">
											<div class="col s12 mt-1 mb-4">
												<h6>Endereço</h6>
											</div>
										</div>
										<div class="row">
											<div class="col s12 m3 l4">
												<div class="input-field">
													<label for="cep">CEP</label>
													<input type="tel" name="cep" id="cep" class="is_cep" value="<?php echo e($row->cep ?? null); ?>" class="is_cep">
												</div>
											</div>
											<div class="col s18 m6 l6">
												<div class="input-field">
													<label for="logradouro">Logradouro</label>
													<input type="text" name="logradouro" id="logradouro" value="<?php echo e($row->logradouro ?? null); ?>">
												</div>
											</div>
											<div class="col s4 m3 l2">
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

									<!-- BEGIN #outras_informacoes -->
									<div id="outras_informacoes">
										<div class="row">
											<div class="col s12 mt-1 mb-4">
												<h6>Outras informações</h6>
											</div>
										</div>
										<div class="row">
											<div class="col s12 m4 l4">
												<label for="status" class="active blue-text text-accent-1">Paciente ativo</label>
												<div class="switch mt-3" id="status">
													<label>
														Off
														<input type="checkbox" name="status" id="status" value="1" <?php echo e(!$row || ($row && $row->status == '1') ? 'checked=checked' : null); ?>>
														<span class="lever"></span>
														On
													</label>
												</div>
											</div>
											<div class="col s12 m4 l4">
												<label for="obito" class="active blue-text text-accent-1">Quadro clínico evoluiu para óbito</label>
												<div class="switch mt-3" id="obito">
													<label>
														Off
														<input type="checkbox" name="obito" id="obito" value="1" <?php echo e($row && $row->obito == '1' ? 'checked=checked' : null); ?>>
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
							<button type="reset" class="btn white black-text waves-effect mr-2" data-tooltip="Voltar" data-href="<?php echo e(route('clinica.pacientes.index')); ?>">
								<i class="material-icons">arrow_back</i>
							</button>

							<button type="submit" class="btn green waves-effect" data-tooltip="Salvar">
								<i class="material-icons">save</i>
							</button>
						</div>

						<?php echo csrf_field(); ?>

					</div>

				</div>

			</form>

		</div>

	</div>

</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('clinica.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/alissonp/www/transvida/application/resources/views/clinica/pacientes/form.blade.php ENDPATH**/ ?>