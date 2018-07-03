@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')
	
	<div class="boxed">	
        <section id="header" class="header">
		    @include('layout.header-top')
		</section><!-- /#header -->

		@include('layout.breadcrumb')	

		<section style="background: #f5f5f5" >
           	<div class="container">
				<div class="row">
					@include('user.sidebar')
					
					<div class="col-md-8 box box-white box-shadow">
						<div class="text-left" style="position: relative; padding: 18px 24px; background-color: #fafafa; border-bottom: 1px solid #eee;">
							<h3 class="mb-0">Petunjuk Pembayaran</h3>
						</div>

						<div style="background-color: #fff;">
							<div style="margin: 0 10px 10px 10px">									
								<p style="padding: 30px">Lakukan pembayaran melalui ATM/transfer dengan detail sebagai berikut: </p>
								<div style="border: 1px solid #eee">
									<div class="row">
										<div style="padding:20px; width: 100%">
											
											<div class="col-md-12"> 
												<p style="margin-top: 10px; font-size: 10px">JUMLAH TOP UP</p> 
												<span>
													<b>													
													Rp {{ number_format($top_up->price_total) }}
													</b>
												</span>
												<hr/>
											</div>

											<div class="col-md-12"> 
												<p style="margin-top: 10px; font-size: 10px">UNIQUE NUMBER</p> 
												<span>
													<b>													
													Rp {{ number_format($top_up->unique_number) }}
													</b>
												</span>
												<hr/>
											</div>

											<div class="col-md-12"> 
												<p style="margin-top: 10px; font-size: 10px">TOTAL</p> 
												<span>
													<b>													
													Rp {{ number_format($top_up->price_total  + $top_up->unique_number) }}
													</b>
												</span>
												<hr/>
											</div>
											<div class="col-md-12"> 
												<p style="margin-top: 10px; font-size: 10px">STATUS PEMBAYARAN</p> 
												<span>
													<b>
													@switch($top_up->status)
													    @case(0)
													        Menunggu Proses Pembayaran
													        @break

													    @case(2)
													        Berhasil
													        @break

													    @case(4)
													        Expired
													        @break

													    @default
													        Menunggu Proses Pembayaran
													@endswitch
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
												<b>no rek</b>
											</div>


											<div class="col-md-6" style="border: 1px solid #dedede"> 
												<img src="https://www.bukalapak.com/images/logo-mandiri.gif"><br/>
												Bank Mandiri, Jakarta<br/>
												<b>no rek</b>
											</div>


											<div class="col-md-6" style="border: 1px solid #dedede"> 
												<img src="https://www.bukalapak.com/images/logo-bsm.gif"><br/>
												Bank BSM, Jakarta<br/>
												<b>no rek</b>
											</div>


											<div class="col-md-6" style="border: 1px solid #dedede"> 
												<img src="https://www.bukalapak.com/images/logo-bni.gif"><br/>
												Bank BNI, Jakarta<br/>
												<b>no rek</b>
											</div>


											<div class="col-md-6" style="border: 1px solid #dedede"> 
												<img  src="https://www.bukalapak.com/images/logo-bri.gif"><br/>
												Bank BRI, Jakarta<br/>
												<b>no rek</b>
											</div>

										</div>
									</div>

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

		@include('layout.footer-copyright')
	</div>
@endsection