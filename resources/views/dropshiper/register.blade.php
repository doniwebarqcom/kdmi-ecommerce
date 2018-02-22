@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')
<style type="text/css">

.select2-container--default .select2-selection--single{
    border-radius: 30px; 
    position: relative;
    border: 2px solid #e5e5e5;
    height: 40px;
    width: 415px;
    padding: 2px 25px;
    margin-right: 15px;
    font-family: 'Open Sans';
}

.select2-selection__arrow{
	display: none;
}

</style>

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

		<section class="flat-account background">
			<div class="container">
				<div class="row">
					<div class="col-md-6" style="margin: auto;">
						<div class="form-register" style="height: auto !important;">
							<div class="title" style="margin-bottom: 0;">
								<h3>Jadi Mitra Kodami</h3>
							</div>							

							{!! Form::open(['url' => 'dropshiper/register', 'method' => 'post', 'id' => 'regisDropshiper'], ['accept-charset' => 'utf-8']) !!}

								@if(session('message_error'))
									<div id='message_error' class="form-box">
										<p style="color: red">{{ session('message_error') }}</p>
									</div>
								@endIf
								
								<div class="form-box">
									{{ Form::label('physical_store', 'Apakah anda memiliki toko fisik ?', ['for' => 'physical_store']) }}
									<select class="select-form" id="physical_store" name="physical_store">
										<option value="">Pilihan</option>
										<option value="1">Ya</option>
										<option value="0">Tidak</option>
									</select>
								</div>

								<div class="form-box">
									{{ Form::label('ocupation', 'Apakah Pekerjaan anda ?', ['for' => 'ocupation']) }}<br/>
									<select class="select-form" id="ocupation" name="ocupation">
										<option value="">Pilih Jenis Pekerjaan</option>
										@if(isset($ocupation) AND count($ocupation) > 0)
											@foreach($ocupation as $key => $value)
												<option value="{{ $value->name }}">{{ $value->name }}</option>
											@endForeach
										@endIf
									</select>
								</div>

								<div class="form-box">
									{{ Form::label('selling_env', 'DImanakah anda berjualan', ['for' => 'selling_env']) }}<br/>
									<select class="select-form" id="selling_env" name="selling_env">
										<option value="">Pilihan</option>
										@if(isset($sellingEnv) AND count($sellingEnv) > 0)
											@foreach($sellingEnv as $key => $value)
												<option value="{{ $value }}">{{ $value }}</option>
											@endForeach
										@endIf
									</select>
								</div>

								<div class="form-box">
									{{ Form::label('place_selling', 'Alamat Tempat Berjualan', ['for' => 'place_selling']) }}
									{{ Form::textarea('place_selling', null) }}
								</div>

								<div class="form-box">
									{{ Form::label('province', 'Provinsi', ['for' => 'province']) }}<br/>
									<select class="select-form" id="province" name="province">
										<option value="">Pilihan</option>
										@if(isset($province) AND count($province) > 0)
											@foreach($province as $key => $value)
												<option value="{{ $value->id }}">{{ $value->name }}</option>
											@endForeach
										@endIf
									</select>
								</div>

								<div class="form-box">
									{{ Form::label('regency', 'Kota', ['for' => 'regency']) }}<br/>
									<select class="select-form" id="regency" name="regency">
										<option value="">Pilihan</option>										
									</select>
								</div>

								<div class="form-box">
									{{ Form::label('district', 'Kecamatan', ['for' => 'district']) }}<br/>
									<select class="select-form" id="district" name="district">
										<option value="">Pilihan</option>										
									</select>
								</div>

								<div class="form-box">
									{{ Form::label('village', 'Kecamatan', ['for' => 'village']) }}<br/>
									<select class="select-form" id="village" name="village">
										<option value="">Pilihan</option>										
									</select>
								</div>

								<div class="form-box">
									{{ Form::label('postal_code', 'Kode Pos', ['for' => 'postal_code']) }}
									{{ Form::text('postal_code', '', ['id' => 'postal_code', 'placeholder' => 'Kode Pos', 'style' => 'width: 415px']) }}
								</div>

								<div class="form-box">
									{{ Form::label('fileuploader', 'Upload Ktp', ['for' => 'fileuploader']) }}
									<div id="fileuploader">Upload</div>							
									<div style="clear:both"></div>
								</div>
								<div id='Image'></div>

								<div class="form-box">
									<button type="submit" id="register" class="register">Register</button>
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
	<style type="text/css">
		.select-form {
			border: 2px solid #e5e5e5;
			height: 40px;
			width: 415px;
			padding: 2px 25px;
			margin-right: 15px;
		}
	</style>
	<script type="text/javascript">		
		ready(function(){
			$('#ocupation').select2();
			$('#selling_env').select2();
			$('#province').select2();
			$('#regency').select2();
			$('#district').select2();
			$('#village').select2();		

			$('#province').change(function(){
				var province = $(this).val();
				$('#regency').html('<option value="">Pilihan</option>');
				$('#district').html('<option value="">Pilihan</option>');
				$('#village').html('<option value="">Pilihan</option>');
				 $.ajax({
					type 	 : "GET",
					url 	 : "{{ url('place/regency') }}",
					data 	 : {province : province},
					dataType : 'json',
					success: function(data){
						$.each( data, function( key, value ) {
							$('#regency').append('<option value="'+value.id+'">'+value.name+'</option>');
						});
					}
				});
			});

			$('#regency').change(function(){
				var regency = $(this).val();
				$('#district').html('<option value="">Pilihan</option>');
				$('#village').html('<option value="">Pilihan</option>');
			 	$.ajax({
					type 	 : "GET",
					url 	 : "{{ url('place/district') }}",
					data 	 : {regency : regency},
					dataType : 'json',
					success: function(data){
						$.each( data, function( key, value ) {
							$('#district').append('<option value="'+value.id+'">'+value.name+'</option>');
						});
					}
				});
			});

			$('#district').change(function(){
				var district = $(this).val();
				$('#village').html('<option value="">Pilihan</option>');
				 $.ajax({
					type 	 : "GET",
					url 	 : "{{ url('place/village') }}",
					data 	 : {district : district},
					dataType : 'json',
					success: function(data){
						$.each( data, function( key, value ) {
							$('#village').append('<option value="'+value.id+'">'+value.name+'</option>');
						});
					}
				});
			});

			$("#fileuploader").uploadFile({
				url: "{{ url('image/mandiri') }}",
				returnType:"json",
				formData: {_token: $("input[name=_token]").val() },
				showPreview:true,
				showProgress:true,
				showFileSize:false,
				showDelete:true,
				maxFileCount:1,
				fileName:"image",
				customProgressBar: function(obj, s)
		        {
		        	$("#Image").html("");
		        	$.each( obj.responses, function( key, value ) {		        		
						$("#Image").append("<input type='hidden' name='upload' value='"+value+"'>");
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
					$("#Image").append("<input type='hidden' name='upload' value='"+data+"'>");
				}
			});

		});
	</script>
@endsection