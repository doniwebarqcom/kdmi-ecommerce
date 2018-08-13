							<a href="#" title="">
                                <div class="icon-cart">
                                    <img src="{{ asset('images/icons/cart.png') }}" alt="">
                                    @if($count > 0)
                                    	<span>{{ $count }}</span>
                                    @endIf
                                </div>
                                <div class="price">
                                    {{ number_format($total) }}
                                </div>
                            </a>

                            @if($total > 0)
                            <div class="dropdown-box">
                                <ul>
                                	@foreach($cart as $key => $value)
	                                    <li>
	                                        <div class="img-product">
	                                            <a href="{{url('product/'.$value->product->alias)}}"><img src="{{ $value->product->primary_image }}" alt=""></a>
	                                        </div>
	                                        <div class="info-product">
	                                            <div class="name">
	                                                <a href="{{url('product/'.$value->product->alias)}}">{{ $value->product->name }}</a>
	                                            </div>
	                                            <div class="price">
	                                                <span>{{ $value->quantity }} x</span>
	                                                <span>{{ number_format($value->product->price) }}</span>
	                                            </div>
	                                        </div>
	                                        <div class="clearfix"></div>
	                                        <span class="delete">x</span>
	                                    </li>
	                                @endForeach
                                </ul>
                                <div class="total">
                                    <span>Subtotal:</span>
                                    <span class="price">{{ number_format($total) }}</span>
                                </div>
                                <div class="btn-cart">
                                    <a href="{{ url('cart') }}" class="view-cart" title="">View Cart</a>
                                    <a href="{{ url('checkout') }}" class="check-out" title="">Checkout</a>
                                </div>
                            </div>
                            @endIf 