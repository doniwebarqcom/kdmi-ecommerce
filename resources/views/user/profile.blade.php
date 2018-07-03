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
					
					<div class="col-md-10" style="margin: auto; margin-top: 10px">
						<div class="row" style="background: white">
							<div class="col-md-2">
								<div>
									<ul>
									    <li>
									      <img style="margin:5px" width="100px" src="{{ $user_data['image'] }}" alt="image" />
									    </li>				    
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<ul>
									<li class="btn-edit" style="width: 80px;margin-bottom: 10px; margin-top: 10px; border: 1px solid #f28b00">
										<a style="margin-left: 12px; color: #f28b00"  href="{{ URL::to('profile/edit') }}"><i class="glyphicon glyphicon-edit"></i> <strong>Edit</strong> </a>
									</li>
									<li>
										<h1>{{ $user_data['name'] }}</h1>
									</li>
									<li>
										<i class="glyphicon glyphicon glyphicon-envelope"></i> {{ $user_data['email'] }}
									</li>
									<li>
										<i class="glyphicon glyphicon-earphone"></i> {{ $user_data['phone'] }}
									</li>
									<li>
										<i class="glyphicons glyphicons-birthday-cake"></i> {{ date("d M Y", strtotime($user_data['birth']) )  }}
									</li>

								</ul>
							</div><br/>
						</div>

						<div class="row" style="background: white">
							<div class="col-md-4" style="border:1px solid #e5e5e5">
								Saldo kamu
								<br/>
								<strong style="font-size: 15px">Rp{{ number_format($user_data['saldo']) }}</strong>
							</div>
							<div class="col-md-4" style="border:1px solid #e5e5e5">
								Pending top up
								<br/>
								<strong style="font-size: 15px" id="top-up">-</strong>
							</div>

							<div class="col-md-4" style="border:1px solid #e5e5e5">
								<a href="{{ url('isi/saldo') }}" class="btn" style="background: #f28b00; color: white; width: 90%; margin: 10px">Isi Saldo</a>
							</div>
						</div>

					</div>
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
				$('.disabled').click(function(e){
				     e.preventDefault();
				 })

				$.ajax({
	                type: "GET",
	                url: '{{ URL::to("pending/top-up") }}',
	                dataType: 'json',
	                success: function(data){
	                    $("#top-up").html(data['total']);
	                }
	            });
			});
		</script>

		@include('layout.footer-copyright')
	</div>
@endsection