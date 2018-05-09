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
						<div class="col-md-12">						
						@if(isset($list_product) AND count($list_product) > 0)
							@foreach($list_product as $key => $value)
							<div class="col-sm-6 col-lg-3">
								<div class="product-box style4">
									<div class="imagebox">
										<div class="box-image">
											<a href="{{ URL::to('product/'.$value->alias) }}" title="{{ $value->name }}">
												<img src="{{ $value->primary_image }}" alt="">
											</a>
										</div><!-- /.box-image -->
										<?php ?>
										<div class="box-content">
											<div class="cat-name">
												<a href="{{ URL::to('product/'.$value->alias) }}" title="">{{ $value->category }}</a>
											</div>
											<div class="product-name">
												<a href="{{ URL::to('product/'.$value->alias) }}" title="">{{ $value->name }}</a>
											</div>
											<div class="price">
												<span class="sale">Rp. {{ number_format($value->price) }}</span>
											</div>

											@if(isset($user_data['dropshiper']))
												<div class="comision">
													<span class="price-comision" style="color: black;font-size: 10px">Comisi : Rp. {{ number_format($value->comisi) }}</span>
												</div>
											@endIf

										</div><!-- /.box-content -->
										
											<div class="box-bottom">
												<div class="btn-add-cart">
													<a href="{{ URL::to('product/'.$value->alias) }}" title="{{ $value->name }}">
														<img src="{{ asset('images/icons/add-cart.png') }}" alt="">Add to Cart
													</a>
												</div>										
											</div><!-- /.box-bottom -->				
									</div><!-- /.imagebox -->
								</div>
							</div><!-- /.col-sm-6 col-lg-3 -->	
							@endForeach
						@else
							<div class="title" style="font-size: 36px; padding: 20px;text-align: center">
                    			Sorry Stuff is still empty
                    		</div>
						@endIf						
					</div>					
				<div class="divider10"></div>				
			</div><!-- /.container -->
		</section><!-- /.flat-imagebox -->

		@if($paginator->next_page != 1)
			@include('layout.pagination')
		@endIf

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