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
				
        @include('layout.nav')

        @include('layout.breadcrumb')

        <section class="flat-account background">
			<div class="container">
				<div class="row">
					<div class="col-md-12 box box-white box-shadow">
						<div class="title">
							<h2>Detail Transaksi</h2>
						</div>

						<div class="row">
						<div class="col-md-8 box box-white box-shadow">
							<div class="text-left" style="position: relative; padding: 18px 24px; background-color: #fafafa; border-bottom: 1px solid #eee;">
								<h3 class="mb-0">Petunjuk Pembayaran</h3>
							</div>

							<div style="background-color: #fff;"">
								<div style="margin: 0 10px 10px 10px">									
									<p style="padding: 30px">Lakukan pembayaran melalui ATM/transfer dengan detail sebagai berikut: </p>
									<div style="border: 1px solid #eee">
										<div class="row">
											<div style="padding:20px; width: 100%">
												
												<div class="col-md-12"> 
													<p style="margin-top: 10px; font-size: 10px">TOTAL</p> 
													<span>
														<b>
														Rp {{ number_format($bill->price_product + $bill->shipping + $bill->fee_random) }}
														</b>
													</span>
													<hr/>
												</div>

												<div class="col-md-12"> 
													<p style="margin-top: 10px; font-size: 10px">Rekening Tujuan</p> 
												</div>

												<div class="col-md-6" style="border: 1px solid #dedede"> 
													<img src="https://www.bukalapak.com/images/logo-bca.gif"><br/>
													Bank BCA, Jakarta<br/>
													<b>no rek : - </b><br/>
													<b>atas nama : -</b>
												</div>


												<div class="col-md-6" style="border: 1px solid #dedede"> 
													<img src="https://www.bukalapak.com/images/logo-mandiri.gif"><br/>
													Bank Mandiri, Jakarta<br/>
													<b>no rek : - </b><br/>
													<b>atas nama : -</b>
												</div>


												<div class="col-md-6" style="border: 1px solid #dedede"> 
													<img src="https://www.bukalapak.com/images/logo-bsm.gif"><br/>
													Bank BSM, Jakarta<br/>
													<b>no rek : - </b><br/>
													<b>atas nama : -</b>
												</div>


												<div class="col-md-6" style="border: 1px solid #dedede"> 
													<img src="https://www.bukalapak.com/images/logo-bni.gif"><br/>
													Bank BNI, Jakarta<br/>
													<b>no rek : - </b><br/>
													<b>atas nama : -</b>
												</div>


												<div class="col-md-6" style="border: 1px solid #dedede"> 
													<img  src="https://www.bukalapak.com/images/logo-bri.gif"><br/>
													Bank BRI, Jakarta<br/>
													<b>no rek : - </b><br/>
													<b>atas nama : -</b>
												</div>

											</div>
										</div>

									</div>
								</div>
							</div>
												
						</div>

						<div class="col-md-4 box box-white box-shadow" >																	
							<div style="background-color: #fff;">
								<div style="margin: 0 10px 10px 10px">
									
									<div class="row">
										<div class="col-md-12"> 
											<p style="margin-top: 10px; font-size: 10px">NO. TAGIHAN</p> 
											<span><b>{{ $bill->transaction_code }}</b></span>
										</div>
										<hr/>
									</div>
									<hr/>

									<div class="row">
										<div class="col-md-12"> 
											<p style="margin-top: 10px; font-size: 10px">STATUS TRANSAKSI</p> 
											<span>
												<b>
												@switch($bill->status)
												    @case(0)
												        Menunggu Pembayaran
												        @break
												    @case(1)
												        Dalam Proses Pengiriman
												        @break
												    @case(2)
												        Barang Sudah Diterima (Transaksi Sukses)
												        @break
												    @case(4)
												        Transaksi Gagal
												        @break

												    @default
												       Transaksi Gagal
												@endswitch
												</b>
											</span>
										</div>
										<hr/>
									</div>
									<hr/>

									<div class="row">
										<div class="col-md-12"> 
											<p style="margin-top: 10px; font-size: 10px">METODE PEMBAYARAN</p> 
											<span>
												<b>
												@if($bill->type_payment === 1)
													Transfer
												@endIf
												</b>
											</span>
										</div>
										<hr/>
									</div>
									<hr/>

									<div class="row">
										<div class="col-md-12"> 
											<p style="margin-top: 10px; font-size: 10px">RINCIAN PEMBAYARAN</p> 
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">Total Harga Barang (termasuk 3 random angka)</div>
										<div class="col-md-6" style="text-align: right;"> Rp {{ number_format($bill->price_product + $bill->fee_random) }} </div>
									</div>

									<div class="row">
										<div class="col-md-6">Biaya Kirim</div>
										<div class="col-md-6" style="text-align: right;"> Rp {{ number_format($bill->shipping) }}</div>
									</div>
									<div class="row">
										<div class="col-md-6"><b>Total Belanja</b></div>
										<div class="col-md-6" style="text-align: right;"> Rp {{ number_format($bill->price_product + $bill->shipping + $bill->fee_random) }} </div>
									</div>

									<br/>
								</div>								
							</div>
						</div>

					</div><!-- /.row -->


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
@endsection

