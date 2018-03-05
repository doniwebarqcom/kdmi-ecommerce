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

		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div class="flexslider">
							<ul class="slides">
							    <li>
							      <img src="{{ $user_data['shop']->image }}" alt="image flexslider" />
							    </li>							    
							</ul><!-- /.slides -->
						</div><!-- /.flexslider -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-9">
						<div class="product-detail style4">
							<div class="header-detail">
								<h4 class="name">Koprasi {{ $user_data['shop']->name }}</h4>								
							</div><!-- /.header-detail -->
							<div class="content-detail">
								<div class="info-text">
									{{ $user_data['shop']->description }}
								</div>								
							</div><!-- /.content-detail -->							
						</div><!-- /.product-detail style4 -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-product-detail -->		

		<section class="flat-imagebox">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="product-tab style2">
							<ul class="tab-list">
								<li class="active"><a href="">Produk</a></li>
							</ul>
						</div><!-- /.product-tab -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
				<div class="box-product">
					<div class="row">						
						@if(isset($list_product))
							@foreach($list_product as $key => $value)
							<div class="col-sm-6 col-lg-3">
								<div class="product-box style4">
									<div class="imagebox">
										<div class="box-image">
											<a href="{{ URL::to($user_data['shop']->url.'/'.$value->alias) }}" title="{{ $value->name }}">
												<img src="{{ $value->primary_image }}" alt="">
											</a>
										</div><!-- /.box-image -->

										<div class="box-content">
											<div class="cat-name">
												<a href="{{ URL::to($value->koprasi->url.'/'.$value->alias) }}" title="">{{ $value->category }}</a>
											</div>
											<div class="product-name">
												<a href="{{ URL::to($value->koprasi->url.'/'.$value->alias) }}" title="">{{ $value->name }}</a>
											</div>
											<div class="price">
												<span class="sale">Rp. {{ number_format($value->price) }}</span>
											</div>

											@if( $user_data['dropshiper'] !== null)
												<div class="comision">
													<span class="price-comision" style="color: black;font-size: 10px">Comisi : Rp. {{ number_format($value->comisi) }}</span>
												</div>
											@endIf

										</div><!-- /.box-content -->
										
										@if(! isset($user_data['shop']->url) OR $user_data['shop']->url !== $value->koprasi->url)
											<div class="box-bottom">
												<div class="btn-add-cart">
													<a href="{{ URL::to($user_data['shop']->url.'/'.$value->alias) }}" title="{{ $value->name }}">
														<img src="{{ asset('images/icons/add-cart.png') }}" alt="">Add to Cart
													</a>
												</div>										
											</div><!-- /.box-bottom -->
										@endIf										
									</div><!-- /.imagebox -->
								</div>
							</div><!-- /.col-sm-6 col-lg-3 -->	
							@endForeach
						@endIf						
					</div>					
				<div class="divider10"></div>				
			</div><!-- /.container -->
		</section><!-- /.flat-imagebox -->

		@include('layout.pagination')		

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