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

		<section class="flat-account background">
			<div class="container">
				<div class="row">
					<div class="col-md-8" style="margin: auto;">
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
									{{ Form::select('kode_pos', [], ['id' => 'kode_pos']) }}
								</div>

								<div class="form-box">
									{{ Form::label('gambar', 'Gambar Koprasi (*)', ['for' => 'gambar']) }}
									{{ Form::file('gambar', ['id' => 'gambar']) }}
								</div>

								<div class="form-box" id="box_image" style="display: none">
									
									
								</div>									
								{{ Form::hidden('image', '', ['id' => 'image']) }}
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

		    $('#kode_pos').select2({
		    	placeholder: "Cari Kode pos",
			    minimumInputLength: 2,
			    tags: [],
			    ajax: {
			        url: "{{ url('place/pos') }}",
			        dataType: 'json',
			        type: "GET",
			        quietMillis: 100,
			        processResults: function (data) {
						return {
				            results: $.map(data, function (item) {
				                return {
				                    text: item.kodepos+" ( "+item.kecamatan+", "+item.kelurahan+", "+item.kabupaten+", "+item.provinsi+ " )",
				                    id: item.kodepos
				                }
				            })
				        };
				    }
			    }
			});
		
		    $('#gambar').change(function(){
		    	$(".preloader").show();
		    	var data = new FormData($("#regisKoprasi")[0]);
			    $.ajax({
					type: "POST",
					url: "{{ url('image/upload') }}",
					processData: false,
					contentType: false,
					data: data,   
					dataType: "json",
					success: function(data){
						$(".preloader").hide();
						var temp = '<img src="'+data['data'].secure_url+'" width="400px">';
						$("#box_image").html(temp);
						$("#image").val(data['data'].secure_url);
						$("#box_image").show();
					}
				});
		    });

		    var fade_out = function() {
			  $("#message_error").fadeOut().empty();
			}

			setTimeout(fade_out, 5000);
		});
	</script>
@endsection