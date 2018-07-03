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