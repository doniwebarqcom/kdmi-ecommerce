		@if(isset($breadcrumb) AND count($breadcrumb) > 0)
		<section class="flat-breadcrumb">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumbs">
							@foreach( $breadcrumb as $item )
								@if( next( $breadcrumb ) ) 
									<li class="trail-item">
										<a href="{{ url($item['url']) }}" title="">{{ $item['name'] }}</a>
										<span><img src="{{ asset('images/icons/arrow-right.png') }}" alt=""></span>
									</li>
								@else
									<li class="trail-end">
										<a href="#" title="">{{ $item['name'] }}</a>
									</li>
								@endIf								
							@endForeach
						</ul><!-- /.breacrumbs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-breadcrumb -->
		@endIf