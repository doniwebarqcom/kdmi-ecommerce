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
										Availablity 
										<span>
											@if($product->stock > 0)
												In stock
											@else
												Out of stock
											@endIf
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

								@if( $user_data['dropshiper'] !== null)
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
										<a href="#" title=""><img src="{{ asset('images/icons/add-cart.png') }}" alt="">Add to Cart</a>
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
				<li>Kriteria</li>
				<li>Spesification</li>
				<li>Reviews</li>
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
							@if(isset($product->spesification) AND count($product->spesification) > 0)
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

				<div class="row">
					<div class="col-md-12">
						<div class="tecnical-specs">
							<h4 class="name"> {{ $product->name }} </h4>
							@if(isset($product->spesification) AND count($product) > 0)
							<table>
								<tbody>
								@foreach($product->criteria as $key => $value)
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

				<div class="row">
					<div class="col-md-6">
						<div class="rating">
							<div class="title">
								Based on 3 reviews
							</div>
							<div class="score">
								<div class="average-score">
									<p class="numb">4.3</p>
									<p class="text">Average score</p>
								</div>
								<div class="queue">
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
									<i class="fa fa-star" aria-hidden="true"></i>
								</div>
							</div>
							<ul class="queue-box">
								<li class="five-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">3</span>
								</li>
								<li class="four-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">4</span>
								</li>
								<li class="three-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">3</span>
								</li>
								<li class="two-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">2</span>
								</li>
								<li class="one-star">
									<span>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</span>
									<span class="numb-star">0</span>
								</li>
							</ul>
						</div><!-- /.rating -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<div class="form-review style1">
							<div class="title">
								Add a review 
							</div>
							<div class="your-rating queue">
								<span>Your Rating</span>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
							</div>
							<form action="#" method="get" accept-charset="utf-8">
								<div class="review-form-name">
									<input type="text" name="name-author" value="" placeholder="Name">
								</div>
								<div class="review-form-email">
									<input type="text" name="email-author" value="" placeholder="Email">
								</div>
								<div class="review-form-comment">
									<textarea name="review-text" placeholder="Your Name"></textarea>
								</div>
								<div class="btn-submit">
									<button type="submit">Add Review</button>
								</div>
							</form>
						</div><!-- /.form-review style1 -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-12">
						<ul class="review-list">
							<li>
								<div class="review-metadata">
									<div class="name">
										Ali Tufan : <span>April 3, 2016</span>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
								</div><!-- /.review-metadata -->
								<div class="review-content">
									<p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
									</p> 
								</div><!-- /.review-content -->
							</li>
							<li>
								<div class="review-metadata">
									<div class="name">
										Peter Tufan : <span>April 3, 2016</span>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
								</div><!-- /.review-metadata -->
								<div class="review-content">
									<p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
									</p> 
								</div><!-- /.review-content -->
							</li>
							<li>
								<div class="review-metadata">
									<div class="name">
										Jon Tufan : <span>April 3, 2016</span>
									</div>
									<div class="queue">
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
										<i class="fa fa-star" aria-hidden="true"></i>
									</div>
								</div><!-- /.review-metadata -->
								<div class="review-content">
									<p>
										Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
									</p> 
								</div><!-- /.review-content -->
							</li>
						</ul><!-- /.review-list -->
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