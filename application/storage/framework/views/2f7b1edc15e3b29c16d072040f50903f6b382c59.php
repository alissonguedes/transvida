<?php $__env->startSection('title', 'Empresas'); ?>

<?php $__env->startSection('main'); ?>

<div class="container pt-1" style="width: 100%">
	<div class="row">
		<div class="col s12">
			<form action="<?php echo e(route('clinica.clinicas.post')); ?>" method="post" enctype="multipart/form-data" autocomplete="off" novalidate>

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
									<li class="tab col l3"><a href="#informacoes_contato">Contato</a></li>
									<li class="tab col l2"><a href="#informacoes_convenio">Convênio</a></li>
									<li class="tab col l2"><a href="#informacoes_endereco">Endereço</a></li>
									<li class="tab col l2"><a href="#outras_informacoes">Outros</a></li>
								</ul>
							</div>
						</div>
						<div class="card-body pt-2 fixed-height scroller" data-hide-x="true">
							<div class="row">
								<div class="col s10 offset-s1">

									<!-- BEGIN #dados_fiscais -->
									<div id="dados_fiscais">
										<div class="row">
											<div class="col s12 mt-1 mb-4">
												<h6>Dados Fiscais</h6>
											</div>
										</div>
										<div class="row">

										

											<div class="col s12 m10 l10">
												<div class="row">
													<div class="col s12 m6 l6">
														<div class="input-field">
															<label for="nome_fantasia">Fantasia</label>
															<input type="text" name="nome_fantasia" id="nome_fantasia" value="<?php echo e($row->nome_fantasia ?? null); ?>" autocapitalize="on">
														</div>
													</div>
													<div class="col s12 m6 l6">
														<div class="input-field">
															<label for="razao_social">Razão Social</label>
															<input type="text" name="razao_social" id="razao_social" value="<?php echo e($row->razao_social ?? null); ?>" autocapitalize="on">
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
															
														</div>
													</div>
													<div class="col s12 m6 l6">
														<div class="input-field">
															<label for="etnia">Cor da pele</label>
															
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
									<!-- END #dados_fiscais -->

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
													
												</div>
											</div>
											<div class="col s12 m4 l4">
												<div class="input-field">
													<label for="acomodacao">Acomodação</label>
													
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
												<label for="status" class="active blue-text text-accent-1">Clinica ativo</label>
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