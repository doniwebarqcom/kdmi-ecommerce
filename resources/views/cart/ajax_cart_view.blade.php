						<div id="content-cart">	
							<table>
								<thead>
									<tr>
										<th>Product</th>
										<th>Quantity</th>
										<th>Total (Rp)</th>
										<th></th>
									</tr>
								</thead>
								<tbody>												
									@if(isset($cart) AND count($cart) > 0)
										@foreach($cart as $key => $value)
											<tr>
												<td>
													<div class="img-product">
														<a href="{{ url('product/'.$value->product->alias) }}"><img src="{{ $value->product->primary_image }}" alt=""></a>
													</div>
													<div class="name-product" style="max-width: 150px !important;margin-top: 10px">
														<a href="{{ url('product/'.$value->product->alias) }}">{{ $value->product->name }}</a>
													</div>
													<div class="price">
														{{ number_format($value->product->price) }}
													</div>
													<div class="clearfix"></div>
												</td>
												<td>
													<div class="quanlity" style="max-width: 160px !important">
														<span class="btn-down qty-cart-down" id="qty-cart-down" data-id="{{ $value->id }}"></span>
														<input type="number" class="input-qty" data-addres="" data-id="{{ $value->id }}" name="number" id="qty-{{ $value->id }}" name="qty[]" data-price="{{ $value->product->price }}" data-max="{{ $value->product->stock }}" data-id="{{ $value->id }}" data-alias="{{ $value->product->alias }}" value="{{ $value->quantity }}" min="1" max="100" placeholder="Quanlity">
														<input type="hidden" data-ongkir="{{$value->shipping_cost}}" value="{{ $value->product->price *  $value->quantity }}" name="tot-price-input[]" class="tot-price-input" id="tot-price-input-{{ $value->id }}">
														<span style="right: 15px;" class="btn-up qty-cart-up" data-id="{{ $value->id }}" class="qty-cart-up" ></span>
													</div>
												<td>
													<div class="total" id="total-price-{{ $value->id }}" style="margin-left: 10px">														
														{{ number_format($value->product->price *  $value->quantity) }}
													</div>
												</td>
												<td>
													<a style="cursor: pointer;" class="delete-cart" data-id="{{ $value->id }}">														
														<img src="{{ asset('images/icons/delete.png') }}" alt="">
													</a>
												</td>
											</tr>
											<tr style="border-bottom: 1px solid #c4c2c2">
												<td style="padding: 0 !important; ">
													<b>Alamat Kirim :</b><br/>
													<div style="max-width: 430px">
													<b>{{ $value->recipient_name }}, No Hp : {{ $value->phone_number_recipient }}</b><br/>
													{{ $value->addres }} , {{ $value->district }} , {{$value->regency}} , {{$value->province}} Kode Pos : {{$value->postal_code}}
													</div>
												</td>												
												<td></td>												
												<td align="right">
													<b>Ongkos Kirim</b><br/>
													<b>{{ number_format($value->shipping_cost) }}</b>
												</td>
												<td></td>
											</tr>								
										@endForeach
									@endIf

								</tbody>
							</table>
						</div>

		<script type="text/javascript">
			ready(function(){			

				$(".qty-cart-down").click(function(){
					var id = $(this).data('id');
					var qty_id = "#qty-"+id;
					var total_price = "#total-price-"+id;
					var total_price_input = "#tot-price-input-"+id;
					var price = parseInt($(qty_id).data('price'));
					var alias_product = $(qty_id).data('alias');
					var val = parseInt($(qty_id).val()) - 1;
					var cart_id = $(qty_id).data('id');

					if(val < 1 )
						val = 1;

					var result = val * price;
					var result_2 = result.formatMoney(0,'.',',');
					$(qty_id).val(val);
					$(total_price_input).val(result);
					$(total_price).html(result_2);
					sum_total();
					update_cart(val, cart_id);
				});

				$(".qty-cart-up").click(function(){
					var id = $(this).data('id');
					var qty_id = "#qty-"+id;
					var total_price = "#total-price-"+id;
					var total_price_input = "#tot-price-input-"+id;
					var max = parseInt($(qty_id).data('max'));					
					var price = parseInt($(qty_id).data('price'));
					var val = parseInt($(qty_id).val()) + 1;
					var alias_product = $(qty_id).data('alias');
					var cart_id = $(qty_id).data('id');

					if(val > max )
						val = max;
					
					var result = val * price;
					var result_2 = result.formatMoney(0,'.',',');
					$(qty_id).val(val);
					$(total_price_input).val(result);
					$(total_price).html(result_2);
					sum_total();
					update_cart(val, cart_id);
				});

				$(".input-qty").keyup(function(){
					var id = $(this).data('id');
					var qty_id = "#qty-"+id;
					var total_price = "#total-price-"+id;
					var total_price_input = "#tot-price-input-"+id;
					var max = parseInt($(qty_id).data('max'));					
					var price = parseInt($(qty_id).data('price'));
					var val = parseInt($(qty_id).val());
					var alias_product = $(qty_id).data('alias');
					var cart_id = $(qty_id).data('id');

					if(val > max )
						val = max;

					if(val < 1 )
						val = 1;
					
					var result = val * price;
					var result_2 = result.formatMoney(0,'.',',');
					$(qty_id).val(val);
					$(total_price_input).val(result);
					$(total_price).html(result_2);
					sum_total();
					update_cart(val, cart_id);
				})

				$(".delete-cart").click(function(){
					var id = $(this).data('id');
					$.ajax({
						type: "DELETE",
						url: '{{ URL::to("cart/ajax-cart") }}',
						data : {
							"_token": "{{ csrf_token() }}",
							"id": id,
						},
						dataType: 'json',
						success: function(data){						
							$("#content-cart").html(data.html);
							update_cart_header();
						}
					});
				});

				function update_cart(quantity, cart_id)
				{
					$.ajax({
						type: "PUT",
						url: '{{ URL::to("cart") }}/ajax',
						data : {
							"_token": "{{ csrf_token() }}",
							'quantity' : quantity,
							'cart_id' : cart_id
						},
						dataType: 'json',
						success: function(data){						
							update_cart_header();
							update_cart_content();
						}
					});
				}

				function update_cart_header()
				{
					$.ajax({
		                type: "GET",
		                url: '{{ URL::to("cart/ajax-cart-header") }}',
		                dataType: 'json',
		                success: function(data){               
		                    if(data.count > 0)
		                        $("#inner-box").html(data.html);
		                }
		            });
				}

				function add_quantity()
				{
					$(".qty-cart-down").click(function(){
						var id = $(this).data('id');
						var qty_id = "#qty-"+id;
						var total_price = "#total-price-"+id;
						var total_price_input = "#tot-price-input-"+id;
						var price = parseInt($(qty_id).data('price'));
						var alias_product = $(qty_id).data('alias');
						var val = parseInt($(qty_id).val()) - 1;
						var cart_id = $(qty_id).data('id');

						if(val < 1 )
							val = 1;

						var result = val * price;
						var result_2 = result.formatMoney(0,'.',',');
						$(qty_id).val(val);
						$(total_price_input).val(result);
						$(total_price).html(result_2);
						sum_total();
						update_cart(val, cart_id);
					});
				}

				function update_cart_content()
				{
					$.ajax({
		                type: "GET",
		                url: '{{ URL::to("cart/ajax-cart") }}',
		                dataType: 'json',
		                success: function(data){
		                    if(data.success === true){
		                    	$("#content-cart").html(data.html);
		                    }
		                }
		            });
				}

				function sum_total()
				{
					var result_total = 0;
					var total_ongkir = 0
					$('.tot-price-input').each(function(){
					    result_total += parseInt($(this).val());
					    total_ongkir += parseInt($(this).data('ongkir'));
					})

					var result_all = result_total + total_ongkir;
					var result_2 = result_total.formatMoney(0,',','.');
					var total_ongkir_2 = total_ongkir.formatMoney(0,',','.');
					var result_all_2 = result_all.formatMoney(0,',','.');
					
					$("#shipping-label").html(total_ongkir_2);
					$("#subtotal").html(result_2);
					$("#total_all").val(result_total);
					$(".price-total").html(result_all_2);

				}

				Number.prototype.formatMoney = function(decPlaces, thouSeparator, decSeparator) {
				    var n = this,
				        decPlaces = isNaN(decPlaces = Math.abs(decPlaces)) ? 2 : decPlaces,
				        decSeparator = decSeparator == undefined ? "." : decSeparator,
				        thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
				        sign = n < 0 ? "-" : "",
				        i = parseInt(n = Math.abs(+n || 0).toFixed(decPlaces)) + "",
				        j = (j = i.length) > 3 ? j % 3 : 0;
				    	
				    	return sign + (j ? i.substr(0, j) + thouSeparator : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) + (decPlaces ? decSeparator + Math.abs(n - i).toFixed(decPlaces).slice(2) : "");
				};

				sum_total();

			});
		</script>