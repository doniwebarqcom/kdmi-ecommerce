    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-2">
                    <div id="mega-menu">
                        <div class="btn-mega"><span></span>ALL CATEGORIES</div>
                        <ul class="menu">
                            @foreach ($category as $menuLevel1)

                                @if(isset($menuLevel1->subcategory) AND count($menuLevel1->subcategory) > 0)
                                        @php
                                            $typemenu = "dropdown"
                                        @endphp
                                    @else
                                        @php
                                            $typemenu = ""
                                        @endphp
                                @endif

                            <li>
                                <a href="#" title="" class="{{ $typemenu }}">
                                    <span class="menu-img">
                                        <img src="{{ $menuLevel1->image }}" alt="">
                                    </span>
                                    <span class="menu-title">
                                        {{ $menuLevel1->name }}
                                    </span>
                                </a>

                                @if($typemenu === "dropdown")
                                <div class="drop-menu">                                    
                                    @foreach ($menuLevel1->subcategory as $menuLevel2)
                                    <div class="one-third">
                                        <div class="cat-title">
                                            {{ $menuLevel2->name }}
                                        </div>
                                        @if(isset($menuLevel2->subcategory) AND count($menuLevel2->subcategory) > 0)
                                        <ul>
                                            @foreach ($menuLevel2->subcategory as $menuLevel3)
                                            <li>
                                                <a href="#" title="">{{ $menuLevel3->name }}</a>
                                            </li>
                                            @endForeach
                                            <div class="show">
                                                <a href="#" title="">Shop All</a>
                                            </div>    
                                        </ul>
                                        @endif        
                                    </div>
                                    @endForeach

                                    <div class="one-third">
                                        <ul class="banner">
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Headphones
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img src="http://grandetest.com/theme/techno-html/images/icons/right-2.png" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="http://grandetest.com/theme/techno-html/images/banner_boxes/menu-01.png" alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        TV & Audio
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img src="http://grandetest.com/theme/techno-html/images/icons/right-2.png" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="http://grandetest.com/theme/techno-html/images/banner_boxes/menu-02.png" alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                            <li>
                                                <div class="banner-text">
                                                    <div class="banner-title">
                                                        Computers
                                                    </div>
                                                    <div class="more-link">
                                                        <a href="#" title="">Shop Now <img src="http://grandetest.com/theme/techno-html/images/icons/right-2.png" alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="banner-img">
                                                    <img src="http://grandetest.com/theme/techno-html/images/banner_boxes/menu-03.png" alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                        </ul>   
                                    </div>

                                </div>
                                @endif
                            </li>
                            @endForeach                                                                                
                        </ul>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-9 col-10">
                    <div class="nav-wrap">
                        <div id="mainnav" class="mainnav">
                            <ul class="menu">                                
                                <li class="has-mega-menu">
                                    <a href="#" title="">Electronic</a>
                                    <div class="submenu">
                                        <div class="row">
                                            <div class="col-lg-3 col-md-12">
                                                <h3 class="cat-title">Accessories</h3>
                                                <ul class="submenu-child">
                                                    <li>
                                                        <a href="#" title="">Electronics</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Furniture</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Divided</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Everyday Fashion</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Modern Classic</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Party</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div><!-- /.col-lg-3 col-md-12 -->
                                            <div class="col-lg-3 col-md-12">
                                                <h3 class="cat-title">Laptop And Computer</h3>
                                                <ul class="submenu-child">
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Laptops, Desktops & Monitors</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Hard Drives & Memory Cards</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Printers & Ink</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Networking & Internet Devices</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Computer Accessories</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Software</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div><!-- /.col-lg-3 col-md-12 -->
                                            <div class="col-lg-4 col-md-12">
                                                <h3 class="cat-title">Audio & Video</h3>
                                                <ul class="submenu-child">
                                                    <li>
                                                        <a href="#" title="">Headphones & Speakers</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Home Entertainment Systems</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">MP3 & Media Players</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div><!-- /.col-lg-4 col-md-12 -->
                                            <div class="col-lg-2 col-md-12">
                                                <h3 class="cat-title">Home Audio</h3>
                                                <ul class="submenu-child">
                                                    <li>
                                                        <a href="#" title="">Home Theater Systems</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Receivers & Amplifiers</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">Speakers</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">CD Players & Turntables</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">High-Resolution Audio</a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="">4K Ultra HD TVs</a>
                                                    </li>
                                                </ul>
                                                <div class="show">
                                                    <a href="#" title="">Shop All</a>
                                                </div>
                                            </div><!-- /.col-lg-2 col-md-12 -->
                                        </div><!-- /.row -->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="banner-box">
                                                    <div class="inner-box">
                                                        <a href="#" title="">
                                                            <img src="http://grandetest.com/theme/techno-html/images/banner_boxes/submenu-01.png" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="banner-box">
                                                    <div class="inner-box">
                                                        <a href="#" title="">
                                                            <img src="http://grandetest.com/theme/techno-html/images/banner_boxes/submenu-02.png" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.submenu -->
                                </li><!-- /.has-mega-menu -->                                
                                <li class="column-1">
                                    <a href="contact.html" title="">Contact</a>
                                    <ul class="submenu">
                                        <li>
                                            <a href="contact.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Contact 01</a>
                                        </li>
                                        <li>
                                            <a href="contact-v2.html" title=""><i class="fa fa-angle-right" aria-hidden="true"></i>Contact 02</a>
                                        </li>
                                    </ul><!-- /.submenu -->
                                </li><!-- /.column-1 -->
                            </ul><!-- /.menu -->
                        </div><!-- /.mainnav -->
                    </div><!-- /.nav-wrap -->
                    <div class="today-deal">
                        <a href="#" title="">TODAY DEALS</a>
                    </div><!-- /.today-deal -->
                    <div class="btn-menu">
                        <span></span>
                    </div><!-- //mobile menu button -->
                </div><!-- /.col-md-9 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-bottom -->