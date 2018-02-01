    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="flat-support">
                        <li>
                            <a href="faq.html" title="">Support</a>
                        </li>
                        <li>
                            <a href="store-location.html" title="">Store Locator</a>
                        </li>
                        <li>
                            <a href="order-tracking.html" title="">Track Your Order</a>
                        </li>
                    </ul><!-- /.flat-support -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <ul class="flat-infomation">
                        <li class="phone">
                            Call Us: <a href="#" title="">(888) 1234 56789</a>
                        </li>
                    </ul><!-- /.flat-infomation -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <ul class="flat-unstyled">
                        @if(isset($user_data) AND count($user_data) > 1)
                            <li class="account">
                                <a href="#" title="">My Account<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="unstyled">
                                    <li>
                                        <a href="wishlist.html" title="">Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="shop-cart.html" title="">My Cart</a>
                                    </li>
                                    <li>
                                        <a href="account" title="">My Account</a>
                                    </li>
                                    <li>
                                        <a href="shop-checkout.html" title="">Checkout</a>
                                    </li>
                                    @if($user_data['have_shop'] == 1)
                                        <li>
                                            <a href=" {{ url('koprasi/'.$user_data['shop']->url) }}" title="">Koprasi Saya</a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="koprasi/register" title="">Buka Koprasi</a>
                                        </li>
                                    @endIf
                                    <li>
                                        <a href="{{ url('logout') }}" title="">Logout</a>
                                    </li>                                    
                                </ul><!-- /.unstyled -->
                            </li>
                        @else
                            <li>
                                <a href="{{ url('register') }}" title="">Daftar</a>
                            </li>
                            <li>
                                <a href="{{ url('login') }}" title="">Masuk</a>
                            </li>
                        @endIf                                    
                    </ul><!-- /.flat-unstyled -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->