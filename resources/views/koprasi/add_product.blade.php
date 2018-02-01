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
					<div class="col-md-10" style="margin: auto;">
						<div class="form-register" style="height: auto !important;">
							<div class="title" style="margin-bottom: 0;">
								<h3>Tambah Produk</h3>
							</div>							
							{!! Form::open(['url' => 'koprasi/register', 'method' => 'post', 'id' => 'regisKoprasi'], ['accept-charset' => 'utf-8']) !!}

								
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
		    
		});
	</script>
@endsection