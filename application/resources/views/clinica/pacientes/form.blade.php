@extends('clinica.body')

@section('title', 'Prontuários')

@section('main')

<div class="container pt-1">
	<div class="row">
		<div class="col s12">
			<form action="#">
				<div class="card">
					<div class="card-content">
						<div class="card-title mb-3">
							Novo paciente
						</div>
						<div class="card-body scroller" data-scroll-x="true">
							<div class="row">
								<div class="col s12 m3 l3">
									<div class="input-field">
										<label for="">CPF:</label>
										<input type="tel" name="cpf" class="is_cpf">
									</div>
								</div>
								<div class="col s12 m3">
									<div class="input-field">
										<label for="">RG:</label>
										<input type="tel" name="rg">
									</div>
								</div>
								<div class="col s12 l6">
									<div class="input-field">
										<label for="">Nome</label>
										<input type="text" name="nome" autocapitalize="on">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<label for=""></label>
										<input type="text">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col s12">
									<div class="input-field">
										<label for="">teste</label>
										<input type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn green right">
								<span>Salvar</span>
								<i class="material-icons"></i>
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>



@endsection
