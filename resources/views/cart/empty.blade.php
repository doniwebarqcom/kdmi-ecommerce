@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')

<style type="text/css">
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
	  -webkit-appearance: none; 
	  margin: 0; 
	}
</style>

<div class="boxed">
		<div class="overlay" style="opacity: 0; display: none;"></div>

		<!-- Preloader -->
		<div class="preloader" style="display: none;">
			<div class="clear-loading loading-effect-2">
				<span></span>
			</div>
		</div><!-- /.preloader -->
		
        @include('layout.nav')

        @include('layout.breadcrumb')

		<section class="flat-account background">
			<div class="container">
				<div class="row">
					<div class="col-md-8" style="margin: auto;">
						<div class="form-register" style="height: auto !important;">
							<form class="form-horizontal form-register box box-white box-shadow mb-30" id="register-form" name="form_reset" method="post" action="#">
							<div class="text-center">
								<h3 class="mb-0">Keranjang Kosong</h3>
								<hr>
								<p>
									Keranjang Belanja anda kosong silahkan pilih product yang anda ingin beli yang tersedia di dalam E-commerce Kodami
								</p>
							</div>
						</form>
						</div><!-- /.form-register -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-account -->

		<footer>
			<div class="container">
				<div class="row">
					@include('layout.footer1')		
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->		
		@include('layout.footer-copyright')
	</div>
@endsection

