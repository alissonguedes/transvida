<footer class="teal darken-1">

	<div class="page-footer container">

		<div class="row">

			<div class="col l3 m4 s12">
				<div class="logo logo-footer">
					<a href="{{ route('main.home') }}" class="brand-logo white-text">
						<img src="{{ asset('img/site/logo/logo-white.png') }}" alt="">
					</a>
				</div>
			</div>

			<div class="col l6 m4 s12 mb-3 flex flex-column center-align">
				<h5>Institucional</h5>
				<ul class="menu">
					@yield('menu-list')
				</ul>
			</div>

			<div class="col l3 m4 s12">

				<div class="row">
					<div class="col s12">
						<div class="address">
							<h5>Endereço</h5>
							<p>
								Rua Ex-Combatente Assis Luís, 100<br>
								João Paulo II - João Pessoa - PB<br>
								CEP: 58076-100<br>
								Telefone: (83) 9 881 124 444
							</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col s12">
						{{-- <h5 class="right-align">Institucional</h5> --}}
						<ul class="social">
							<li>
								<a href="#">
									<i class="icon whatsapp"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="icon instagram"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="icon facebook"></i>
								</a>
							</li>
							<li>
								<a href="#">
									<i class="icon youtube"></i>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>

		</div>

	</div>

	<div class="teal darken-3">
		<div class="container">
			<div class="row">
				<div class="copy col s12 l6">
					{{ date('Y') }} - Todos os direitos reservados &copy; @yield('site-title')
				</div>
				<div class="dev col s12 l6">
					Desenvolvido por Alisson Guedes
				</div>
			</div>
		</div>
	</div>

</footer>
