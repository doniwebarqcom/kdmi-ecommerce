                            @foreach($banner as $key => $value)
                                <div class="slider-item">
                                    <div class="item-text">
                                        <div class="header-item">
                                            <p>{{ $value->category }}</p>
                                            <h2 class="name">{{ $value->name }}</h2>
                                            <p>{{ $value->description }}</p>
                                        </div>
                                        <div class="divider65"></div>
                                        <div class="content-item">
                                            <div class="price">
                                                <span class="sale">Rp.{{number_format($value->price)}}</span>
                                                <span class="btn-shop">
                                                    <a href="#" title="">SHOP NOW <img src="http://grandetest.com/theme/techno-html/images/icons/right-2.png" alt=""></a>
                                                </span>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="regular">
                                                $2.500.99
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item-image">
                                        <div class="sale-off">
                                            60 % <span>sale</span>
                                        </div>
                                        <img src="{{$value->image}}" alt="">
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- /.slider -->
                            @endForeach