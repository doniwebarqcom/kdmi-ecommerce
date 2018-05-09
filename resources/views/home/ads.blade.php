		<section class="flat-row flat-banner-box">
            <div class="container">
                <div class="row">                
                    
                	@foreach($ads_home as $key => $value)                		 
                		@if($key === 0)
                			<div class="col-md-8">
                		@elseif($key === 4)
                			<div class="col-md-4">
                		@endIf

                			@if($key === 0 OR $key === 2)
                				<div class="banner-box one-half">
                			@elseif($key === 4)
                				<div class="banner-box">
							@endIf	                        	                        

	                            <div class="inner-box">
	                                <a href="{{ URL::to('product/'.$value->product->alias) }}" title="">
	                                    <img src="{{ $value->image }}" alt="">
	                                </a>
	                            </div><!-- /.inner-box -->	                            

	                     	@if($key === 1 OR $key === 3)
                					<div class="clearfix"></div>
	                        	</div><!-- /.box -->
	                        @elseif($key === 4)
                				</div>
							@endIf

	                    @if($key === 3 OR $key === 4)
                			</div><!-- /.col-md-8 -->
                		@endIf
	                    

                	@endForeach
                    

                </div><!-- /.row -->               
            </div><!-- /.container -->
        </section><!-- /.flat-banner-box -->