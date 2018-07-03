@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')
	<style type="text/css">
		.content-trans{
			font-weight: bold
		}

		.title-trans{
			font-size: 10px
		}

		.link-detail:hover{
			color: white !important;
			background: #f28b00 !important;
		}
	</style>

	<div class="boxed">	        
		@include('layout.nav')
		@include('layout.breadcrumb')	

		<section style="background: #f5f5f5" >
           	<div class="container">

				@include('user.sidebar')
				
				<div class="col-md-10" style="margin: auto; margin-top: 10px; background: white; min-height: 250px">

					@if(count($transaction) > 0)
						@foreach($transaction as $key => $value)
							<div class="header-transaction" style="margin: 10px ; border: 1px solid #e5e5e5;">
								<div class="row" >
									<div class="col-md-3" style="margin: 10px">
										<div class="title-trans">NO TAGIHAN</div>
										<div class="content-trans">{{ $value->transaction_code }}</div>
										<div class="title-trans">{{ date('d M Y h:i:s', $value->created_at) }}</div>
									</div>

									<div class="col-md-2 style="margin: 10px">
										<div class="title-trans">TOTAL TAGIHAN</div>
										<div class="content-trans">
											@php $total = $value->price_total + $value->shipping + $value->unique_number @endphp
											Rp.{{ number_format($total) }}
										</div>								
									</div>

									<div class="col-md-3" style="margin: 10px">
										<div class="title-trans">STATUS</div>
										<div class="content-trans">
											@switch($value->status)
											    @case(1)
											        Menunggu Pembayaran
											        @break
											    @case(2)
											        Dalam Proses Pembayaran
											        @break
											    @case(3)
											        Barang Sudah Diterima
											        @break
											    @case(4)
											        Transaksi Gagal
											        @break

											    @default
											       Transaksi Gagal
											@endswitch
										</div>								
									</div>

									<div class="col-md-3 detail" style="margin: 10px">
										<a href="{{ URL('payment/invoices/'.$value->transaction_code) }}" class="btn link-detail" style="float: right; font-size: 12px; font-weight: bold; border : 1px solid #f28b00"> Lihat Detail</a>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="row" style="margin: 5px ; border: 1px solid #e5e5e5;"></div>
								@foreach($value->items as $keyItem => $valueItem)
									<div class="row" style="margin-bottom: 10px ;">
										<div class="col-md-4">
											<div class="content-trans"><img src="{{ $valueItem->image }}" style="height: 100px;width: 100px; margin-left: 10px"> {{ $valueItem->product_name }}</div>
										</div>
										<div class="col-md-2 style="margin: 10px">
											<div class="title-trans">QUANTITY PRODUCT</div>
											<div class="content-trans">{{ $valueItem->quantity }}</div>								
										</div>

										<div class="col-md-3 style="margin: 10px">
											<div class="title-trans">WEIGHT PRODUCT</div>
											<div class="content-trans">{{ $valueItem->product_weight }}</div>								
										</div>
									</div>

									
								@endForeach

							</div>
														
						@endForeach
					@else
						<div class="row" style="margin: 10px ; border: 1px solid #e5e5e5; min-height: 200px">
							<h1 style="position: absolute; top: 50%; left: 50%; transform: translateX(-50%) translateY(-50%); font-family: 'Raleway', sans-serif; ">
								Tidak Ada Transaksi 
							</h1>
						</div>
					@endIf
				</div>
			</div>			
		</section>

		<div style="clear:both;"></div>


		<footer>
			<div class="container">
				<div class="row">
					@include('layout.footer1')		
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->

		<script type="text/javascript">
			ready(function(){
				
			});
		</script>

		@include('layout.footer-copyright')
	</div>
@endsection