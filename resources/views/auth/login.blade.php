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

		<section class="flat-breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
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
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-breadcrumb -->

		<section class="flat-account background">
			<div class="container">
				<div class="row">
					<div class="col-md-6" style="margin: auto;">
						<div class="form-register" style="height: auto !important;">
							<div class="title" style="margin-bottom: 0;">
								<h3>Login Page</h3>
							</div>
							<br/>
							


							{!! Form::open(['url' => 'login', 'method' => 'post'], ['accept-charset' => 'utf-8']) !!}

								@if(session('message_error'))
									<div id='message_error' class="form-box">
										<p style="color: red">{{ session('message_error') }}</p>
									</div>
								@endIf

								<div class="form-box">
									{{ Form::label('email', 'Username or email address * ', ['for' => 'email']) }}
									{{ Form::text('email', '', ['id' => 'email', 'placeholder' => 'Email Or Username']) }}
								</div>

								<div class="form-box">
									{{ Form::label('password', 'Password (*)', ['for' => 'password']) }}
									{{ Form::password('password', ['id' => 'password', 'placeholder' => 'Password']) }}

								</div>
								<div class="form-box">
									<button type="submit" class="login">Login</button>
									<a href="#" title="">Lost your password?</a>
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
					<div class="col-lg-3 col-md-6">
						<div class="widget-ft widget-about">
							<div class="logo logo-ft">
								<a href="index.html" title="">
									<img src="images/logos/logo-ft.png" alt="">
								</a>
							</div><!-- /.logo-ft -->
							<div class="widget-content">
								<div class="icon">
									<img src="images/icons/call.png" alt="">
								</div>
								<div class="info">
									<p class="questions">Got Questions ? Call us 24/7!</p>
									<p class="phone">Call Us: (888) 1234 56789</p>
									<p class="address">
										PO Box CT16122 Collins Street West, Victoria 8007,<br>Australia.
									</p>
								</div>
							</div><!-- /.widget-content -->
							<ul class="social-list">
								<li>
									<a href="#" title="">
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-instagram" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-pinterest" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-dribbble" aria-hidden="true"></i>
									</a>
								</li>
								<li>
									<a href="#" title="">
										<i class="fa fa-google" aria-hidden="true"></i>
									</a>
								</li>
							</ul><!-- /.social-list -->
						</div><!-- /.widget-about -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-3 col-md-6">
						<div class="widget-ft widget-categories-ft">
							<div class="widget-title">
								<h3>Find By Categories</h3>
							</div>
							<ul class="cat-list-ft">
								<li>
									<a href="#" title="">Desktops</a>
								</li>
								<li>
									<a href="#" title="">Laptops &amp; Notebooks</a>
								</li>
								<li>
									<a href="#" title="">Components</a>
								</li>
								<li>
									<a href="#" title="">Tablets</a>
								</li>
								<li>
									<a href="#" title="">Software</a>
								</li>
								<li>
									<a href="#" title="">Phones &amp; PDAs</a>
								</li>
								<li>
									<a href="#" title="">Cameras</a>
								</li>
							</ul><!-- /.cat-list-ft -->
						</div><!-- /.widget-categories-ft -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-2 col-md-6">
						<div class="widget-ft widget-menu">
							<div class="widget-title">
								<h3>Customer Care</h3>
							</div>
							<ul>
								<li>
									<a href="#" title="">
										Contact us
									</a>
								</li>
								<li>
									<a href="#" title="">
										Site Map
									</a>
								</li>
								<li>
									<a href="#" title="">
										My Account
									</a>
								</li>
								<li>
									<a href="#" title="">
										Wish List
									</a>
								</li>
								<li>
									<a href="#" title="">
										Delivery Information
									</a>
								</li>
								<li>
									<a href="#" title="">
										Privacy Policy
									</a>
								</li>
								<li>
									<a href="#" title="">
										Terms &amp; Conditions
									</a>
								</li>
							</ul>
						</div><!-- /.widget-menu -->
					</div><!-- /.col-lg-2 col-md-6 -->
					<div class="col-lg-4 col-md-6">
						<div class="widget-ft widget-newsletter">
							<div class="widget-title">
								<h3>Sign Up To New Letter</h3>
							</div>
							<p>Make sure that you never miss our interesting <br>
								news by joining our newsletter program
							</p>
							<form action="#" class="subscribe-form" method="get" accept-charset="utf-8">
								<div class="subscribe-content">
									<input type="text" name="email" class="subscribe-email" placeholder="Your E-Mail">
									<button type="submit"><img src="images/icons/right-2.png" alt=""></button>
								</div>
							</form><!-- /.subscribe-form -->
							<ul class="pay-list">
								<li>
									<a href="#" title="">
										<img src="images/logos/ft-01.png" alt="">
									</a>
								</li>
								<li>
									<a href="#" title="">
										<img src="images/logos/ft-02.png" alt="">
									</a>
								</li>
								<li>
									<a href="#" title="">
										<img src="images/logos/ft-03.png" alt="">
									</a>
								</li>
								<li>
									<a href="#" title="">
										<img src="images/logos/ft-04.png" alt="">
									</a>
								</li>
								<li>
									<a href="#" title="">
										<img src="images/logos/ft-05.png" alt="">
									</a>
								</li>
							</ul><!-- /.pay-list -->
						</div><!-- /.widget-newsletter -->
					</div><!-- /.col-lg-4 col-md-6 -->
				</div><!-- /.row -->
				<div class="row">
					<div class="col-md-12">
						<div class="widget widget-apps">
							<div class="widget-title">
								<h3>Mobile Apps</h3>
							</div>
							<ul class="app-list">
								<li class="app-store">
									<a href="#" title="">
										<div class="img">
											<img src="images/icons/app-store.png" alt="">
										</div>
										<div class="text">
											<h4>App Store</h4>
											<p>Available now on the</p>
										</div>
									</a>
								</li><!-- /.app-store -->
								<li class="google-play">
									<a href="#" title="">
										<div class="img">
											<img src="images/icons/google-play.png" alt="">
										</div>
										<div class="text">
											<h4>Google Play</h4>
											<p>Get in on</p>
										</div>
									</a>	
								</li><!-- /.google-play -->
							</ul><!-- /.app-list -->
						</div><!-- /.widget-apps -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->

	</div>

	<script type="text/javascript">
		ready(function(){
			var fade_out = function() {
			  $("#message_error").fadeOut().empty();
			}

			setTimeout(fade_out, 2000);		
		});
	</script>
@endsection