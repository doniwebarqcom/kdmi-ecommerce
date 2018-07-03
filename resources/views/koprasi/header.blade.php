					<div class="row" style="margin-left: 10px;">
						<div class="col-md-3">
							<div class="flexslider">
								<ul class="slides">
								    <li>
								      <img src="{{ $user_data['shop']->image }}" alt="image flexslider" />
								    </li>							    
								</ul>
							</div>
						</div>
						<div class="col-md-9">
							<div class="product-detail style4">
								<div class="header-detail">
									<a href="{{url('product-add')}}" style="height: 40px; font-size: 15px; background-color: #9d1818" type="button" class="btn btn-info btn-lg">+ Tambah Barang</a><br/><br/>

									<h4 class="name">Koprasi {{ $user_data['shop']->name }}</h4>								
								</div><!-- /.header-detail -->
								<div class="content-detail">
									<div class="info-text" style="text-align: justify;">
										{{ $user_data['shop']->description }}
									</div>								
								</div>
							</div>
						</div>
					</div>