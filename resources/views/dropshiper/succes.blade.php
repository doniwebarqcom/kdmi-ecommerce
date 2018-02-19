@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')

<div class="boxed">
		<div class="overlay" style="opacity: 0; display: none;"></div>

		<!-- Preloader -->
		<div class="preloader" style="display: none;">
			<div class="clear-loading loading-effect-2">
				<span></span>
			</div>
		</div><!-- /.preloader -->
		
		<section class="flat-breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-11">
						<ul class="breadcrumbs">
							<li class="trail-item">
								<a href="#" title="">Home</a>
								<span><img src="images/icons/arrow-right.png" alt=""></span>
							</li>
							<li class="trail-end">
								<a href="#" title="">Registrasi</a>
							</li>
						</ul><!-- /.breacrumbs -->
					</div><!-- /.col-md-12 -->
					<div class="col-md-1">
						<a href="login"><button type="button" class="btn btn-default">Masuk</button></a>
					</div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-breadcrumb -->

		<section class="flat-account background">
			<div class="container">
				<div class="row">
					<div class="col-md-8" style="margin: auto;">
						<div class="form-register" style="height: auto !important;">
							<form class="form-horizontal form-register box box-white box-shadow mb-30" id="register-form" name="form_reset" method="post" action="#">
							<div class="text-center">
								<p>Selamat anda berhasil mendaftar sebagai dropshiper dan akun anda akan diverifikasi oleh admin secepatnya</p>
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