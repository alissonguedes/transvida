@extends('app')

@section('content' )

<div class="full-container">
	<div class="row">
		<div class="col s12 m8 l8 black white-text h-100vh hide-on-med-and-down">

		</div>
		<div class="col s12 m12 l4 amber h-100vh">

			<div class="" style="display: flex; flex: 1 100%; flex-direction: column; place-content: center; align-items: center">

				<div class="">
					<div class="col">
						<img src="{{ asset('img/site/logo/logo.png') }}" alt="" class="responsive-img" style="width: 180px; margin: 0 auto;">
					</div>
				</div>

				<div class="">
					<div class="card-panel z-depth-3 bg-opacity-1 border-radius-6 white col s12">
						<form action="#" method="post" enctype="multipart/form-data">
							<div class="card-content padding-6">
								<div class="row">
									<div class="col s12 mb-1">
										<div class="input-field">
											<label for="login">Usuário</label>
											<input type="text" name="login" id="login">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col s12 mb-1">
										<div class="input-field">
											<label for="senha">Senha</label>
											<input type="text" name="senha" id="senha">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col s12 mb-3">
										<button type="submit" class="btn teal waves-effect col s12">Entrar</button> </div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style>
	.h-100vh {
		height: calc(100vh - 0px);
		display: flex;
		flex: 1 100%;
		align-items: center;
		place-content: center;
		flex-direction: column;
	}

	.flex {
		align-items: center;
		place-content: center;
	}

</style>

@endsection
