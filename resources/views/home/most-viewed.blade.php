<section class="flat-imagebox style4">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-row-title">
                            <h3>Most Viewed</h3>
                        </div>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="owl-carousel-3">
                            @foreach($most_viewed as $key => $value)
	                            <div class="imagebox style4" style="height: 310px">
	                                <div class="box-image">
	                                    <a href="{{ URL::to('product/'.$value->alias) }}" title="">
	                                        <img src="{{ resize_cloudinary($value->primary_image, 128, 111) }}" alt="">
	                                    </a>
	                                </div><!-- /.box-image -->
	                                <div class="box-content">
	                                    <div class="cat-name" style="height: 48px">
	                                        <a href="{{ URL::to('product/'.$value->alias) }}" title="">{{ $value->category }}</a>
	                                    </div>
	                                    <div class="product-name">
	                                        <a href="{{ URL::to('product/'.$value->alias) }}" title="">{{ $value->name }}</a>
	                                    </div>
	                                    <div class="price">
	                                        <span class="sale">Rp.{{ number_format($value->price) }}</span>
	                                    </div>
	                                </div><!-- /.box-content -->
	                            </div><!-- /.imagebox style4 -->
                            @endForeach                          
                        </div><!-- /.owl-carousel-3 -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-imagebox style4 -->