    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="logo" class="logo">
                        <a href="index.html" title="">
                            <img src="{{ asset('images/logo.jpeg') }}" alt="">
                        </a>
                    </div><!-- /#logo -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-6">
                    <div class="top-search">
                        <form action="#" method="get" class="form-search" accept-charset="utf-8">
                            <div class="cat-wrap">
                                <select name="category">
                                    <option hidden value="">All Category</option>
                                    <option hidden value="">Cameras</option>
                                    <option hidden value="">Computer</option>
                                    <option hidden value="">Laptops</option>
                                </select>
                                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                <div class="all-categories">
                                    @foreach ($categoryInSearch as $categorySearch)
                                    <div class="cat-list-search">
                                        <div class="title">
                                            {{ $categorySearch->name }}                                                
                                        </div>
                                        @isset($categorySearch->sub_category)
                                        <ul>
                                            @foreach ($categorySearch->sub_category as $sub)
                                                <li>{{ $sub->name }}</li>
                                            @endforeach
                                        </ul>
                                        @endisset
                                    </div>
                                    @endforeach                                    
                                </div><!-- /.all-categories -->
                            </div><!-- /.cat-wrap -->
                            <div class="box-search">
                                <input type="text" name="search" placeholder="Search what you looking for ?">
                                <span class="btn-search">
                                    <button type="submit" class="waves-effect"><img src="http://grandetest.com/theme/techno-html/images/icons/search.png" alt=""></button>
                                </span>
                                <div class="search-suggestions">
                                    <div class="box-suggestions">
                                        <div class="title">
                                            Search Suggestions
                                        </div>
                                        <ul>
                                            <li>
                                                <div class="image">
                                                    <img src="http://grandetest.com/theme/techno-html/images/product/other/s05.jpg" alt="">
                                                </div>
                                                <div class="info-product">
                                                    <div class="name">
                                                        <a href="#" title="">Razer RZ02-01071500-R3M1</a>
                                                    </div>
                                                    <div class="price">
                                                        <span class="sale">
                                                            $50.00
                                                        </span>
                                                        <span class="regular">
                                                            $2,999.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <img src="http://grandetest.com/theme/techno-html/images/product/other/s06.jpg" alt="">
                                                </div>
                                                <div class="info-product">
                                                    <div class="name">
                                                        <a href="#" title="">Notebook Black Spire V Nitro VN7-591G</a>
                                                    </div>
                                                    <div class="price">
                                                        <span class="sale">
                                                            $24.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <img src="http://grandetest.com/theme/techno-html/images/product/other/14.jpg" alt="">
                                                </div>
                                                <div class="info-product">
                                                    <div class="name">
                                                        <a href="#" title="">Apple iPad Mini G2356</a>
                                                    </div>
                                                    <div class="price">
                                                        <span class="sale">
                                                            $90.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <img src="http://grandetest.com/theme/techno-html/images/product/other/02.jpg" alt="">
                                                </div>
                                                <div class="info-product">
                                                    <div class="name">
                                                        <a href="#" title="">Razer RZ02-01071500-R3M1</a>
                                                    </div>
                                                    <div class="price">
                                                        <span class="sale">
                                                            $50.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <img src="http://grandetest.com/theme/techno-html/images/product/other/l01.jpg" alt="">
                                                </div>
                                                <div class="info-product">
                                                    <div class="name">
                                                        <a href="#" title="">Apple iPad Mini G2356</a>
                                                    </div>
                                                    <div class="price">
                                                        <span class="sale">
                                                            $24.00
                                                        </span>
                                                        <span class="regular">
                                                            $2,999.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <img src="http://grandetest.com/theme/techno-html/images/product/other/s08.jpg" alt="">
                                                </div>
                                                <div class="info-product">
                                                    <div class="name">
                                                        <a href="#" title="">Beats Snarkitecture Headphones</a>
                                                    </div>
                                                    <div class="price">
                                                        <span class="sale">
                                                            $90.00
                                                        </span>
                                                        <span class="regular">
                                                            $2,999.00
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><!-- /.box-suggestions -->
                                    <div class="box-cat">
                                        <div class="cat-list-search">
                                            <div class="title">
                                                Categories
                                            </div>
                                            <ul>
                                                
                                                @foreach ($categoryInSearch as $categorySearch)
                                                <li>
                                                    <a href="{{ $categorySearch->url }}">{{ $categorySearch->fullname }}</a>
                                                </li>                                                
                                                @endForeach

                                            </ul>
                                        </div><!-- /.cat-list-search -->
                                    </div><!-- /.box-cat -->
                                </div><!-- /.search-suggestions -->
                            </div><!-- /.box-search -->
                        </form><!-- /.form-search -->
                    </div><!-- /.top-search -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-3">
                    <div class="box-cart">
                        <div class="inner-box">
                            <ul class="menu-compare-wishlist">
                                <li class="compare">
                                    <a href="compare.html" title="">
                                        <img src="http://grandetest.com/theme/techno-html/images/icons/compare.png" alt="">
                                    </a>
                                </li>
                                <li class="wishlist">
                                    <a href="wishlist.html" title="">
                                        <img src="http://grandetest.com/theme/techno-html/images/icons/wishlist.png" alt="">
                                    </a>
                                </li>
                            </ul><!-- /.menu-compare-wishlist -->
                        </div><!-- /.inner-box -->
                        <div class="inner-box">
                            <a href="#" title="">
                                <div class="icon-cart">
                                    <img src="http://grandetest.com/theme/techno-html/images/icons/cart.png" alt="">
                                    <!--<span>4</span>-->
                                </div>
                                <div class="price">
                                    Rp. 0
                                </div>
                            </a>                            
                        </div><!-- /.inner-box -->
                    </div><!-- /.box-cart -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-middle -->