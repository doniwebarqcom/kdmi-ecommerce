        <section class="flat-row flat-slider">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="slider owl-carousel">                            
                            @foreach($banner as $key => $value)
                                @if($value->type === 0)
                                    <div class="slider-item style2">
                                        <div class="item-text">
                                            <div class="header-item">
                                                <p>{{ $value->category }}</p>
                                                <h2 class="name">{{ $value->name }}</h2>
                                                <p>{{ $value->description }}</p>
                                            </div>
                                            <div class="divider65"></div>
                                            <div class="content-item">
                                                <div class="price">
                                                    <span class="sale">
                                                        @if($value->price_discont > 0)
                                                            Rp {{number_format($value->price_discont)}}
                                                        @else
                                                            Rp {{number_format($value->price)}}
                                                        @endIf
                                                    </span>
                                                    <span class="btn-shop">
                                                        <a href="{{ URL::to('product/'.$value->alias) }}" title="">SHOP NOW <img src="http://grandetest.com/theme/techno-html/images/icons/right-2.png" alt=""></a>
                                                    </span>
                                                    <div class="clearfix"></div>
                                                </div>

                                                @if($value->price_discont > 0)
                                                    <div class="regular">
                                                        {{number_format($value->price)}}
                                                    </div>
                                                @endIf
                                            </div>
                                        </div>
                                        @if($value->discont > 0)
                                            <div class="item-image">
                                                <div class="sale-off">
                                                    {{$value->discont}}% <span>sale</span>
                                                </div>
                                                <img src="{{$value->image}}" alt="">
                                            </div>
                                            <div class="clearfix"></div>
                                        @endIf                                    
                                    </div><!-- /.slider -->

                                @else
                                    <div class="slider-item">
                                        <img style="display: block;margin-left: auto;margin-right: auto;" src="{{$value->image}}" alt="" class="center">
                                    </div><!-- /.slider -->      
                                @endIf
                            @endForeach

                        </div><!-- /.slider -->                        
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.flat-slider -->