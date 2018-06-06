@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')
	
	<div class="boxed">	
        <section id="header" class="header">
		    @include('layout.header-top')
		</section><!-- /#header -->

		@include('layout.breadcrumb')	

		<section>

			@include('user.sidebar')
			
			<div class="col-md-10 ruler-sidebar">

				<div class="row" style="margin: 10px ; border: 1px solid #e5e5e5">
					<div class="row">
						<div class="col-md-4">
							<div>
								<ul>
								    <li>
								      <img style="margin:5px" src="{{ $user_data['image'] }}" alt="image" />
								    </li>				    
								</ul><!-- /.slides -->
							</div><!-- /.flexslider -->
						</div><!-- /.col-md-6 -->
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
						</div><!-- /.col-md-6 -->
					</div><!-- /.row -->					
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
			});
		</script>

		@include('layout.footer-copyright')
	</div>
@endsection