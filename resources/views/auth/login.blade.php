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

		<section class="flat-account background" id="login">
			<div class="container">
				<div class="row">
					<div class="col-md-6" style="margin: auto;">
						<div class="form-login" style="height: auto !important;padding: 20px !important">
							<div class="title" style="margin-bottom: 0;">
								<h3>Login Page</h3>
							</div>
							<hr/>
							<br/>

							<div id="before-login">

								<div class="tab">
									<button class="tablinks active" id='login_by_email' onclick="openCity(event, 'login-by-email')">Password Login</button>
									<button class="tablinks" id='login_by_sms' onclick="openCity(event, 'login-by-sms')">SMS Login</button>
								</div>
								<!-- Tab content -->
								<div id="login-by-email" class="tabcontent" style="display: block !important;">
									{!! Form::open(['url' => 'login', 'method' => 'post', 'id' => 'formLogin'], ['accept-charset' => 'utf-8']) !!}

										@if(isset($message_error))
											<div class="isa_error">								   
											   	@foreach($message_error as $key => $value)
													<i class="fa fa-times-circle"><span style="font-size: 14px;margin-left: 3px"> {{ $value }} </span></i>
											   	@endForeach
											</div>
										@endIf

										@if(session('message_error'))
											<div class="isa_error">
												<i class="fa fa-times-circle"><span style="font-size: 14px;margin-left: 3px"> {{ session('message_error') }} </span></i>
											</div>
										@endIf

										<div class="form-box">
											{{ Form::label('email', 'email address * ', ['for' => 'email']) }}
											{{ Form::text('email', '', ['id' => 'email', 'placeholder' => 'Email']) }}
										</div>

										<div class="form-box">
											{{ Form::label('password', 'Password (*)', ['for' => 'password']) }}
											{{ Form::password('password', ['id' => 'password', 'placeholder' => 'Password']) }}

										</div>
										<div class="form-box">
											<button type="submit" class="login" style="background-color: #9d1818">Masuk</button>
											<a href="#" title="">Lost your password?</a>
										</div><!-- /.form-box -->

									{!! Form::close() !!}
								</div>

								<div id="login-by-sms" class="tabcontent">													
									{!! Form::open(['url' => 'login/phone', 'method' => 'post', 'id' => 'formLoginByPhone'], ['accept-charset' => 'utf-8']) !!}
									<br/>									


										<div class="form-box">
											<div class="row">								  	
											  	<div class="col-sm-8">
											  		<div class="input-group">
													    <span class="input-group-addon" style="width: 50px;"><i>+62</i></span>
													    {{ Form::text('phone', '', ['id' => 'phone', 'placeholder' => 'Masukan No Hp', 'class' => 'form-control']) }}
													</div>													  
											  	</div>
											</div>
										</div>

										<div class="form-box">
											<div class="row">
											  	<div class="col-sm-5">
											  		{{ Form::text('code', '', ['id' => 'code', 'placeholder' => 'Code']) }}
											  	</div>
											  	<div class="col-sm-5">
											  		<button type="button" id="getCode" style="background-color: #9d1818;height: 40px;padding: 0px 35px;font-size: 10px;margin-right: 0px;">Kirim Kode SMS</button>
											  	</div>											  	
											</div>
										</div>

										<div class="form-box">
											<button type="submit" class="login" id="sendCode" style="background-color: #9d1818;">Masuk</button>
										</div><!-- /.form-box -->

									{!! Form::close() !!}
								</div>
							</div>														
						</div><!-- /.form-login -->
					</div><!-- /.col-md-6 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</section><!-- /.flat-account -->

		<section class="flat-account background" id="completed_registration" style="display: none">
			<div class="container">
				<div class="row">
					<div class="col-md-6" style="margin: auto;">
						<div class="form-login" style="height: auto !important;padding: 20px !important">
							<div class="title" style="margin-bottom: 0;">
								<h3>Complete the registration</h3>
							</div>
							<hr/>
							<div>					
								{!! Form::open(['url' => 'registration/phone/completed', 'method' => 'post', 'id' => 'formSendPassword'], ['accept-charset' => 'utf-8']) !!}
									<br/>
									<p>Nomor Anda <span id="no_phone"></span> belum terdaftar. Silahkan mengatur password untuk menyelesaikan proses registrasi.</p>
									<div class="form-box">
										{{ Form::password('password_phone', ['id' => 'password_phone', 'placeholder' => 'Silahkan mengatur password anda']) }}
										{{ Form::hidden('code_send', '', array('id' => 'code_send')) }}
										{{ Form::hidden('phone_send', '', array('id' => 'phone_send')) }}
									</div>

									<div class="form-box">
										<button type="submit" class="login" style="background-color: #9d1818">Masuk</button>
									</div><!-- /.form-box -->

								{!! Form::close() !!}
							</div>

						</div>	
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
			$( "#login_by_email" ).addClass( "active" );			

			$("#formLogin").validate({
				rules: {
					email: "required",
					password: "required"
				},
				messages: {
					email: "kolom harus diisi",
					password: "kolom harus diisi"
				}
			});

			$("#getCode").click(function(){
								
				$('#formLoginByPhone').validate({
					rules: {
						phone: {
							required: true,
				      		number: true
						}
					},
					errorPlacement: function(error, element) {
				       var n = element.attr("name");
				       	if (n == "phone"){
				       		element.attr("placeholder", "Harus diisi dan angka");
				       		$("#phone").val("");
				       	}
				    },
				    highlight: function(element) {
						
				        // add a class "has_error" to the element 
				        $(element).addClass('has_error');
				    },
				    unhighlight: function(element) {
						
				        // remove the class "has_error" from the element 
				        $(element).removeClass('has_error');
				    }
				});

		        if ($('#formLoginByPhone').valid()) // check if form is valid
		        {
		        	$("#getCode").prop("disabled", true);
					$("#getCode").css("background-color", "#ccc");
					countdown(1);

		            $.ajax({
						type: "POST",
						url: '{{ URL::to("generate/code") }}',
						data : {
							"_token": "{{ csrf_token() }}",
							'phone' : "62"+$("#phone").val(),
						},
						dataType: 'json',
						success: function(data){
							var code = data.code;
							if(code != '200')
							{
								// get error failed
							}

						}
					});
		        }		        				
			});

			 $('#sendCode').click(function(){

		        $.ajax({
					type: "POST",
					url: '{{ URL::to("send/code/register") }}',
					data : {
						"_token": "{{ csrf_token() }}",
						'phone' : "62"+$("#phone").val(),
						'code' : $("#code").val(),
					},
					dataType: 'json',
					success: function(data){						
						var code = data.status;
						if(data.status == '200')
						{
							if(data.member == 1)
							{
								window.location.replace('{{ URL::to("home") }}');
							}else {
								var phone = "62"+$("#phone").val();
								var code = $("#code").val();
								$("#phone_send").val(phone);
								$("#code_send").val(code);
								$("#no_phone").html(phone);
								$("#login").hide();
								$("#completed_registration").show();
							}							
						}
					}
				});

		        return false;
		    });

			setTimeout(function() {
			    $('.isa_error').fadeOut('slow');
			}, 3000);
		});

		function countdown(minutes) {
		    var seconds = 60;
		    var mins = minutes
		    function tick() {
		        //This script expects an element with an ID = "counter". You can change that to what ever you want. 
		        var counter = document.getElementById("getCode");
		        var current_minutes = mins-1
		        seconds--;
		        counter.innerHTML = "Kirim Kode SMS " + current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
		        if( seconds < 1 ) {
		            counter.innerHTML = "Kirim Kode SMS";
		            $("#getCode").removeAttr('disabled');
		            document.getElementById("getCode").style.backgroundColor = "#9d1818";
		        }else if( seconds > 0 ) {
		            setTimeout(tick, 1000);
		        } else {
		            if(mins > 1){
		                countdown(mins-1);           
		            }
		        }
		    }

		    tick();
		}

		function openCity(evt, target) {
		    // Declare all variables
		    var i, tabcontent, tablinks;

		    // Get all elements with class="tabcontent" and hide them
		    tabcontent = document.getElementsByClassName("tabcontent");
		    for (i = 0; i < tabcontent.length; i++) {
		        tabcontent[i].style.display = "none";
		    }

		    // Get all elements with class="tablinks" and remove the class "active"
		    tablinks = document.getElementsByClassName("tablinks");
		    for (i = 0; i < tablinks.length; i++) {
		        tablinks[i].className = tablinks[i].className.replace(" active", "");
		    }

		    // Show the current tab, and add an "active" class to the button that opened the tab
		    document.getElementById(target).style.display = "block";
		    evt.currentTarget.className += " active";
		}

	</script>

	<style type="text/css">
		input[readonly]
		{
		    background-color: #b0b0b0;
		}

		.has_error{ background: red !important;}
	</style>
@endsection