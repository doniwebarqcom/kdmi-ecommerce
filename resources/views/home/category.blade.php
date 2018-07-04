		<section class="flat-imagebox style2 background">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="product-wrap">
                            <div class="product-tab style1">
                                <ul class="tab-list">
                                    @foreach($category_home_product as $key => $value)
                                        @if(count($value->product) > 0)
                                            @if($key == 0)
                                                @php ($active = "active") @endphp
                                            @else
                                                 @php ($active = "") @endphp
                                            @endIf

                                        	<li class="{{ $active }}">{{ $value->name }}</li>
                                        @endIf
                                    @endForeach
                                    
                                </ul><!-- /.tab-list -->
                            </div><!-- /.product-tab style1 -->
                                                        
                            <div class="tab-item">
                                @foreach($category_home_product as $key => $value)
                                <div class="row">
                                    @foreach($value->product as $keyProduct => $valueProduct)

                                        @if($keyProduct == 0)
                                            <div class="col-md-6">
                                            @php  $img=resize_cloudinary($valueProduct->primary_image, 342, 435)  @endphp
                                        @else
                                            @php  $img=resize_cloudinary($valueProduct->primary_image, 240, 146)  @endphp
                                        @endIf
                                                                               
                                        @if(($keyProduct % 2) != 0 )
                                            <div class="col-md-3 col-sm-6">
                                        @endIf

                                         @if($keyProduct == 0)
                                            @php $style = 'style="max-width = 324px; max-heigth=435px;"'  @endphp
                                        @else
                                             @php $style = 'style="max-width = 240px; max-heigth=146x;"' @endphp
                                        @endIf

                                        <div class="product-box">
                                            <div class="imagebox style2">
                                                <div class="box-image">
                                                    <a href="{{ URL::to('product/'.$valueProduct->alias) }}" title="">
                                                        <img src="{{ $img }}" alt="">
                                                    </a>
                                                </div><!-- /.box-image -->
                                                <div class="box-content">
                                                    <div class="cat-name">
                                                        <a href="{{ URL::to('product/'.$valueProduct->alias) }}" title="">{{ $valueProduct->category }}</a>
                                                    </div>
                                                    <div class="product-name">
                                                        <a href="{{ URL::to('product/'.$valueProduct->alias) }}" title="">{{ $valueProduct->name }}</a>
                                                    </div>
                                                    <div class="price">
                                                        <span class="sale">Rp.{{ number_format($valueProduct->price) }}</span>
                                                    </div>
                                                </div><!-- /.box-content -->
                                                <div class="box-bottom">
                                                    <div class="btn-add-cart">
                                                        <a href="{{ URL::to('product/'.$valueProduct->alias) }}" title="">
                                                            <img src="http://grandetest.com/theme/techno-html/images/icons/add-cart.png" alt="">Add to Cart
                                                        </a>
                                                    </div>
                                                    <div class="compare-wishlist">
                                                        <a data-id='{{$valueProduct->id}}' class="wishlist wishlist-product" title="">
                                                            <img src="http://grandetest.com/theme/techno-html/images/icons/wishlist.png" alt="">Wishlist
                                                        </a>
                                                    </div>
                                                </div><!-- /.box-bottom -->
                                            </div><!-- /.imagebox style2 -->
                                        </div><!-- /.product-box -->

                                        @if(($keyProduct % 2) == 0 )
                                            </div>
                                        @endIf
                                    @endForeach
                                </div><!-- /.row -->
                                @endForeach
                            </div><!-- /.tab-item -->
                        </div><!-- /.product-wrap -->                        
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-imagebox style2 -->         