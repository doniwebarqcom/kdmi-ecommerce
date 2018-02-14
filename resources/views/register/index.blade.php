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
		
        @include('layout.nav')

        @include('layout.breadcrumb')
		
		<section class="flat-account background">
			<div class="container">
				<div class="row">
					<div class="col-md-6" style="margin: auto;">
						<div class="form-register" style="height: auto !important;">
							<div class="title" style="margin-bottom: 0;">
								<h3>Registrasi</h3>
							</div>

							@if(isset($message_error))
								<div class="isa_error">								   
								   	@foreach($message_error as $key => $value)
										<i class="fa fa-times-circle"><span style="font-size: 14px;margin-left: 3px"> {{ $value }} </span></i>
								   	@endForeach
								</div>
							@endIf

							{!! Form::open(['url' => 'register', 'method' => 'post', 'id' => 'formRegister'], ['accept-charset' => 'utf-8']) !!}
								<div class="form-box">
									{{ Form::label('nama_lengkap', 'Nama Lengkap (*)', ['for' => 'nama_lengkap']) }}
									{{ Form::text('nama_lengkap', '', ['id' => 'nama_lengkap', 'placeholder' => 'Nama Lengkap']) }}
								</div>

								<div class="form-box">
									{{ Form::label('no_telp', 'Nomor Telepon (*)', ['for' => 'no_telp']) }}
									{{ Form::text('no_telp', '', ['id' => 'no_telp', 'placeholder' => 'Nomor Telepon']) }}
								</div>

								<div class="form-box">
									{{ Form::label('email', 'Email (*)', ['for' => 'email']) }}
									{{ Form::email('email', '', ['id' => 'email', 'placeholder' => 'Email']) }}
								</div>

								<div class="form-box">
									{{ Form::label('password', 'Password (*)', ['for' => 'password']) }}
									{{ Form::password('password', ['id' => 'password', 'placeholder' => 'Password']) }}

								</div>


								<div class="form-box">
									<button type="submit" class="register">Register</button>
								</div><!-- /.form-box -->
							{!! Form::close() !!}

						</div><!-- /.form-register -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-account -->

		<section class="flat-row flat-iconbox style1 background">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1 v1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/car.png" alt="">
								</div>
								<div class="box-title">
									<h3>Worldwide Shipping</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1 v1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/order.png" alt="">
								</div>
								<div class="box-title">
									<h3>Order Online Service</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1 v1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/payment.png" alt="">
								</div>
								<div class="box-title">
									<h3>Payment</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
					<div class="col-md-6 col-lg-3">
						<div class="iconbox style1 v1">
							<div class="box-header">
								<div class="image">
									<img src="images/icons/return.png" alt="">
								</div>
								<div class="box-title">
									<h3>Return 30 Days</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-md-6 col-lg-3 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-iconbox -->

		<footer>
			<div class="container">
				<div class="row">
					@include('layout.footer1')		
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->

		@include('layout.footer-copyright')
	</div>

	<script type="text/javascript">		
		ready(function(){
			$("#formRegister").validate({
				rules: {
					nama_lengkap: "required",
					no_telp: "required",
					email:  {
				     	required: true,
				      	email: true
				    },
					password: {
				     	required: true,
				     	minlength: 8
				    }
				},
				messages: {
					nama_lengkap: "kolom harus diisi",
					no_telp: "kolom harus diisi",
					email: {
				     	required: "kolom harus diisi",
				      	email: "email tidak valid"
				    },
					password:  {
				     	required: "kolom harus diisi",
				     	minlength: "minimal 8 character"
				    }
				}
			});

			setTimeout(function() {
			    $('.isa_error').fadeOut('slow');
			}, 3000); // <-- time in milliseconds
		});		
	</script>
@endsection