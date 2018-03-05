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
		
		<section class="flat-product-detail">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="flexslider">
							<ul class="slides">
							    <li data-thumb="{{ $product->primary_image }}" style="height: 370px">
							     	<img src="{{ $product->primary_image }}" alt="image flexslider" style="height: 370px;width: 555px" />
							    </li>							   

							    @if(isset($product->image) AND count($product) > 0)
							    	@foreach($product->image as $key => $value)
							    	<li data-thumb="{{ $value->image }}" style="height: 370px">
								    	<img src="{{ $value->image }}" alt="image flexslider" style="height: 370px;width: 555px" />
								    </li>	
							    	@endForeach
							    @endIf		    
							</ul><!-- /.slides -->
						</div><!-- /.flexslider style1 -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<div class="product-detail style1" style="height: 505px">
							<span class="bg"></span>
							<div class="header-detail">
								<h4 class="name">{{ $product->name}}</h4>
								<div class="category">
									{{ $product->category}}
								</div>
								<div class="reviewed">
									<div class="review">
										<div class="queue">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>									
									</div>
									<div class="status-product">
										Stock 
										<span>
											{{$product->stock}}
										</span>
									</div>
								</div>
							</div><!-- /.header-detail -->
							<div class="content-detail">
								<div class="price">									
									<div class="sale">
										RP. {{ number_format($product->price) }}
									</div>
								</div>

								@if(isset($user_data['dropshiper']) AND $user_data['dropshiper'] !== null)
									<div class="comision">
										<span class="price-comision" style="color: black;font-size: 12px"><strong> Comisi : Rp. {{ number_format($product->comisi) }} </strong></span>
									</div>
								@endIf

								<div class="info-text">
									{{ $product->description }}
								</div>
							</div><!-- /.content-detail -->
							<div class="footer-detail">								
								<div class="box-cart style2">
									<div class="btn-add-cart">
										<a href="{{ url('product/'.$product->alias.'/add-cart') }}" title=""><img src="{{ asset('images/icons/add-cart.png') }}" alt="">Add to Cart</a>
									</div>									
								</div>
								<div class="social-single">
									<span>SHARE</span>
									<ul class="social-list style2">
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
									</ul>
								</div>
							</div><!-- /.footer-detail -->
						</div><!-- /.product-detail style1 -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-product-detail style1 -->

		<section class="flat-product-content">
			<ul class="product-detail-bar">
				<li class="active">Detail</li>
				<li>Spesification</li>
			</ul><!-- /.product-detail-bar style1 -->
			<div class="container">

				<div class="row">
					<div class="col-md-12">
						<div class="tecnical-specs">
							<h4 class="name"> {{ $product->name }} </h4>
							{{ $product->long_description }}				
						</div><!-- /.tecnical-specs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->


				<div class="row">
					<div class="col-md-12">
						<div class="tecnical-specs">
							<h4 class="name"> {{ $product->name }} </h4>
							@if(isset($product->spesification) AND count($product) > 0)
							<table>
								<tbody>
								@foreach($product->spesification as $key => $value)
									<tr>
										<td width="200px">{{ $value->label }}</td>
										<td>:</td>
										<td>{{ $value->value }}</td>
									</tr>
								@endForeach
								</tbody>
							</table>
							@endIf							
						</div><!-- /.tecnical-specs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->

			</div><!-- /.container -->
		</section><!-- /.flat-product-content style1 -->

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