					<style type="text/css">						
						.tab-list li .active {
							color: #FF9400;
						}
					</style>

					<div class="row" style="margin-left: 10px">
						<div class="col-md-12">
							<div class="product-tab style2">
								<ul class="tab-list">									
									<li><a href="{{ url('koprasi/'. $user_data['shop']->url) }}"  @if(isset($page_menu) AND ($page_menu  == "all product")) class="active" @endIf>All Product</a></li>

									<li><a href="{{ url('koprasi/'. $user_data['shop']->url.'/product/validated') }}"  @if(isset($page_menu) AND ($page_menu  == "all product validated")) class="active" @endIf>Product Validate</a></li>
								</ul>

							</div><!-- /.product-tab -->
						</div><!-- /.col-md-12 -->
					</div><!-- /.row -->