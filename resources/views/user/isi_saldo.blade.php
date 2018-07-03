@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')	
	<div class="boxed">	        
		@include('layout.nav')
		@include('layout.breadcrumb')	

		<section style="background: #f5f5f5" >
           	<div class="container">
				<div class="row">
					@include('user.sidebar')
					
					<div class="col-md-10" style="margin-top: 10px">
						
						<div class="row" style="background: white">
							<div class="col-md-12" >
								<h1 style="margin: 20px"><b>Tambah Saldo</b></h1>
							</div>							
						</div>

						<div class="row" style="background: white">
							<div class="col-md-12" >
								Saldo Sekarang
								<br/>
								<strong style="font-size: 25px">Rp{{ number_format($user_data['saldo']) }}</strong>
								<hr>
							</div>							
						</div>
						{!! Form::open(['url' => 'isi/saldo', 'method' => 'post', 'id' => 'isiSaldo'], ['accept-charset' => 'utf-8']) !!}
							<div class="row" style="background: white ; margin-bottom: 30px">
								<div class="col-md-12" id="anggota">
									Sumber Dana
									<br/>
									<select name="jenis_pengisian" id="jenis">
										<option value="1"> Dana Pribadi </option>
										<option value="2"> Simpanan Anggota </option>
									</select>
									<input type="hidden" name="source" value="1">
									<br/>
								</div>

								<div class="col-md-6" >
									Jumlah Penambahan Saldo <strong><span id="keterangan"></span></strong>
									<br/>
									<input min="10000" name="saldo" step="100" autofocus="autofocus" type="text" id='ammount' placeholder="Minimum Rp10.000"><br/>
								</div>
								<div class="col-md-6" >	<br/>
									<button style="float: right; background: #FF9400" type="submit" class="btn">Lanjut</button>
								</div>
							</div>
						{!! Form::close() !!}
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

		@include('layout.footer-copyright')
	</div>

	<script type="text/javascript">
		ready(function(){
			$("#jenis").change(function(){
				var val = $(this).val();
				if(val == 2)
				{
					$.ajax({
						type: "GET",
						url: '{{ URL::to("user/dana/simpanan_anggota") }}',
						dataType: 'json',
						success: function(data){
							$("#keterangan").html(' Maksimum '+data.reformat_dana);
						}
					});
				} else 
					$("#keterangan").html('');
			});
		});
	</script>

@endsection


