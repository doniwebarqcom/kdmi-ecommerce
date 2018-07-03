                        @if(isset($user_data) AND count($user_data) > 1)
                            <li class="account">
                                <a href="#" title=""><img src="{{ $user_data['image'] }}" height="100px" width="50px" style="border-radius: 50%" alt="Avatar"><i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="unstyled" style="width: 200px">
                                    <li style="border-bottom: 1px solid #e5e5e5">
                                        <div style="margin-left: 10px;">Hello, <b>{{ $user_data['name'] }}</b></div>
                                    </li>

                                    @if($user_data['shop'] !== null)
                                    <li>
                                        <a href="{{ url('koprasi/'.$user_data['shop']->url) }}" title="">Koprasi Saya</a>
                                    </li>
                                    @else
                                    <li>
                                        <a href=" {{ URL::to('koprasi/register') }}" title="">Buka Koprasi</a>
                                    </li>
                                    @endIf

                                    <li>
                                        <a href="{{ url('wishlist') }}" title="">Wishlist</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('cart') }}" title="">My Cart</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('profile') }}" title="">My Account</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('checkout') }}" title="">Checkout</a>
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