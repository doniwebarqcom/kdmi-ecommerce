		@if(count($special_offer) > 0)
            <section class="flat-imagebox style3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                        	
                        	@if(count($special_offer) > 1)
                            	<div class="owl-carousel-2">
                            @endIf
                            
                            @foreach($special_offer as $key => $value)
                                <div class="box-counter">
                                    <div class="counter">
                                        <span class="special">Special Offer</span>
                                        <div class="counter-content">
                                            <p>{{$value->short_description}}</p>
                                            <div id="count-down" class="count-down co{{$key}}">
                                                <div class="square">
                                                    <div class="numb">
                                                        14
                                                    </div>
                                                    <div class="text">
                                                        DAYS
                                                    </div>
                                                </div>
                                                <div class="square">
                                                    <div class="numb">
                                                        09
                                                    </div>
                                                    <div class="text">
                                                        HOURS
                                                    </div>
                                                </div>
                                                <div class="square">
                                                    <div class="numb">
                                                        48
                                                    </div>
                                                    <div class="text">
                                                        MINS
                                                    </div>
                                                </div>
                                                <div class="square">
                                                    <div class="numb">
                                                        23
                                                    </div>
                                                    <div class="text">
                                                        SECS
                                                    </div>
                                                </div>
                                            </div><!-- /.count-down -->
                                        </div><!-- /.counter-content -->
                                    </div><!-- /.counter -->
                                    <div class="product-item">
                                        <div class="imagebox style3">
                                            <div class="box-image save">
                                                <a href="{{ URL::to('product/'.$value->product->alias) }}" title="">
                                                    <img src="{{$value->image}}" alt="">
                                                </a>
                                                <span>Save Rp{{ number_format($value->saving) }}</span>
                                            </div><!-- /.box-image -->
                                            <div class="box-content">
                                                <div class="product-name">
                                                    <a href="#" title="">{{ ucfirst($value->product->name) }}</a>
                                                </div>
                                                {!! $value->long_description !!}
                                                <div class="price">
                                                    <span class="sale">Rp{{number_format($value->product->price - $value->saving)}}</span>
                                                    <span class="regular">Rp.{{number_format($value->product->price)}}</span>
                                                </div>
                                            </div><!-- /.box-content -->
                                            <div class="box-bottom">
                                                <div class="btn-add-cart">
                                                    <a href="{{ URL::to('product/'.$value->product->alias) }}" title="">
                                                        <img src="http://grandetest.com/theme/techno-html/images/icons/add-cart.png" alt="">Add to Cart
                                                    </a>
                                                </div>
                                                <div class="compare-wishlist">
                                                    <a href="#" class="compare" title="">
                                                        <img src="http://grandetest.com/theme/techno-html/images/icons/compare.png" alt="">Compare
                                                    </a>
                                                    <a href="#" class="wishlist" title="">
                                                        <img src="http://grandetest.com/theme/techno-html/images/icons/wishlist.png" alt="">Wishlist
                                                    </a>
                                                </div>
                                            </div><!-- /.box-bottom -->
                                        </div><!-- /.imagbox style3 -->
                                    </div><!-- /.product-item -->
                                </div><!-- /.box-counter -->
                            @endForeach

                            @if(count($special_offer) > 1)
                            	</div>
                            @endIf

                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </section><!-- /.flat-imagebox style3 -->
        @endIf
        
@section('footer-script')
	<script type="text/javascript">
		$( document ).ready(function() {
	    	 var CountDown = function() {
	            var before = '<div class="square"><div class="numb">',
	                textday = '</div><div class="text">DAYS',
	                texthour = '</div><div class="text">HOURS',
	                textmin = '</div><div class="text">MINS',
	                textsec = '</div><div class="text">SECS';
	                if ($().countdown) {
	                  
	                    @foreach($special_offer as $key => $value)
		                    $(".co{{$key}}").countdown('{{ date("Y/m/d", $value->expired_time) }}', function(event) {
		                      $(this).html(event.strftime(before + '%D' + textday + '</div></div>' + before + '%H' + texthour + '</div></div>' + before + '%M' + textmin + '</div></div>' + before + '%S' + textsec + '</div>'));
		                    });
		                @endForeach
	                }
	        }; // Count Down
	        			
			CountDown();        	
		});		
	</script>
@endsection
