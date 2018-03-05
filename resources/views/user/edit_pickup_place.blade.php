@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')
<style type="text/css">
	

	.select2-container--default .select2-selection--single{
	    border-radius: 0px; 
	    position: relative;
	    border: 2px solid #e5e5e5;
	    height: 48px;
	    width: 300%;
	    padding: 2px 5px;
	    margin-right: 5px;
	    font-family: 'Open Sans';
	}

	.select2-selection__arrow{
		display: none;
	}

	span.select2-dropdown.select2-dropdown--below {
	    width:300px !important;
	}

	span.select2-dropdown.select2-dropdown--above {
		width:300px !important;	
	}

	.no-radius{
		border-radius: 0px !important; 
	}

	.select2-selection__rendered{
		margin-top: 5px;
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
		
        <section id="header" class="header">
		    @include('layout.header-top')
		</section><!-- /#header -->

		@include('layout.breadcrumb')		
		<section class="flat-account background" id="login">
			<div class="container">
				<div class="row" style="color: black">
					<div class="col-md-12" style="margin: auto;">
						<div class="container-backgroud-white" style="height: auto !important;padding: 20px !important;">
							<div class="title" style="margin-bottom: 20px;">
								<h2 align="left"><i class="glyphicon glyphicon glyphicon-user"></i> {{ $user_data['name'] }}</h2>
							</div>						
							<ul class="nav nav-tabs" style="margin-bottom: 30px;">
							  	<li><a href="{{ URL::to('my-account/profile') }}">Biodata Diri</a></li>
							  	<li><a href="">Koprasi</a></li>
							  	<li class="active"><a href="">Daftar Alamat</a></li>
							</ul>

							<button style="height: 40px; font-size: 15px; background-color: #9d1818" type="button" class="btn btn-info btn-lg" id="add-place" data-toggle="modal" data-target="#myModal">+ Tambah Alamat</button>

							{!! Form::open(['url' => '#', 'method' => 'post', 'id' => 'edit-account-place'], ['accept-charset' => 'utf-8']) !!}

							<div id="list_pickup">								
								<table class="table table-responsive">
									<thead>
										<tr>
											<th>Penerima</th>
											<th>Alamat Pengiriman</th>
											<th>Daerah pengiriman</th>
										</tr>
									</thead>
									<tbody>

										@if(count($place_pickup) > 0)
											@foreach($place_pickup as $key => $value)
												<tr>
													<td style="">
														<strong> {{ $value->recipient_name}} </strong> <br />
														{{ $value->phone_number_recipient}}
													</td>
													<td style="">
														<strong> {{ $value->place_name }} </strong> <br />
														{{ $value->addres}}
													</td>
													<td style="">
														{{ $value->long_address}} {{$value->postal_code}} Indonesia
													</td>
													<td>
														<a data-id="{{ $value->id}}" style="background-color: #9d1818;color: white" class="button change-place"><i class="glyphicon glyphicon-edit"></i> Ubah</a>														
													</td>
													<td>
														<a data-id="{{ $value->id}}" data-alias="{{ $value->place_name }}" style="background-color: #f0ad4e;color: white;" class="button btn-danger remove-place"><i class="glyphicon glyphicon-remove"></i> Hapus</a>
													</td>
												</tr>
											@endForeach
										@endIf
										
									</tbody>
								</table><!-- /.table-wishlist -->
							</div><!-- /.wishlist-content -->
							{!! Form::close() !!}

						</div>
					</div>
				</div>
			</div>
		</section>

		<div id="modalDestroyData" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				{!! Form::open(['url' => 'account/place', 'method' => 'post', 'id' => 'delete-place-modal'], ['accept-charset' => 'utf-8']) !!}
				<input type="hidden" name="delete_id" value="0" id="delete_id" />
				<div class="modal-content">
					<div class="button-close" style="float: right;height: 20px">
						<button style="width: 20px;margin: 10px" type="button" class="close" data-dismiss="modal">&times;</button>
					</div>

					<div style="margin-top: 0px" class="modal-header">        
						<h4 class="modal-title">Hapus Alamat</h4>
					</div>

					<div class="modal-body">
						<p style="text-align: center;">pakah Anda yakin untuk menghapus "<span id="alias_delete"></span>" ? <br/>
						Anda tidak dapat mengembalikan alamat yang sudah dihapus.</p>
						
					</div>

					<div class="modal-footer">						
						<button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #cbc6c6">Close</button>
						<button type="button" id="delete-btn" class="btn btn-primary">Hapus</button>	
					</div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="button-close" style="float: right;height: 20px">
						<button style="width: 20px;margin: 10px" type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					
					<div style="margin-top: 0px" class="modal-header">        
						<h4 class="modal-title">Tambah Alamat</h4>
					</div>
					{!! Form::open(['url' => 'account/place', 'method' => 'post', 'id' => 'edit-account-place-modal'], ['accept-charset' => 'utf-8']) !!}
					<input type="hidden" name="id" value="0" id="id" />	
					<div class="modal-body">
							<div class="form-box">
								<div class="form-group">
									<label for="place_alias">Nama Alamat</label>
									<input type="text" name="place_alias" class="no-radius" id="place_alias">
								</div>
							</div>

							<div class="form-box">
								<div class="row">
									<div class="form-group col-sm-6">
										<label for="recipient_name">Nama Penerima</label>
										<input type="text" name="recipient_name" class="no-radius" id="recipient_name" required="true">
									</div>

									<div class="form-group col-sm-6">
										<label for="phone">Nomor Hp</label>
										<input type="text" name="phone" class="no-radius" required="true" id="phone">
									</div>

								</div>
							</div>
							

							<div class="form-box">
								<div class="row">
									<div class="form-group col-sm-8">
										<label for="district">Kota / Kecamatan</label><br/>
										<select id="district" name="district" style="padding-top : 3px" required="true" placeholder="Cari Kota / kecamatan">
											
										</select>			
									</div>

									<div class="form-group col-sm-4">
										<label for="postal_code">Kode Pos</label>
										<input type="text" name="postal_code" class="no-radius" id="postal_code" required="true" style="font-size: 13px;">
									</div>

								</div>
							</div>						
							
							<div class="form-box">
								<label for="address">Alamat</label>
								<textarea name="address" class="no-radius" required="true" id="address"></textarea>
							</div>													
					</div>					
					{!! Form::close() !!}
					
					<div class="modal-footer">
						<button type="submit" id="submit" class="btn btn-primary">Submit</button>	
						<button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #cbc6c6">Close</button>
					</div>
				</div>
			</div>
		</div>

		<footer>
			<div class="container">
				<div class="row">
					@include('layout.footer1')		
				</div><!-- /.row -->
			</div><!-- /.container -->
		</footer><!-- /footer -->

		<script type="text/javascript">
			ready(function(){
												
			    var availableTags = [];

			    $(".remove-place").click(function(){
			    	$("#modalDestroyData").modal('show');
			    	$("#alias_delete").html($(this).data('alias'));
			    	$("#delete_id").val($(this).data('id'));
			    });

			    $("#add-place").click(function(){
			    	$(".modal-title").html("Tambah Alamat");
			    	$("#id").val(0);
			    	$("#place_alias").val("");
			    	$("#recipient_name").val("");
			    	$(".select2-selection__rendered").html("");
			    	$("#phone").val("");
			    	$("#district").val("");
			    	$("#postal_code").val("");
			    	$("#address").val("");
			    	$("#edit-account-place-modal").attr("method", "POST");
					$("#edit-account-place-modal").attr("action", "{{ URL::to('account/place') }}");
			    });

			    $("#delete-btn").click(function(){
			    	
			    	$.ajax({
						type: 'DELETE',
						url: "{{ url('account/place') }}",
						data : $('#delete-place-modal').serializeArray(),
						dataType: 'json',
						success: function(data){
							if(data.success === 'false'){
								alert('somthing error');
							}
							else
							{
								$("#myModal").modal('hide');
								$("#list_pickup").html(data.html);
							}

							$("#modalDestroyData").modal('hide');
						}

					});
			    });

			    $(".change-place").click(function(){
			    	$.ajax({
						type: 'GET',
						url: "{{ url('account/get/place') }}",
						data : { id : $(this).data('id')},
						dataType: 'json',
						success: function(data){
							$(".modal-title").html("Edit Alamat");
					    	$("#id").val(data.id);
					    	$("#place_alias").val(data.place_name);
					    	$("#recipient_name").val(data.recipient_name);
					    	$("#phone").val(data.phone_number_recipient);
					    	$("#district").html("<option value='"+data.district_id+"'>"+data.long_address+"</option>");
					    	$('#my-best-friend').val('Bill').trigger('change');  
					    	$("#postal_code").val(data.postal_code);
					    	$("#address").val(data.addres);
					    	$("#edit-account-place-modal").attr("method", "PUT");
					    	$("#edit-account-place-modal").attr("action", "{{ URL::to('account/place') }}");
					    	$("#myModal").modal('show');
						}

					});
			    });

			    $('#submit').click(function() {
        			$form = $("#edit-account-place-modal");
    				var action =  $form.attr('action');
    				var method =  $form.attr('method');
    				$.ajax({
						type: method,
						url: action,
						data : $form.serializeArray(),
						dataType: 'json',
						success: function(data){
							if(data.success === 'false')
								alert('somthing error');
							else
							{
								$("#myModal").modal('hide');
								$("#list_pickup").html(data.html);
							}
						}

					});	
      			});

				$("#district").select2({
			    	placeholder: "Cari Kecamatan",
				    minimumInputLength: 2,
				    tags: [],
				    ajax: {
				        url: "{{ url('place/district') }}",
				        dataType: 'json',
				        type: "GET",
				        quietMillis: 100,
				        processResults: function (data) {
							return {
					            results: $.map(data, function (item) {
					                return {
					                    text: item.full_name,
					                    id: item.id
					                }
					            })
					        };
					    }
				    }
				});
				    
			 	// get reference to autocomplete element
				var dlg = $("#myModal");
				var input = $("#postal_code", dlg);

		     	// initialize autocomplete
				input.autocomplete({
				     source: availableTags,
				     open: function () {
				         autoComplete.zIndex(dlg.zIndex()+1);
				 	 }
				 });

				autoComplete = input.autocomplete("widget");	

				$("#district").change(function() {
				 	availableTags = [];

				    $.ajax({
						type: "GET",
						url: "{{ url('place/postal-code/district') }}",
						data : {
							district : $(this).val()
						},
						dataType: 'json',
						success: function(data){
							$.each(data, function( index, value ) {
	  							availableTags.push(value.code);
							});

							input.autocomplete({
							     source: availableTags,
							     open: function () {
							         autoComplete.zIndex(dlg.zIndex()+1);
							 	 }
							 });
						}

					});			    
				});  
			});
		</script>

		@include('layout.footer-copyright')
	</div>

@endsection