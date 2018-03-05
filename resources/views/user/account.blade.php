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
		
        <section id="header" class="header">
		    @include('layout.header-top')
		</section><!-- /#header -->

		@include('layout.breadcrumb')		

		<section style="margin-top: 10px">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="flexslider">
							<ul class="slides">
							    <li>
							      <img style="margin:5px" src="{{ $user_data['image'] }}" alt="image" />
							    </li>				    
							</ul><!-- /.slides -->
						</div><!-- /.flexslider -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-9">
						<ul>
							<li style="width: 60px;margin-bottom: 10px">
								<a href="{{ URL::to('people/'.$user_data['id'].'/edit') }}"><i class="glyphicon glyphicon-edit"></i> Edit</a>
							</li>
							<li>
								<h1>{{ $user_data['name'] }}</h1>
							</li>
							<li>
								<i class="glyphicon glyphicon glyphicon-envelope"></i> {{ $user_data['email'] }}
							</li>
							<li>
								<i class="glyphicon glyphicon-earphone"></i> {{ $user_data['phone'] }}
							</li>
							<li>
								<i class="glyphicon glyphicon-education"></i> {{ date("d M Y", strtotime($user_data['birth']) )  }}
							</li>
						</ul>
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-product-detail -->
		
		<section style="margin-top: 10px">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h3>Koprasi</h3>
						<hr/>
						<div class="col-md-5">
							<div style="float: left">
								<img src="{{ $user_data['shop']->image }}" width="125px" height="125px">
							</div>
							<div style="float: left; margin-left: 10px">
								<a href="{{ URL::to($user_data['shop']->url.'/'.$user_data['shop']->url) }}"><strong>Koprasi {{ $user_data['shop']->name }}</strong></a><br>
								<p>{{ $user_data['shop']->slogan }}</p>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>		

		<footer>
			<div class="container">
				<div class="row">
					@include('layout.footer1')		
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->

		<script type="text/javascript">
			ready(function(){
				$('.disabled').click(function(e){
				     e.preventDefault();
				 })
			});
		</script>

		@include('layout.footer-copyright')
	</div>
@endsection