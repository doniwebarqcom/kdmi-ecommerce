    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="logo" class="logo">
                        <a href='{{ URL::to("home") }}' title="">
                            <img src="https://res.cloudinary.com/kodami/image/upload/v1528253473/kodami_lww5fk.png" alt="">
                        </a>
                    </div><!-- /#logo -->
                </div><!-- /.col-md-3 -->
                <div class="col-md-6">
                    <div class="top-search">
                        <form action="#" method="get" class="form-search" accept-charset="utf-8">
                            <div class="cat-wrap">
                                <select name="category" style="border: none">
                                    <option hidden value="">All Category</option>
                                </select>
                                <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                                <div class="all-categories" id="allcategory">
                                    
                                </div><!-- /.all-categories -->
                                
                            </div><!-- /.cat-wrap -->
                            <div class="box-search">
                                <input type="text" name="search" placeholder="Search what you looking for ?">
                                <span class="btn-search">
                                    <button type="submit" class="waves-effect"><img src="http://grandetest.com/theme/techno-html/images/icons/search.png" alt=""></button>
                                </span>

                                <div class="search-suggestions">
                                    <div class="box-suggestions" id="search_suggections">
                                        <div class="title">
                                            Search Suggestions
                                        </div>
                                    </div><!-- /.box-suggestions -->                                    
                                </div><!-- /.search-suggestions -->


                            </div><!-- /.box-search -->
                        </form><!-- /.form-search -->
                    </div><!-- /.top-search -->
                </div><!-- /.col-md-6 -->
                <div class="col-md-3">
                    <div class="box-cart">
                        <div id="inner-box" class="inner-box">
                            <a href="#" title="">
                                <div class="icon-cart">
                                    <img src="{{ asset('images/icons/cart.png') }}" alt="">
                                </div>
                                <div class="price">
                                    0
                                </div>
                            </a>                   
                        </div><!-- /.inner-box -->
                    </div><!-- /.box-cart -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-middle -->

    <script type="text/javascript">
        ready(function(){
            $.ajax({
                type: "GET",
                url: '{{ URL::to("cart/ajax-cart-header") }}',
                dataType: 'json',
                success: function(data){               
                    if(data.count > 0)
                        $("#inner-box").html(data.html);
                }
            });

            $.ajax({
                type: "GET",
                url: '{{ URL::to("category/getDataAjax") }}',
                dataType: 'json',
                success: function(data){               
                    if(data.count > 0){
                        $("#allcategory").html(data.category1);
                    }
                }
            });
        });        
    </script>