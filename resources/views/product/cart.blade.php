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

		<section class="flat-shop-cart">
			<div class="container">
				<div class="row">
					
					<div class="col-lg-9">
						<div class="flat-row-title style1">
							<h3>Shopping Cart</h3>
						</div>
						<div class="table-cart">
							
							@include('cart.ajax_cart_view')
							
							<div class="form-coupon">
								<form action="#" method="get" accept-charset="utf-8">
									<div class="coupon-input">
										<input type="text" name="coupon code" placeholder="Coupon Code">
										<button type="button">Apply Coupon</button>
									</div>
								</form>
							</div><!-- /.form-coupon -->
						</div><!-- /.table-cart -->
					</div><!-- /.col-lg-8 -->

					<div class="col-lg-3">
						<div class="cart-totals">
							<h3>Cart Totals</h3>
							<form action="#" method="get" accept-charset="utf-8">
								<table>
									<tbody>
										<tr>
											<td>Subtotal</td>
											<td class="subtotal" id="subtotal">0</td>
										</tr>
										<tr>
											<td>Shipping</td>
											<td id="shipping">
												<span id='shipping-label'>0</span> 
												<input type="hidden" name="shipping" id="val-shipping">
											</td>											
										</tr>
										<tr>
											<td>Total</td>
											<td class="price-total" style="font-size: 20px">
											0									
											</td>
											<input type="hidden" name="total_all" id="total_all">
										</tr>
									</tbody>
								</table>
								<div class="btn-cart-totals">
									<a href="{{ url('checkout') }}" class="checkout" title="">Checkout</a>
								</div><!-- /.btn-cart-totals -->
							</form><!-- /form -->
						</div><!-- /.cart-totals -->
					</div><!-- /.col-lg-4 -->


				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-shop-cart -->

		<section class="flat-row flat-iconbox style3">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="{{ asset('images/icons/car.png') }}" alt="">
								</div>
								<div class="box-title">
									<h3>Worldwide Shipping</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-3 col-md-6">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="{{ asset('images/icons/order.png') }}" alt="">
								</div>
								<div class="box-title">
									<h3>Order Online Service</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-3 col-md-6">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="{{ asset('images/icons/payment.png') }}" alt="">
								</div>
								<div class="box-title">
									<h3>Payment</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-lg-3 col-md-6 -->
					<div class="col-lg-3 col-md-6">
						<div class="iconbox style1">
							<div class="box-header">
								<div class="image">
									<img src="{{ asset('images/icons/return.png') }}" alt="">
								</div>
								<div class="box-title">
									<h3>Return 30 Days</h3>
								</div>
								<div class="clearfix"></div>
							</div><!-- /.box-header -->
						</div><!-- /.iconbox -->
					</div><!-- /.col-lg-3 col-md-6 -->
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
@endsection

