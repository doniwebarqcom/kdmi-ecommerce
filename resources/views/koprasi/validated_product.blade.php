@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')
	
	<style type="text/css">
		.side-bar{
			font-size: 17px;
		}

		.side-bar li a:hover{
			color: #f28b00;
		}
	
		.side-bar .active{
			color: #f28b00;
		}
	</style>

	<div class="boxed">		
		
        @include('layout.nav')

		@include('layout.breadcrumb')

		<section style="background: #f5f5f5" >
           	<div class="container">

				@include('user.sidebar')
				
				<div class="col-md-10" style="background: white; margin-top: 10px">
					
					@include('koprasi.header')

					@include('koprasi.menu')

					<div class="box-product" style="margin-left: 15px">
						<div class="row">						
							@if(isset($list_product) And count($list_product) > 0)
								@include('koprasi.product')
							@else
								<div style="height: 150px ; width: 100%">
									<h1 style="height: 90%; width:100%; display:flex; align-items: center;justify-content: center;">Produt Belum Ada Yang Terverifikasi</h1>
								</div>
							@endIf						
						</div>					
						<div class="divider10"></div>
					</div>
				</div>
			</div>
		</section>

		@if(count($list_product) > 0)
			@include('koprasi.pagging')
		@endIf

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
			});
		</script>

		@include('layout.footer-copyright')
	</div>
@endsection