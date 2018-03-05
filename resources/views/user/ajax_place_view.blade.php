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