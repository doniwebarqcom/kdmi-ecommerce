<style type="text/css">
    .user-sider li{
        border-top:  1px solid #f5f5f5;
        border-bottom:  1px solid #f5f5f5;
    }

   .user-sider li a {
        padding: 10px 0 15px 18px;
        display: block;
        font-weight: bold;
    }

    .active-sidebar{
        background: #FF9400;
        color: white;
    }
</style>

<div class="col-md-2">                        
    <div class="user-sider" style="background: #ffff; margin-bottom: 20px; margin-top: 10px">
        <ul id="_menu_list">
            <li><a class="@if(isset($menu_side_bar) and $menu_side_bar == 'account' ) active-sidebar @endIf" href="{{ url('profile') }}">Akun Saya</a></li>
            <li><a class="@if(isset($menu_side_bar) and $menu_side_bar == 'transaction' ) active-sidebar @endIf" href="{{ url('transaction/list') }}">Pesanan Saya</a></li>

             @if($user_data['shop'] !== null)
            <li>
                <a class="@if(isset($menu_side_bar) and $menu_side_bar == 'koprasi' ) active-sidebar @endIf" href="{{ url('koprasi/'.$user_data['shop']->url) }}" title="">Koprasi Saya</a>
            </li>
            @else
            <li>
                <a class="@if(isset($menu_side_bar) and $menu_side_bar == 'koprasi' ) active-sidebar @endIf" href=" {{ URL::to('koprasi/register') }}" title="">Buka Koprasi</a>
            </li>
            @endIf

            <li><a class="@if(isset($menu_side_bar) and $menu_side_bar == 'place_list_user' ) active-sidebar @endIf" href="{{ url('profile/place/list') }}" >Pengaturan Alamat</a></li>
            <li><a class="@if(isset($menu_side_bar) and $menu_side_bar == 'wishlist' ) active-sidebar @endIf" href="{{ url('wishlist') }}" >Wishlist</a></li>
        </ul>
    </div>
</div>

@section('footer-script')
    <script type="text/javascript">

    	var availableTags = [];

        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>
@endsection