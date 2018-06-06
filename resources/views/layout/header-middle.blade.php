    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="logo" class="logo">
                        <a href='{{ URL::to("home") }}' title="">
                            <img src="https://res.cloudinary.com/kodami/image/upload/v1528253473/kodami_lww5fk.png" alt="">
                        </a>
                    </div><!-- /#logo -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-6">
                    <div class="top-search">
                        <form action="#" method="get" class="form-search" accept-charset="utf-8">
                            <div class="cat-wrap">
                                <select name="category" style="border: none">
                                    <option hidden value="">All Category</option>
                                </select>
                                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                <div class="all-categories">
                                    @if(isset($categoryInSearch))
                                        @foreach ($categoryInSearch as $categorySearch)
                                        <div class="cat-list-search">
                                            <div class="title">
                                                {{ $categorySearch->name }}                                                
                                            </div>
                                            @isset($categorySearch->sub_category)
                                            <ul>
                                                @foreach ($categorySearch->sub_category as $sub)
                                                   <a href="{{ url('k/'.$sub->permalink) }}" title=""> <li>{{ $sub->name }}</li> </a>
                                                @endforeach
                                            </ul>
                                            @endisset
                                        </div>
                                        @endforeach
                                    @endIf
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
                                            @if( isset($categoryInSearch))
                                                @foreach ($categoryInSearch as $categorySearch)
                                                <li>
                                                    <a href="{{ $categorySearch->permalink }}">{{ $categorySearch->fullname }}</a>
                                                </li>                             
                                                @endForeach
                                            @endIf
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
                        <div id="inner-box" class="inner-box">
                            <a href="#" title="">
                                <div class="icon-cart">
                                    <img src="{{ asset('images/icons/cart.png') }}" alt="">
                                </div>
                                <div class="price">
                                    0
                                </div>
                            </a>                   
                        </div><!-- /.inner-box -->
                    </div><!-- /.box-cart -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-middle -->

    <script type="text/javascript">
        ready(function(){
            $.ajax({
                type: "GET",
                url: '{{ URL::to("cart/ajax-cart-header") }}',
                dataType: 'json',
                success: function(data){               
                    if(data.count > 0)
                        $("#inner-box").html(data.html);
                }
            });
        });        
    </script>