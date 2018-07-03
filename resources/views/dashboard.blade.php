@extends('layout.app')

@section('title', 'Koperasi Dana Masyarakat Indonesia')

@section('content')
    <div class="boxed">
       @include('layout.nav')

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

            .active{
                background: #FF9400;
                color: white;
            }
       </style>

       <section style="background: #f5f5f5" >
           <div class="container" >
                <div class="row">
                    <div class="col-md-2">
                        
                        <div class="user-sider" style="background: #ffff; margin-bottom: 20px; margin-top: 10px">
                            <ul id="_menu_list">
                                <li><a class="active"  href="//o.jd.id/account/main.do">Akun Anda</a></li>
                                <li><a href="//o.jd.id/order/orderList.html">Pesanan Saya</a></li>
                                <li><a href="//s.jd.id/usercenter/wishlist/list.html">Favorites</a></li>
                                <li><a href="//cs.jd.id/apply/applyEntry.html">Purna Jual Saya</a></li>
                                <li><a href="//arya.jd.id/account/index">Bisnis Kredit</a></li>
                                <li><a href="//sc.jd.id/index.html">Security Center</a></li>
                                <li><a href="//a.jd.id/user/addr.html">Pengaturan Alamat</a></li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-10" style="min-height: 200px; background: #ffff; margin-bottom: 20px; margin-top: 10px">
                        <div class="row">
                            <div class="col-md-3">
                                <img src="">
                            </div>                            
                        </div>
                    </div>

                </div>
           </div>
       </section>    

        <footer>
            <div class="container">
                <div class="row">
                    @include('layout.footer1')
                </div><!-- /.row -->
            </div><!-- /.container -->
        </footer><!-- /footer -->

        @include('layout.footer-copyright')

    </div><!-- /.boxed -->
@endsection

@section('footer-script')
    <script type="text/javascript">
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