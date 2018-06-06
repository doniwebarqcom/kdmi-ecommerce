@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')	
<style type="text/css">
	#mydiv {
	  position: relative;
	}
	.ajax-loader {
	  position: absolute;
	  left: 0;
	  top: -170px;
	  right: 0;
	  bottom: 0;
	  margin: auto; /* presto! */
	}
</style>
	<div class="boxed">
        <section id="header" class="header">
		    @include('layout.header-top')
		</section>

		@include('layout.breadcrumb')		
		<section>

			@include('user.sidebar')

			<div class="row" style="color: black">
				<div class="col-md-10 ruler-sidebar">
					<div  style="height: auto !important;padding: 20px !important;">
						
						<div class="title" style="margin-bottom: 20px;">
							<h2 align="left"><i class="glyphicon glyphicon glyphicon-user"></i> {{ $user_data['name'] }}</h2>
						</div>

						<ul class="nav nav-tabs" style="margin-bottom: 30px;">
						  	<li class="active"><a href="#">Biodata</a></li>
						  	<li><a href="{{ URL::to('profile/place/list') }}">Daftar Alamat</a></li>							  	
						</ul>

						<div class="row">
							{!! Form::open(['url' => '#', 'method' => 'post', 'id' => 'edit-account'], ['accept-charset' => 'utf-8']) !!}
							<div class="col-sm-4" style="border:1px solid rgba(0,0,0,.15); ">
								<img width="344px" height="201px"  src="
								@if(strlen($user_data['image']) > 0)
								 	{{ $user_data['image'] }}
								@else
									{{ asset('images/Default-avatar.jpg') }}
								@endIf"  style="margin-left: auto; margin-right: auto; margin-top: 10px">
								<br/><br/>
								<div id="mydiv" style="display: none">
										<img src="{{ asset('images/35.gif') }}" class="ajax-loader">
								</div>
								<input type="file" name="photo" id="file-1" class="inputfile inputfile-1" />
								<label for="file-1"><svg class='svg-photo-profile' width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Pilih Foto</span></label>

							</div>

							<div class="col-sm-8">
								<h5 align="left"><strong>Ubah Biodata Diri</strong></h5><br/>
								
								<div class="row fs-10">
									<div class="col-sm-2">
										Nama
									</div>
									<div class="col-sm-10">
										<div class="form-box">
											{{ Form::text('name', $user_data['name'], ['id' => 'name', 'placeholder' => 'Nama', 'style' => 'height: 33px']) }}
										</div>
									</div>	
								</div>

								<div class="row mt-10 fs-10">
									<div class="col-sm-2">
										Tanggal Lahir
									</div>
									<div class="col-sm-3">
										<div class="form-box">
											<?php 
												if(isset($date[2]))
													$date2 = $date[2];
												else
													$date2 = 0;
											?>
											{{ Form::select('day', $date_day, $date2,['id' => 'day', 'style' => 'height: 33px; padding-top : 3px']) }}
										</div>
									</div>
									<div class="col-sm-4">
										<div class="form-box">
											<?php 
												if(isset($date[1]))
													$date1 = $date[1];
												else
													$date1 = 0;
											?>
											{{ Form::select('month', $date_month, $date1,['id' => 'month', 'style' => 'height: 33px; padding-top : 3px']) }}
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-box">
											<?php 
												if(isset($date[0]))
													$date0 = $date[0];
												else
													$date0 = 0;
											?>
											{{ Form::select('year', $date_year, $date0,['id' => 'year', 'style' => 'height: 33px; padding-top : 3px']) }}
										</div>
									</div>
								</div>

								<div class="row mt-10 fs-10">
									<div class="col-sm-2">
										Jenis Kelamin
									</div>
									<div class="col-sm-10">
										<div class="form-box">												
											{{ Form::radio('gender', 1, $gM, ['class' => 'field']) }} Pria <span style="margin-left: 30px"></span>
											{{ Form::radio('gender', 2, $gF, ['class' => 'field']) }} Wanita
										</div>
									</div>	
								</div>
								
								<h5 class="mt-10" align="left"><strong>Ubah Kontak</strong></h5>

								<div class="row mt-10 fs-10">
									<div class="col-sm-2">
										Email
									</div>
									<div class="col-sm-10">
										<div class="form-box">
											{{ $user_data['email'] }}
										</div>
									</div>	
								</div>

								<div class="row mt-10 fs-10">
									<div class="col-sm-2">
										Nomor HP
									</div>
									<div class="col-sm-10">
										<div class="form-box">
											{{ $user_data['phone'] }}
										</div>
									</div>	
								</div>

								<div class="row mt-10 fs-10">										
									<div class="col-sm-4">
									</div>
									<div class="col-sm-8">
										<div class="form-box">
											<button type="button" id="saveProfile" class="btn btn-primary" style="width: 235px;height: 35px;background-color: #9d1818;border-radius: 25px;">Simpan</button>
										</div>
									</div>	
								</div>
								{!! Form::close() !!}
							</div>							
						</div>
					</div>
				</div>
			</div>
		</section>

		<footer>
			<div class="container">
				<div class="row">
					@include('layout.footer1')		
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->

		<script type="text/javascript">
			ready(function(){
				$('.disabled').click(function(e){
				     e.preventDefault();
				 })

				$( '#file-1' ).change( function () {
					var data = new FormData($("#edit-account")[0]);
					$("#mydiv").show();
				    $.ajax({
						type: "POST",
						url: "{{ url('account/edit/image') }}",
						dataType: 'json',
						processData: false,
						contentType: false,
						data: data,   
						success: function(data){
							location.reload();
						}
					});	
				});

				$("#saveProfile").click(function(){
					var birth = $('#year').val()+"-"+$('#month').val()+"-"+$('#day').val();
					var form = $('#edit-account').serializeArray();
					var uniquekey = {
					      name: "birth",
					      value: birth
					};
					form.push(uniquekey);

					$.ajax({
						type: "POST",
						url: "{{ url('account/profile/store') }}",
						dataType: 'json',
						data: form,
						success: function(data){
							location.reload();				
						}
					});	
				});

			});
		</script>

		@include('layout.footer-copyright')
	</div>
@endsection