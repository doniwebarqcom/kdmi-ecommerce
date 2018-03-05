    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="flat-support">
                        <li>
                            <a href="faq.html" title="">Support</a>
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

                            @if($user_data['shop'] !== null)                            
                                <li>
                                    <a href="#" title="">Koprasi<i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                    <ul class="unstyled">
                                        <li>
                                            <a href=" {{ url('koprasi/'.$user_data['shop']->url) }}" title="">{{ $user_data['shop']->name }}</a>
                                        </li>
                                        <li>
                                            <a href=" {{ url('product-add') }}" title="">Tambah Product</a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li>
                                    <a href=" {{ URL::to('koprasi/register') }}" title="">Buka Koprasi</a>
                                </li>
                            @endIf

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
                                        <a href="{{ url('my-account') }}" title="">My Account</a>
                                    </li>
                                    <li>
                                        <a href="shop-checkout.html" title="">Checkout</a>
                                    </li>                                    
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