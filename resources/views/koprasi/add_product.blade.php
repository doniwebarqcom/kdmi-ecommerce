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

			<section class="flat-account background" style="padding-top: 10px">
				<div class="container">
					<div class="row">
						<div class="col-md-10" style="margin: auto;">
							<div class="form-register" style="height: auto !important;padding-top: 10px">
								<div class="title" style="margin-bottom: 0;">
									<h4 align="left">Apa yang Anda Jual</h4>
								</div>
								<hr/>
								{!! Form::open(['url' => 'koprasi/product/add', 'method' => 'post', 'id' => 'addProduct'], ['accept-charset' => 'utf-8']) !!}
								
								<div id='addImage'></div>
								<div id='delImage'></div>
								
								<div class="form-box">
									{{ Form::label('nama_barang', 'Nama Barang (*)', ['for' => 'nama_barang']) }}
									{{ Form::text('nama_barang', '', ['id' => 'nama_lengkap', 'placeholder' => 'Nama Barang']) }}
								</div>

								<div class="form-box">
									{{ Form::label('category', 'Category (*)', ['for' => 'nama_barang']) }}<br/>
									<!-- {{ Form::select('category', [], ['id' => 'category', 'placeholder' => 'Category', 'class' => 'select-form']) }} -->
									<select class="select-form" id="category" name="category"></select>
									<select class="select-form" id="category2" name="category2"></select>
									<select class="select-form" id="category3" name="category3"></select>
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
								</div>
								<hr/>
								
								<div class="form-box">
									{{ Form::label('harga_barang', 'Harga Barang (Rp)', ['for' => 'harga_barang']) }}
									{{ Form::text('harga_barang', '', ['id' => 'harga_barang', 'placeholder' => 'Harga Barang', 'class' => 'txtboxToFilter formatNumber']) }}
								</div>

								<div class="form-box">
									{{ Form::label('berat_barang', 'Berat Barang (Kg)', ['for' => 'berat_barang']) }}
									{{ Form::text('berat_barang', '', ['id' => 'berat_barang', 'placeholder' => 'Berat Barang' , 'class' => 'txtboxToFilter formatNumber']) }}
								</div>

								<div class="form-box">
									{{ Form::label('minumin', '', ['for' => 'Pemesanan Minimum / Buah']) }}
									{{ Form::text('minumin', 1, ['id' => 'minumin', 'placeholder' => 'Pemesanan Minimum', 'class' => 'txtboxToFilter formatNumber']) }}
								</div>

								<div class="form-box">
									{{ Form::label('status', '', ['for' => 'Status']) }}
									{{ Form::select('status', [1 => 'stok tersedia', 2 => 'stok kosong'], null, ['id' => 'status', 'class' => 'select-noinline-form', 'class' => 'select-noinline-form']) }}
								</div>

								<div class="form-box" id="stok">
									{{ Form::label('stok', '', ['for' => 'stok']) }}
									{{ Form::text('stok', 0, ['id' => 'stok', 'placeholder' => 'Stok', 'class' => 'txtboxToFilter formatNumber']) }}
								</div>

								<div class="form-box">
									{{ Form::label('konsisi', '', ['for' => 'Kondisi']) }}<br/>
									{{ Form::radio('cond', '1', 'true') }} Baru
									{{ Form::radio('cond', '2') }} Bekas
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
									<h4 align="lexft">Detil Produk</h4>
								</div>

								<div class="form-box">
									{{ Form::label('deskripsi', 'Deskripsi Produk', ['for' => 'deskripsi']) }}
									{{ Form::textarea('deskripsi', "", ['id' => 'deskripsi']) }}
								</div>								

								<div class="form-box">
									<button type="submit" class="register">Simpan</button>									
								</div><!-- /.form-box -->

								{!! Form::close() !!}
							</div><!-- /.form-register -->
						</div><!-- /.col-md-6 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /.flat-account -->		

		<footer>
			<div class="container">
				<div class="row">
					@include('layout.footer1')		
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->

		@include('layout.footer-copyright')
	</div>
	
	<script type="text/javascript">
		var category ;	
		ready(function(){

			$("#addProduct").validate({
				rules: {
					nama_barang: "required",
					category: "required",
					deskripsi: "required"
				},
				messages: {
					nama_barang: "kolom harus diisi",
					category: "kolom harus dipilih",
					deskripsi: "kolom harus diisi"
				}
			});

		    $.ajax({
				type: "GET",
				url: "{{ url('category/ajax') }}",
				dataType: 'json',
				success: function(data){
					category = data;
					$("#category").html("<option value=''>-silahkan pilih-</option>");
					$.each( data.parent_0, function( key, value ) {
						var option = "<option value='"+value.id+"'>"+value.name+"</option>";
						$("#category").append(option);
					});

					$("#category3").hide();
				}
			});			

			$("#category").change(function(){
				var id = $(this).val();
				$("#category3").hide();
				category.anObjectName = 'parent_'+id;
				if (category[category.anObjectName] !== undefined) {
					$("#category2").html("<option value=''>-silahkan pilih-</option>");					
					$.each( category[category.anObjectName], function( key, value ) {
						var option = "<option value='"+value.id+"'>"+value.name+"</option>";
						$("#category2").append(option);
					});

					$("#category2").show();
				}else {
					$("#category2").hide();
				}
			});

			$("#category2").change(function(){
				var id = $(this).val();
				category.anObjectName = 'parent_'+id;
				if (category[category.anObjectName] !== undefined) {
					$("#category3").html("<option value=''>-silahkan pilih-</option>");
					$.each( category[category.anObjectName], function( key, value ) {
						var option = "<option value='"+value.id+"'>"+value.name+"</option>";
						$("#category3").append(option);
					});

					$("#category3").show();
				}else {
					$("#category3").hide();
				}
			});

			$("#fileuploader").uploadFile({
				url: "{{ url('image/mandiri') }}",
				returnType:"json",
				formData: {_token: '{{csrf_token()}}' },
				showPreview:true,
				showProgress:true,
				showFileSize:false,
				showDelete:true,
				maxFileCount:5,
				previewHeight: "100px",
				previewWidth: "100px",
				fileName:"image",
				customProgressBar: function(obj, s)
		        {
		        	$("#addImage").html("");
		        	console.log(obj.responses);
		        	$.each( obj.responses, function( key, value ) {		        		
						$("#addImage").append("<input type='hidden' name='upload[]' value='"+value+"'>");
					});

		            this.statusbar = $("<div style='float: left;' class='ajax-file-upload-statusbar'></div>");
		            this.preview = $("<img class='ajax-file-upload-preview' />").width(s.previewWidth).height(s.previewHeight).appendTo(this.statusbar).hide();
		            this.filename = $("<div class='ajax-file-upload-filename'></div>").appendTo(this.statusbar);
		            this.progressDiv = $("<div class='ajax-file-upload-progress'>").appendTo(this.statusbar).hide();
		            this.progressbar = $("<div class='ajax-file-upload-bar'></div>").appendTo(this.progressDiv);
		            this.abort = $("<div>" + s.abortStr + "</div>").appendTo(this.statusbar).hide();
		            this.cancel = $("<div>" + s.cancelStr + "</div>").appendTo(this.statusbar).hide();
		            this.done = $("<div>" + s.doneStr + "</div>").appendTo(this.statusbar).hide();
		            this.download = $("<div>" + s.downloadStr + "</div>").appendTo(this.statusbar).hide();
		            this.del = $("<div>" + s.deleteStr + "</div>").appendTo(this.statusbar).hide();
		            this.abort.addClass("ajax-file-upload-red");
		            this.done.addClass("ajax-file-upload-green");
		            this.download.addClass("ajax-file-upload-green");            
		            this.cancel.addClass("ajax-file-upload-red");
		            this.del.addClass("ajax-file-upload-red");
		            
		            return this;
		        },
				onSuccess:function(files, data, xhr, pd)
				{
					$("#addImage").append("<input type='hidden' name='upload[]' value='"+data+"'>");
					$(".ajax-file-upload-filename").remove();
				},
				deleteCallback: function(data)
				{        				    
					$("#delImage").append("<input type='hidden' name='abort[]' value='"+data+"'>");
				}
			});

			$("#status").change(function() {
				var status = $(this).val();

				if(status == 1)
				{
					$("#stok").fadeIn( 600);
				}else
					{
						$("#stok").fadeOut( 600);
					}
			});

			$(".txtboxToFilter").keydown(function (e) {

				var variable = $(this).val();
				var res = variable.replace(/,/g, "");				
				$(this).val(res);
		        // Allow: backspace, delete, tab, escape, enter and .
		        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		             // Allow: Ctrl/cmd+A
		            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
		             // Allow: Ctrl/cmd+C
		            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
		             // Allow: Ctrl/cmd+X
		            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
		             // Allow: home, end, left, right
		            (e.keyCode >= 35 && e.keyCode <= 39)) {
		                 // let it happen, don't do anything
		                 return;
		        }
		        // Ensure that it is a number and stop the keypress
		        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		            e.preventDefault();
		        }

		    });		    

		    $(".formatNumber").change(function(e){
		    	var harga_barang = parseInt($(this).val());
				$(this).val(format1(harga_barang, ","));
		    });

		    function format1(n, split) {
			    return n.toFixed(0).replace(/./g, function(c, i, a) {
			        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? split + c : c;
			    });
			}

			$("#test").click(function(){
				console.log( $("#addProduct" ).serializeArray() );
			});		

		});
	</script>

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

	</style>	
@endsection