@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')
<style type="text/css">

.select2-container--default .select2-selection--single{
    border-radius: 30px; 
    position: relative;
    border: 2px solid #e5e5e5;
    height: 40px;
    width: 441px;
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
								<h3>Buka Koprasi Sendiri</h3>
							</div>							

							{!! Form::open(['url' => 'koprasi/register', 'method' => 'post', 'id' => 'regisKoprasi'], ['accept-charset' => 'utf-8']) !!}

								@if(session('message_error'))
									<div id='message_error' class="form-box">
										<p style="color: red">{{ session('message_error') }}</p>
									</div>
								@endIf

								<div class="form-box">
									{{ Form::label('nama_lengkap', 'Nama Koprasi (*)', ['for' => 'nama_koprasi']) }}
									{{ Form::text('nama_lengkap', '', ['id' => 'nama_lengkap', 'placeholder' => 'Nama Lengkap']) }}
								</div>

								<div class="form-box">
									{{ Form::label('alamat_pickup', 'Alamat Pickup (*)', ['for' => 'alamat_pickup']) }}
									{{ Form::textarea('alamat_pickup', '', ['id' => 'alamat_pickup', 'placeholder' => 'Alamat Pickup']) }}
								</div>

								<div class="form-box">
									{{ Form::label('regency', 'Kota / Kabupaten (*)', ['for' => 'regency']) }}
									{{ Form::select('regency', [], ['id' => 'regency', 'placeholder' => 'Regency']) }}
								</div>

								<div class="form-box">
									{{ Form::label('kode_pos', 'Kode Pos (*)', ['for' => 'kode_pos']) }}
									{{ Form::text('kode_pos', '', ['id' => 'kode_pos', 'placeholder' => 'Kode Pos']) }}
								</div>

								<div class="form-box">
									{{ Form::label('fileuploader', 'Upload Gambar Toko', ['for' => 'fileuploader']) }}
									<div id="fileuploader">Upload</div>							
									<div style="clear:both"></div>
								</div>

								<div id='Image'></div>

								<div class="form-box">
									{{ Form::label('description', 'Deskripsi Toko', ['for' => 'description']) }}
									{{ Form::textarea('description', '', ['id' => 'description', 'placeholder' => 'Deskription']) }}
								</div>

								<div class="form-box">
									<button type="submit" class="register">Register</button>
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
		ready(function(){
		    
		    $("#regisKoprasi").validate({
				rules: {
					nama_lengkap: "required",
					kode_pos: "required",
					alamat_pickup: "required",
					regency: "required"
				},
				messages: {
					firstname: "kolom harus diisi",
					kode_pos: "kolom harus diisi",
					alamat_pickup: "kolom harus diisi",
					regency: "kolom harus diisi"
				}
			});

		    $('#regency').select2({
		    	placeholder: "Cari Kota / Kabupaten",
			    minimumInputLength: 2,
			    tags: [],
			    ajax: {
			        url: "{{ url('place/regency') }}",
			        dataType: 'json',
			        type: "GET",
			        quietMillis: 100,
			        processResults: function (data) {
						return {
				            results: $.map(data, function (item) {
				                return {
				                    text: item.name,
				                    id: item.id
				                }
				            })
				        };
				    }
			    }
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
						$("#Image").append("<input type='hidden' name='image' value='"+value+"'>");
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
					$("#Image").append("<input type='hidden' name='image' value='"+data+"'>");
				}
			});

		    var fade_out = function() {
			  $("#message_error").fadeOut().empty();
			}

			setTimeout(fade_out, 5000);
		});
	</script>
@endsection