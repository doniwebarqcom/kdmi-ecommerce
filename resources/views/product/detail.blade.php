@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')

<div class="boxed">
		<div class="overlay" style="opacity: 0; display: none;"></div>

		<!-- Preloader -->
		<div class="preloader" style="display: none;">
			<div class="clear-loading loading-effect-2">
				<span></span>
			</div>
		</div><!-- /.preloader -->
		
        @include('layout.nav')

        @include('layout.breadcrumb')
		
		<section class="flat-product-detail">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="flexslider">
							<ul class="slides">
							    <li data-thumb="{{ $product->primary_image }}" style="height: 370px">
							     	<img src="{{ $product->primary_image }}" alt="image flexslider" style="height: 370px;width: 555px" />
							    </li>							   

							    @if(isset($product->image) AND count($product) > 0 AND count($product->image) > 0)
							    	@foreach($product->image as $key => $value)
							    	<li data-thumb="{{ $value->image }}" style="height: 370px">
								    	<img src="{{ $value->image }}" alt="image flexslider" style="height: 370px;width: 555px" />
								    </li>	
							    	@endForeach
							    @endIf		    
							</ul><!-- /.slides -->
						</div><!-- /.flexslider style1 -->
					</div><!-- /.col-md-6 -->
					<div class="col-md-6">
						<div class="product-detail style1" style="height: 505px">
							<span class="bg"></span>
							<div class="header-detail">
								<h4 class="name">{{ $product->name}}</h4>
								<div class="category">
									{{ $product->category}}
								</div>
								<div class="reviewed">
									<div class="review">
										<div class="queue">
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
											<i class="fa fa-star" aria-hidden="true"></i>
										</div>									
									</div>
									<div class="status-product">
										Stock 
										<span>
											{{$product->stock}}
										</span>
									</div>
								</div>
							</div><!-- /.header-detail -->
							<div class="content-detail">
								<div class="price">									
									<div class="sale">
										RP. {{ number_format($product->price) }}
									</div>
								</div>

								@if(isset($user_data['dropshiper']) AND $user_data['dropshiper'] !== null)
									<div class="comision">
										<span class="price-comision" style="color: black;font-size: 12px"><strong> Comisi : Rp. {{ number_format($product->comisi) }} </strong></span>
									</div>
								@endIf

								<div class="info-text">
									{{ $product->description }}
								</div>
							</div><!-- /.content-detail -->
							<div class="footer-detail">								
								<div class="box-cart style2">
									<div class="btn-add-cart">
										<a id='add-cart' style="cursor: pointer;" title=""><img src="{{ asset('images/icons/add-cart.png') }}" alt="">Add to Cart</a>
									</div>									
								</div>
								<div class="social-single">
									<span>SHARE</span>
									<ul class="social-list style2">
										<li>
											<a href="#" title="">
												<i class="fa fa-facebook" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="#" title="">
												<i class="fa fa-twitter" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="#" title="">
												<i class="fa fa-instagram" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="#" title="">
												<i class="fa fa-pinterest" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="#" title="">
												<i class="fa fa-dribbble" aria-hidden="true"></i>
											</a>
										</li>
										<li>
											<a href="#" title="">
												<i class="fa fa-google" aria-hidden="true"></i>
											</a>
										</li>
									</ul>
								</div>
							</div><!-- /.footer-detail -->
						</div><!-- /.product-detail style1 -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-product-detail style1 -->

		<section class="flat-product-content">
			<ul class="product-detail-bar">
				<li class="active">Detail</li>
				<li>Spesification</li>
			</ul><!-- /.product-detail-bar style1 -->
			<div class="container">

				<div class="row">
					<div class="col-md-12">
						<div class="tecnical-specs">
							<h4 class="name"> {{ $product->name }} </h4>
							{{ $product->long_description }}				
						</div><!-- /.tecnical-specs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->


				<div class="row">
					<div class="col-md-12">
						<div class="tecnical-specs">
							<h4 class="name"> {{ $product->name }} </h4>
							@if(isset($product->spesification) AND count($product) > 0)
							<table>
								<tbody>
								@foreach($product->spesification as $key => $value)
									<tr>
										<td width="200px">{{ $value->label }}</td>
										<td>:</td>
										<td>{{ $value->value }}</td>
									</tr>
								@endForeach
								</tbody>
							</table>
							@endIf							
						</div><!-- /.tecnical-specs -->
					</div><!-- /.col-md-12 -->
				</div><!-- /.row -->

			</div><!-- /.container -->
		</section><!-- /.flat-product-content style1 -->

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Beli</h4>
					</div>
					
					<div class="modal-body">
						<div class="row content-product">
							<div class="col-md-6">
								Nama Product <br/>
								<a href="#" id="name_product"><strong>{{ $product->name }}</strong></a><br/><br/>
								<div class="col-md-6">
									Jumlah Barang <br/>
									<input class="no-radius" type="number" min="1" max="{{ $product->stock }}" value="1" name="sum_product_input" id="sum_product_input">
									<input type="hidden" value="{{ $product->price }}" id="price_product_input" name="price_product_input">
								</div>

								<div class="col-md-6">
									Harga Barang <br/>
									<strong><span id="price_product"> {{ number_format($product->price) }} </span></strong>
								</div>
							</div>

							<div class="col-md-6">
								Catatan Untuk penjual :
								<textarea class="no-radius" name="note_for_seller" style="height: 104px" placeholder="Catatan untuk penjual"></textarea>
							</div>
						</div>

						{!! Form::open(['url' => '#', 'method' => 'post', 'id' => 'self-place'], ['accept-charset' => 'utf-8']) !!}
							<div class="row content-self-place">
								<div style="width: 95%; margin-left: 10px; margin-top: 10px">
									<input type="hidden" value="0" id="regency_pickup" name="regency_pickup">
									<input type="hidden" value="0" id="pickup_id" name="pickup_id">
									<div style="float: left !important">
										Alamat Tujuan
									</div>

									<div style="float: right !important;">
										<a id="to-add-place" href="#" style="margin-left: 20px; float: right;"> <strong>Tambah Alamat Baru <span class="glyphicon glyphicon-triangle-right" aria-hidden="true"></span></strong></a>

										<div class="dropdown" style="float: right;">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><strong>Pilih Alamat Lain </strong></a>
											<ul class="dropdown-menu" id="dropdown-place">
											</ul>
										</div>
										
										<div style="clear:both"></div>	
									</div>
									<div style="clear:both"></div>
								</div>
								
								<div style="width: 100%;background-color: #f7f7f7; padding: 10px; margin-top: 10px">
									
									<div class="col-md-4">
										<div style="padding: 10px; background-color: white">
											<span id="recipient-name-modal"></span>  <br/>
											<span id="place-alias-modal"></span>
										</div>
									</div>

									<div class="col-md-8">
										<strong>akhamat miftakul khoir</strong><br/>
										<span id="address"></span><br/>
										<span id="district-modal"></span>,   <span id="regency-modal"></span>,  <span id="postal-code-modal"></span> <br/>
										<span id="province-modal"></span> <br/>
										Telp: <span id="telp-modal"></span>
									</div>

								</div>								
							</div>
						{!! Form::close() !!}

						{!! Form::open(['url' => '#', 'method' => 'post', 'id' => 'with-new-place'], ['accept-charset' => 'utf-8']) !!}
							<div class="row content-add-place" style="display: none">
								<div style="width: 95%; margin-left: 10px; margin-top: 10px">
									<a id="to-self-place" href="#"><strong>  <span class="glyphicon glyphicon-triangle-left" aria-hidden="true"></span>  Kembali</strong></a>
								</div>
								
								<div style="width: 100%;background-color: #f7f7f7; padding: 10px; margin-top: 10px">
									
									<div class="row">
										<div class="col-md-12">
											<strong>Simpan Alamat sebagai</strong><br/>
											<input type="text" class="no-radius" name="place_alias" id="place_alias">
										</div>	
									</div>

									<div class="row">
										<div class="col-md-4">
											<strong>Nama Penerima</strong><br/>
											<input type="text" class="no-radius" name="recipient_name" id="recipient_name">
										</div>	

										<div class="col-md-4">
											<strong>No. Hp Penerima</strong><br/>
											<input type="text" class="no-radius" name="recipient_number" id="recipient_number">
										</div>	

										<div class="col-md-4">
											<strong>Kode Pos</strong><br/>
											<input type="text" class="no-radius" name="postal_code_new" id="postal_code_new">
										</div>	

									</div>

									<div class="row">
										<div class="col-md-4">
											<strong>Provinsi</strong><br/>
											<select class="no-radius" name="province_new" id="province-new">
												<option value="null">** Pilih Provinsi</option>
												@if(isset($province) AND count($province) > 0)
													@foreach($province as $province => $value)
														<option value="{{ $value->id }}">{{ $value->name }}</option>
													@endForeach
												@endIf
											</select>
										</div>

										<div class="col-md-4">
											<strong>Kota / Kabupaten</strong><br/>
											<select class="no-radius" id="regency-new" name="regency_new">
												<option value="null">** Pilih Kota/ Kabupaten</option>												
											</select>
										</div>

										<div class="col-md-4">
											<strong>Kecamatan</strong><br/>
											<select class="no-radius" id="district-new" name="district_new">
												<option value="null">** Pilih Kecamatan</option>
											</select>
										</div>

									</div>
									
									<div class="row">
										<div class="col-md-12">
											<strong>Alamat Detail</strong><br/>
											<textarea class="no-radius" name="alamat_detail" style="height: 104px" ></textarea>
										</div>
									</div>

								</div>								
							</div>
						{!! Form::close() !!}

						<div style="width: 100%;; padding: 10px; margin-top: 10px">
									
							<div class="col-md-4">
								<strong>Ongkos Kirim</strong><br/>
								<span id="ongkir"></span>
								<input type="hidden" name="shipping" id="ongkir-self-place" value="0">
							</div>

							<div class="col-md-8">
								<strong>Sub Total</strong><br/>
								<span id="subtotal"></span>
							</div>

						</div>
						<button data-type='self-place' id='go-cart' style="margin: auto; margin-top: 10px; width: 98%; background-color: #f92400" type="button" class="btn" >Beli Product Ini</button>

					</div>					
				</div>

			</div>
		</div>

		<footer>
			<div class="container">
				<div class="row">
					@include('layout.footer1')		
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->

		<script type="text/javascript">
			ready(function(){
				$('#add-cart').click(function(){					
					$.ajax({
						type: "GET",
						url: '{{ URL::to("account/ajax/place/list") }}',
						dataType: 'json',
						success: function(data){
							if(data.code !== 200 )
							{
								var url = '{{ URL::to("before-login") }}?page={{Request::segment(1).'/'.Request::segment(2)}}';
								window.location = url;
							}else 
							{
								$('#myModal').modal('show');
								$("#dropdown-place").html("");
								$.each( data.data, function( key, value ) {
									var li = "<li><a class='dropdown-item with-cursor dropselect' data-id='"+value.id+"' data-district='"+value.district+"' data-long_address='"+value.long_address+"' data-regencyid='"+value.regency_id+"' data-addres='"+value.addres+"' data-phonenumberrecipient='"+value.phone_number_recipient+"' data-placename='"+value.place_name+"' data-postalcode='"+value.postal_code+"' data-province='"+value.province+"' data-recipientname='"+value.recipient_name+"' data-regency='"+value.regency+"'  >"+value.place_name+"</a><li>";
									$("#dropdown-place").append(li);

									if(key === 0)
									{
										$('#recipient-name-modal').html(value.recipient_name);
										$('#place-alias-modal').html(value.place_name);
										$('#address').html(value.addres);
										$('#district-modal').html(value.district);
										$('#regency-modal').html(value.regency);
										$('#postal-code-modal').html(value.postal_code);
										$('#province-modal').html(value.province);
										$('#telp-modal').html(value.phone_number_recipient);
										$('#regency_pickup').val(value.regency_id);
										$('#pickup_id').val(value.id);

										getShipping($('#regency_pickup').val());									
									}

								});

								$('.dropselect').click(function(){
									if(parseInt($(this).data('id')) !== parseInt($('#pickup_id').val()))
									{
										console.log($(this).data('id'));
										console.log($('#pickup_id').val());
										$('#recipient-name-modal').html($(this).data('recipientname'));
										$('#place-alias-modal').html($(this).data('placename'));
										$('#address').html($(this).data('addres'));
										$('#district-modal').html($(this).data('district'));
										$('#regency-modal').html($(this).data('regency'));
										$('#postal-code-modal').html($(this).data('postalcode'));
										$('#province-modal').html($(this).data('province'));
										$('#telp-modal').html($(this).data('phonenumberrecipient'));
										$('#regency_pickup').val($(this).data('regencyid'));
										$('#pickup_id').val($(this).data('id'));

										getShipping($('#regency_pickup').val());	
									}																		
								});
							}												
						}
					});
				});

				$("#to-self-place").click(function(){
					$(".content-self-place").show();
					$(".content-add-place").hide();
					$("#go-cart").data('type', 'self-place');
					$("#ongkir").html("");
					$("#ongkir-self-place").val(0);
					$("#subtotal").html("");
					getShipping($('#regency_pickup').val());
				});

				$("#to-add-place").click(function(){
					$(".content-self-place").hide();
					$(".content-add-place").show();
					$("#go-cart").data('type', 'new-place');
					$("#ongkir").html("");
					$("#ongkir-self-place").val(0);
					$("#subtotal").html("");
				});

				$("#go-cart").click(function(){
					var type = $(this).data('type');
					if(type === "self-place")
					{
						sendSelfPlace();
					}else {
						sendSelfNewPlace()
					}
				});

				$("#sum_product_input").change(function(){
					var quantity = parseInt($(this).val());
					var price = parseInt($("#price_product_input").val());
					var total = quantity * price;
					var result_2 = 'Rp '+total.formatMoney(0,',','.');
					$("#price_product").html(result_2);
					getShipping($('#regency_pickup').val());
				});

				function getShipping(regency)
				{
					var weigth = parseInt($("#sum_product_input").val()) * parseInt("{{ $product->weight }}");
					$.ajax({
						type: "POST",
						url: '{{ URL::to("get/shipping") }}',
						dataType: 'json',
						data :{
							"product" : '{{ $product->id }}',
							"_token": "{{ csrf_token() }}",
							"weigth": weigth,
							"regency": regency
						},
						success: function(data){
							var quantity = parseInt($("#sum_product_input").val());
							var price = parseInt($("#price_product_input").val());
							var ongkir = parseInt(data.value);
							var total = (quantity * price) + ongkir;
							var result_2 = 'Rp '+total.formatMoney(0,',','.');
							var ongkir_2 = 'Rp '+ongkir.formatMoney(0,',','.');
							
							$("#ongkir").html(ongkir_2);
							$("#ongkir-self-place").val(ongkir);
							$("#subtotal").html(result_2);
						}
					});
				}

				function sendSelfPlace()
				{
					var form = $('#self-place').serializeArray();
					var product = {
					      name: "product",
					      value: "{{ $product->id }}"
					};

					form.push(product);

					var quantity = {
					      name: "quantity",
					      value: $("#sum_product_input").val()
					};

					form.push(quantity);

					var shipping = {
					      name: "shipping",
					      value: $("#ongkir-self-place").val()
					};

					form.push(shipping);

					$.ajax({
					    type : 'POST',
					    url: '{{ URL::to("cart/store") }}',
					    data : form,
					    dataType: 'json',
					    success: function(data){
					    	window.location = '{{ URL::to("cart") }}';
					    }
					});
				}

				function sendSelfNewPlace()
				{
					var form = $('#with-new-place').serializeArray();
					var product = {
					      name: "product",
					      value: "{{ $product->id }}"
					};

					form.push(product);

					var quantity = {
					      name: "quantity",
					      value: $("#sum_product_input").val()
					};

					form.push(quantity);

					var shipping = {
					      name: "shipping",
					      value: $("#ongkir-self-place").val()
					};

					form.push(shipping);

					$.ajax({
					    type : 'POST',
					    url: '{{ URL::to("cart/store/with-new-place") }}',
					    data : form,
					    dataType: 'json',
					    success: function(data){
					    	window.location = '{{ URL::to("cart") }}';
					    }
					});
				}				

				$("#province-new").change(function(){
					$.ajax({
						type: "GET",
						url: '{{ URL::to("place/regency") }}',
						dataType: 'json',
						data :{ "province" : $(this).val() },
						success: function(data){
							$("#regency-new").html('<option value="null">** Pilih Kota/ Kabupaten</option>');
							$("#district-new").html('<option value="null">** Pilih Kecamatan</option>');

							$.each( data, function( key, value ) {
								$("#regency-new").append('<option value="'+value.id+'">'+value.name+'</option>');
							});
						}
					});
				});

				$("#regency-new").change(function(){
					$.ajax({
						type: "GET",
						url: '{{ URL::to("place/district") }}',
						dataType: 'json',
						data :{ "regency" : $(this).val() },
						success: function(data){
							$("#district-new").html('<option value="null">** Pilih Kecamatan</option>');

							$.each( data, function( key, value ) {
								$("#district-new").append('<option value="'+value.id+'">'+value.name+'</option>');
							});
						}
					});
				});

				$("#district-new").change(function(){
					getShipping($("#regency-new").val());
				});
			});
		</script>

		@include('layout.footer-copyright')
	</div>
@endsection