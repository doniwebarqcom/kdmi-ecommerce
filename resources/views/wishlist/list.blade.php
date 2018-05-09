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

		<section class="flat-wishlist">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="wishlist">
							<div class="title">
								<h3>My wishlist</h3>
							</div>
							<div class="wishlist-content">
								<table class="table-wishlist">
									<thead>
										<tr>
											<th>Product Name</th>
											<th>Unit Price</th>
											<th>Stock Status</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										@foreach($wishlist as $key => $value)
											<tr id="wishlist-{{$value->id}}">
												<td>
													<div class="delete">
														<a href="#" data-id="{{$value->id}}" class="remove-wishlist" title=""><img src="{{ asset('images/icons/delete.png') }}" alt=""></a>
													</div>
													<div class="product">
														<div class="image">
															<img src="{{ $value->product->primary_image }}" alt="">
														</div>
														<div class="name">
															{{ $value->product->name }}
														</div>
													</div>
												</td>
												<td>
													<div class="price">
														Rp{{ number_format($value->product->price) }}
													</div>
												</td>
												<td>
													<div class="status-product">
														@if($value->product->stock > 0)
															<span>In stock</span>
														@else
															<span>Out of stock</span>
														@endIf
													</div>
												</td>
												<td>
													<div class="add-cart">
														<a href="{{ URL::to('product/'.$value->product->alias) }}" title="">
															<img src="images/icons/add-cart.png" alt="">Add to Cart
														</a>
													</div>
												</td>
											</tr>
										@endForeach
																				
									</tbody>
								</table><!-- /.table-wishlist -->
							</div><!-- /.wishlist-content -->
						</div><!-- /.wishlist -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-wishlish -->

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

@section('footer-script')
	<script type="text/javascript">
		$(".remove-wishlist").click(function(){
			var id = $(this).data('id');
			$.ajax({
				type: 'DELETE',
				url: "{{ url('wishlist') }}",
				data : {
					"id" : id,
					"_token": "{{ csrf_token() }}",
				},
				dataType: 'json',
				success: function(data){
					if(data === 200)
						$("#wishlist-"+id).remove();
					else
						alert('something error at delete wishlist');
				}

			});
		});
	</script>
@endsection