@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')

<style type="text/css">
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
	  -webkit-appearance: none; 
	  margin: 0; 
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
		
        @include('layout.nav')

        @include('layout.breadcrumb')
		<section class="flat-account background">
			<div class="container">
				<div class="row">
					<div class="col-md-8 box box-white box-shadow">
						<div class="text-left" style="position: relative; padding: 18px 24px; background-color: #fafafa; border-bottom: 1px solid #eee;">
							<h3 class="mb-0">Pilih Metode Pembayaran</h3>
						</div>

						<div style="background-color: #fff;"">
							<div style="margin: 0 10px 10px 10px">
								<br/>
								<div class="accordion"">
									<div class="accordion-toggle">
										<div class="toggle-title active">
											Transfer manual bank BCA, MANDIRI, BNI, BRI
										</div>
										<div class="toggle-content" style="color: black">
											<b>Ketentuan Pembayaran</b>
											<ul>
												<li style=" list-style-type: circle;">Pembayaran dapat dilakukan melalui transfer ke rekening Bank BCA, Bank Mandiri, Bank BSM, Bank BNI, atau Bank BRI.</li>
												<li style=" list-style-type: circle;">Total belanja kamu belum termasuk kode pembayaran untuk keperluan proses verifikasi otomatis.</li>
												<li style=" list-style-type: circle;">Mohon transfer tepat sampai 3 digit terakhir.</li>
											</ul>
										</div>
									</div><!-- /.accordion-toggle -->								
								</div><!-- /.accordion -->
								<br><br><br>
							</div>
						</div>
											
					</div>

					<div class="col-md-4 box box-white box-shadow" >										
						<div class="text-left" style="position: relative; padding: 18px 24px; background-color: #fafafa; border-bottom: 1px solid #eee;">
							<h3 class="mb-0">Ringkasan Belanja</h3>
						</div>
						<div style="background-color: #fff;">
							<div style="margin: 0 10px 10px 10px">
								<br>
								{!! Form::open(['url' => 'payment/edit_payment', 'method' => 'post', 'id' => 'edit_payment'], ['accept-charset' => 'utf-8']) !!}
									<div class="row">
										<div class="col-md-6">Total Harga Barang</div>
										<div class="col-md-6" style="text-align: right;"> Rp {{ number_format($transaction->price_product) }} </div>
									</div>

									<div class="row">
										<div class="col-md-6">Biaya Kirim</div>
										<div class="col-md-6" style="text-align: right;"> Rp {{ number_format($transaction->shipping) }}</div>
									</div>

									<hr/>
									<input type="hidden" name="type_payment" value="1">

									<div class="row">
										<div class="col-md-6"><b>Total Belanja</b></div>
										<div class="col-md-6" style="text-align: right;"> Rp {{ number_format($transaction->price_product + $transaction->shipping) }} </div>
									</div>

									<div class="row" st>
										<div class="col-md-12"> 
											<button type="submit" class="no-radius" style="background-color: #c30f42; border-color: #c30f42; margin-top: 30px; margin-bottom: 20px;width: 100%">
	                          					Bayar
	                      					</button>
										</div>
									</div>
								{!! Form::close() !!}
							</div>
							
						</div>
					</div>

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
@endsection

