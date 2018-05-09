        <section class="flat-imagebox style1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-row-title">
                            <h3>Our Products</h3>
                        </div>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
                <div class="row ">
                    <div class="col-md-12 owl-carousel-10">

                        @foreach($our_product as $key => $value)

                            @if(($key % 2) == 0)
                                <div class="owl-carousel-item">
                            @endIf

                                <div class="product-box style1">
                                    <div class="imagebox style1">
                                        <div class="box-image">
                                            <a href="{{ URL::to('product/'.$value->alias) }}" title="">
                                                <img src="{{$value->image}}" alt="">
                                            </a>
                                        </div><!-- /.box-image -->
                                        <div class="box-content">
                                            <div class="cat-name">
                                                <a href="{{ URL::to('product/'.$value->alias) }}" title="">{{ $value->category }}</a>
                                            </div>
                                            <div class="product-name">
                                                <a href="{{ URL::to('product/'.$value->alias) }}" title="">{{ $value->name }}</a>
                                            </div>
                                            <div class="price">
                                                @if($value->price_discont > 0)
                                                    <span class="regular">
                                                        Rp{{ number_format($value->price) }}
                                                    </span>
                                                @else
                                                    <br/>
                                                @endIf
                                                <span class="sale">
                                                    @if($value->price_discont > 0)                                                    
                                                        Rp{{ number_format($value->price_discont) }}
                                                    @else
                                                        Rp{{ number_format($value->price) }}
                                                    @endIf                                              
                                                </span>
                                            </div>
                                        </div><!-- /.box-content -->
                                        <div class="box-bottom">
                                            <div class="compare-wishlist" style="float: left;">
                                                <a data-id='{{$value->id}}' class="wishlist wishlist-product" title="">
                                                    <img src="http://grandetest.com/theme/techno-html/images/icons/wishlist.png" alt="">Wishlist
                                                </a>
                                            </div>
                                            <div class="btn-add-cart" style="float: right;">
                                                <a href="{{ URL::to('product/'.$value->alias) }}" title="">
                                                    Add to Cart
                                                </a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div><!-- /.box-bottom -->
                                    </div><!-- /.imagebox style1 -->
                                </div><!-- /.product-box style1 -->

                            @if(($key % 2) != 0)
                                </div>
                            @endIf
                            
                        @endForeach

                        @if(count($our_product) > 0 AND ($key % 2) == 0)
                            </div>
                        @endIf

                    </div><!-- /.owl-carousel-item -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-imagebox style1 -->