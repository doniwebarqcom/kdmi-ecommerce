								@foreach($list_product as $key => $value)
								<div class="col-sm-6 col-lg-3">
									<div class="product-box style4">
										<div class="imagebox">
											<div class="box-image">
												<a href="{{ URL::to($user_data['shop']->url.'/'.$value->alias) }}" title="{{ $value->name }}">
													<img style="max-height: 200px" src="{{ $value->primary_image }}" alt="">
												</a>
											</div><!-- /.box-image -->

											<div class="box-content">
												<div class="cat-name">
													<a href="{{ URL::to($value->koprasi->url.'/'.$value->alias) }}" title="">{{ $value->category }}</a>
												</div>
												<div class="product-name">
													<a href="{{ URL::to($value->koprasi->url.'/'.$value->alias) }}" title="">{{ $value->name }}</a>
												</div>
												<div class="price">
													<span class="sale">Rp. {{ number_format($value->price) }}</span>
												</div>

												@if( $user_data['dropshiper'] !== null)
													<div class="comision">
														<span class="price-comision" style="color: black;font-size: 10px">Comisi : Rp. {{ number_format($value->comisi) }}</span>
													</div>
												@endIf

											</div><!-- /.box-content -->
											
											@if(! isset($user_data['shop']->url) OR $user_data['shop']->url !== $value->koprasi->url)
												<div class="box-bottom">
													<div class="btn-add-cart">
														<a href="{{ URL::to($user_data['shop']->url.'/'.$value->alias) }}" title="{{ $value->name }}">
															<img src="{{ asset('images/icons/add-cart.png') }}" alt="">Add to Cart
														</a>
													</div>										
												</div>
											@endIf										
										</div>
									</div>
								</div>
								@endForeach