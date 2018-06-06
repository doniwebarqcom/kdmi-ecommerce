			<style type="text/css">
				#add_product a:hover{
					color: white !important;
					background: #f28b00 !important;
				}
				
			</style>

			<div class="col-md-2" style="background: white">
				<div id="add_product"><a href="{{ url('product-add') }}"  class="btn" style="border: 1px solid #f28b00; color: #f28b00; float: right; margin-top: 5px" href="#">Add Product</a></div>
				<div class="clearfix"></div>
				<ul class="side-bar" style="float: right; margin-top: 30px">
					<li><a href="{{ url('profile') }}" class="btn @if(isset($menu_side_bar) and $menu_side_bar == 'account' ) active @endIf"  href="#">Account</a></li>
					 @if($user_data['shop'] !== null)
                    <li>
                        <li><a href="{{ url('koprasi/'.$user_data['shop']->url) }}" class="btn @if(isset($menu_side_bar) and $menu_side_bar == 'product_koprasi' ) active @endIf"  class="btn" href="#">Product</a></li>
                    </li>
                    @else
                    <li>
                        <a href=" {{ URL::to('koprasi/register') }}" title="">Buka Koprasi</a>
                    </li>
                    @endIf					
					<li><a href="{{ url('transaction/list') }}" class="btn @if(isset($menu_side_bar) and $menu_side_bar == 'transaction' ) active @endIf" class="btn" href="#">Transaksi</a></li>
				</ul>

				<div class="clearfix"></div>
			</div>