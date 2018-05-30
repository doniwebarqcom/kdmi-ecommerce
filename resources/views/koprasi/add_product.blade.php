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
		
        <section id="header" class="header">
		    @include('layout.header-top')
		    @include('layout.header-middle')
		    @include('layout.header-bottom')
		</section><!-- /#header -->

		@include('layout.breadcrumb')

		<!-- Preloader -->
        <div class="preloader" style="display: none;">
            <div class="clear-loading loading-effect-2">
                <span></span>
            </div>
        </div><!-- /.preloader -->
				

			<section class="flat-account background" style="padding-top: 10px">
				<div class="container">
					<div class="row">
						<div class="col-md-10" style="margin: auto;">
							<h3 align="left">Tambah Produk</h3>
						</div><!-- /.col-md-6 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /.flat-account -->

				
			{!! Form::open(['url' => 'koprasi/product/add', 'method' => 'post', 'id' => 'addProduct'], ['accept-charset' => 'utf-8']) !!}
				<section class="flat-account background" style="padding-top: 10px">
					<div class="container">
						<div class="row">
							<div class="col-md-10" style="margin: auto;">
								<div class="form-register" style="height: auto !important;padding-top: 10px">
									<div class="title" style="margin-bottom: 0;">
										<h4 align="left">Apa yang Anda Jual</h4>
										
										@if(session('message_error'))	
											<div  id="message_error" style="border: 1px; background-color: #f5f5f5;padding-bottom: 20px;">
												<p style="color: red">{{ session('message_error') }}</p>
											</div>
										@endIf
									</div>
									<hr/>
									
									{{ Form::hidden('status_grosir', 0, array('id' => 'status_grosir')) }}
									{{ Form::hidden('cond', 1, array('id' => 'cond')) }}
																
									<div id='addImage'></div>
									<div id='delImage'></div>															
									<div class="form-box">
										{{ Form::label('nama_barang', 'Nama Barang (*)', ['for' => 'nama_barang']) }}
										{{ Form::text('nama_barang', '', ['id' => 'nama_lengkap', 'placeholder' => 'Nama Barang', 'class' => 'text_input']) }}
									</div>

									<div class="form-box">
										{{ Form::label('category', 'Category (*)', ['for' => 'category']) }}<br/>
										<select class="select-form" id="category" name="category"></select>
										<select class="select-form" id="category2" name="category2"></select>
										<select class="select-form" id="category3" name="category3"></select>
									</div><br/>

									<div class="form-box" style="margin-top: 20px">
										{{ Form::label('suggest_category', 'Suggest Product (*)', ['for' => 'suggest_product']) }}<br/>
										<select class="select-form" style="width: 300px" id="suggest_product" name="suggest_product"><option value="0">-- Silahkan Pilih --</option></select>
									</div>
																	
								</div><!-- /.form-register -->
							</div><!-- /.col-md-6 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</section><!-- /.flat-account -->

				<section class="flat-account background" style="padding-top: 10px">
					<div class="container">
						<div class="row">
							<div class="col-md-10" style="margin: auto;">
								<div class="form-register" style="height: auto !important;padding-top: 10px">
									<div class="title" style="margin-bottom: 0;">
										<h4 align="lexft">Upload Gambar</h4>
									</div>
									<hr/>

									<div id="fileuploader">Upload</div>								
									<div style="clear:both"></div>
																	
								</div><!-- /.form-register -->
							</div><!-- /.col-md-6 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</section><!-- /.flat-account -->

				<section class="flat-account background" style="padding-top: 10px">
					<div class="container">
						<div class="row">
							<div class="col-md-10" style="margin: auto;">
								<div class="form-register" style="height: auto !important;padding-top: 10px">
									<div class="title" style="margin-bottom: 0;">
										<h4 align="lexft">Detil Produk</h4>
										<h5 align="lexft">Untuk Costumer</h5>
									</div>
									<hr/>
									
									<div class="form-box">
										{{ Form::label('harga_barang', 'Harga Barang (Rp)', ['for' => 'harga_barang']) }}
										{{ Form::text('harga_barang', '', ['id' => 'harga_barang', 'placeholder' => 'Harga Barang', 'class' => 'currency text_input']) }}									
									</div>
																							
									<div class="row">
										<div class="col-md-3">
											{{ Form::label('discont', 'Discont Costumer (%)', ['for' => 'discont']) }}
											{{ Form::text('discont', 0, ['id' => 'discont', 'placeholder' => 'Discont Barang', 'class' => 'currency3 percent']) }}
										</div>
										<div class="col-md-3">
											{{ Form::label('discont_koprasi', 'Discont Anggota Koprasi (%)', ['for' => 'discont_koprasi']) }}

											{{ Form::text('discont_koprasi', 0, ['id' => 'discont_koprasi', 'placeholder' => 'Discont Angota Koprasi', 'class' => 'currency3 percent']) }}
										</div>
									</div>

									<br/>
									<div> 
										<strong><a style="margin-left: 20px;" id="grosir" > + Tambah Harga Grosir</a></strong>
									</div>

									<div id="harga-grosir" style="display: none;">
										<div class="row" style="margin-bottom: 10px">
											<div class="col-sm-1"><b>No</b></div>
											<div class="col-sm-2"><b>Dari (jumlah)</b></div>
											<div class="col-sm-2"><b>Ke (jumlah)</b></div>
											<div class="col-sm-2"><b>Harga</b></div>
											<div class="col-sm-2"><b>Harga Anggota</b></div>
											<div class="col-sm-3"></div>
										</div>

										<div class="row" style="margin-top: 2px">
											<div class="col-sm-1">1</div>
											<div class="col-sm-2">
												<input class="currency2 input_grosir" id="jumlah-ke-1" data-type="gro" data-id="1" type="text" name="jumlah_ke[]">
											</div>
											<div class="col-sm-2">
												<input class="currency2 input_grosir" id="jumlah-sampai-1" data-type="gro" data-id="1" type="text" name="jumlah_sampai[]">
											</div>
											<div class="col-sm-2">
												<input class="currency input_grosir" id="harga-grosir-1" data-type="price" data-id="1" type="text" name="harga_grosir[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency input_grosir" id="harga-grosir-angota-1" data-type="price" data-id="1" type="text" name="harga_grosir_angota[]">
											</div>
											<div class="col-sm-3">
												<strong>
													<a data-id="1" class="delete-form-fill" style="color: red;cursor:pointer;display: none" id="delete-form-fill-1" >	Hapus
													</a>
												</strong>
												<strong>
													<span id="error-grosir-1"></span>
												</strong>
											</div>
										</div>

										<div class="row" style="margin-top: 2px">
											<div class="col-sm-1">2</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency2 input_grosir" id="jumlah-ke-2" data-type="gro" data-id="1" type="text" name="jumlah_ke[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency2 input_grosir" id="jumlah-sampai-2" data-type="gro" data-id="2" type="text" name="jumlah_sampai[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency input_grosir" id="harga-grosir-2" data-type="price" data-id="2" type="text" name="harga_grosir[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency input_grosir" id="harga-grosir-angota-2" data-type="price" data-id="2" type="text" name="harga_grosir_angota[]">
											</div>
											<div class="col-sm-3">
												<strong>
													<a data-id="2" class="delete-form-fill" style="color: red;cursor:pointer;display: none" id="delete-form-fill-2" >	Hapus
													</a>
												</strong>
												<strong>
													<span id="error-grosir-2"></span>
												</strong>
											</div>
										</div>

										<div class="row" style="margin-top: 2px">
											<div class="col-sm-1">3</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency2 input_grosir" id="jumlah-ke-3" data-type="gro" data-id="3" type="text" name="jumlah_ke[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency2 input_grosir" id="jumlah-sampai-3" data-type="gro" data-id="3" type="text" name="jumlah_sampai[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency input_grosir" id="harga-grosir-3" data-type="price" data-id="3" type="text" name="harga_grosir[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency input_grosir" id="harga-grosir-angota-3" data-type="price" data-id="3" type="text" name="harga_grosir_angota[]">
											</div>
											<div class="col-sm-3">
												<strong>
													<a data-id="3" class="delete-form-fill" style="color: red;cursor:pointer;display: none" id="delete-form-fill-3" >	Hapus
													</a>
												</strong>
												<strong>
													<span id="error-grosir-3"></span>
												</strong>
											</div>
										</div>

										<div class="row" style="margin-top: 2px">
											<div class="col-sm-1">4</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency2 input_grosir" id="jumlah-ke-4" data-type="gro" data-id="4" type="text" name="jumlah_ke[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency2 input_grosir" id="jumlah-sampai-4" data-type="gro" data-id="4" type="text" name="jumlah_sampai[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency input_grosir" id="harga-grosir-4" data-type="price" data-id="4" type="text" name="harga_grosir[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency input_grosir" id="harga-grosir-angota-4" data-type="price" data-id="4" type="text" name="harga_grosir_angota[]">
											</div>
											<div class="col-sm-3">
												<strong>
													<a data-id="4" class="delete-form-fill" style="color: red;cursor:pointer;display: none" id="delete-form-fill-4" >	Hapus
													</a>
												</strong>
												<strong>
													<span id="error-grosir-4"></span>
												</strong>
											</div>
										</div>

										<div class="row" style="margin-top: 2px;">
											<div class="col-sm-1">5</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency2 input_grosir" id="jumlah-ke-5" data-type="gro" data-id="5" type="text" name="jumlah_ke[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency2 input_grosir" id="jumlah-sampai-5" data-type="gro" data-id="5" type="text" name="jumlah_sampai[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency input_grosir" id="harga-grosir-5" data-type="price" data-id="5" type="text" name="harga_grosir[]">
											</div>
											<div class="col-sm-2">
												<input readonly="readonly" class="currency input_grosir" id="harga-grosir-angota-5" data-type="price" data-id="5" type="text" name="harga_grosir_angota[]">
											</div>
											<div  class="col-sm-3">
												<strong>
													<a data-id="5" class="delete-form-fill" style="color: red;cursor:pointer;display: none" id="delete-form-fill-5" >	Hapus
													</a>
												</strong>
												<strong>
													<span id="error-grosir-5"></span>
												</strong>
											</div>
										</div>
									</div>
									<br/>
									<div class="row">
										<div class="col-md-3">
											{{ Form::label('berat_barang', 'Berat Barang (Kg)', ['for' => 'berat_barang']) }}
											{{ Form::text('berat_barang', 1, ['id' => 'berat_barang', 'placeholder' => 'Berat Barang' , 'class' => 'currency']) }}
										</div>
										<div class="col-md-3">
											{{ Form::label('minimum', 'Pemesanan Minimum / Buah', ['for' => 'minimum']) }}
											{{ Form::text('minimum', 1, ['id' => 'minimum', 'placeholder' => 'Pemesanan Minimum', 'class' => 'currency']) }}
										</div>
									</div><br/>

									<div class="row">
										<div class="col-md-3">
											{{ Form::label('status', '', ['for' => 'Status']) }}
											{{ Form::select('status', [1 => 'stok tersedia', 2 => 'stok kosong'], null, ['id' => 'status', 'class' => 'select-noinline-form ']) }}
										</div>
										<div class="col-md-3">
											{{ Form::label('stok', '', ['for' => 'stok']) }}
											{{ Form::text('stok', 0, ['id' => 'stok', 'placeholder' => 'Stok', 'class' => 'currency', 'style' => 'height : 40px']) }}
										</div>
									</div>																
									
								</div><!-- /.form-register -->
							</div><!-- /.col-md-6 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</section><!-- /.flat-account -->			

				<section class="flat-account background" style="padding-top: 10px">
					<div class="container">
						<div class="row">
							<div class="col-md-10" style="margin: auto;">
								<div class="form-register" style="height: auto !important;padding-top: 10px">
									<div class="title" style="margin-bottom: 0;">
										<h4 align="lexft">Spesification Product</h4>
									</div>
									<hr/>							

									<table id="table-spesification">
									</table>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="flat-account background" style="padding-top: 10px">
					<div class="container">
						<div class="row">
							<div class="col-md-10" style="margin: auto;">
								<div class="form-register" style="height: auto !important;padding-top: 10px">
									<div class="title" style="margin-bottom: 0;">
										<h4 align="lexft">Kriteria Product</h4>
									</div>
									<hr/>							

									<table id="table-criteria">
									</table>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="flat-account background" style="padding-top: 10px">
					<div class="container">
						<div class="row">
							<div class="col-md-10" style="margin: auto;">
								<div class="form-register" style="height: auto !important;padding-top: 10px">
									<div class="title" style="margin-bottom: 0;">
										<h4 align="lexft">Detil Produk</h4>
									</div>

									<div class="form-box">
										{{ Form::label('deskripsi', 'Short deskripsi Produk', ['for' => 'deskripsi']) }}
										{{ Form::textarea('deskripsi', "", ['id' => 'deskripsi', 'style' => 'height: 100px;width : 500px']) }}
									</div>

									<div class="form-box">
										{{ Form::label('long_deskripsi', 'Long deskripsi Produk', ['for' => 'long_deskripsi']) }}
										{{ Form::textarea('long_deskripsi', "", ['id' => 'long_deskripsi']) }}
									</div>						

									<div class="form-box">
										<button type="submit" class="register">Simpan</button>									
									</div><!-- /.form-box -->

									
								</div><!-- /.form-register -->
							</div><!-- /.col-md-6 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
				</section><!-- /.flat-account -->		

			{!! Form::close() !!}

		<footer>
			<div class="container">
				<div class="row">
					@include('layout.footer1')		
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->

		@include('layout.footer-copyright')
	</div>	

	<style type="text/css">
		.select-form {
			border: 2px solid #e5e5e5;
			height: 40px;
			width: 215px;
			padding: 2px 25px;
			float: left;
			margin-right: 15px;
		}

		.select-noinline-form {
			border: 2px solid #e5e5e5;
			height: 40px;
			padding: 2px 25px;			
			margin-right: 15px;
		}

		
		#category2{
			display: none;
		}

		#grosir:hover { 
		    color:#f28b00;
		    cursor:pointer;
		}
		
		#category3{
			display: none;
		}

		.ajax-file-upload-progress{
			width: 120px !important;
		}
				
		.ajax-file-upload-statusbar{
			width: 150px !important;
		}

		.ajax-file-upload-filename {
		    display: none;
		}

		input[readonly]
		{
		    background-color:#cccccc;
		}

		.text_input{
			width: 40% !important;
		}

		.delete_form{
			color: red;
			margin-left: 10px;
		}

		.input_grosir{
			height: 30px !important;
    		border-radius: 13px !important;
    		padding: 8px 15px 8px 7px !important;
		}

	</style>		
       {!! Html::script('javascript/koprasi/content.js?v=6') !!}
@endsection