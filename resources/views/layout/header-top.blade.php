    <div class="header-top" style="height: 50px">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <ul class="flat-support">
                        <li>
                            <a href="faq.html" title="">Support</a>
                        </li>
                    </ul><!-- /.flat-support -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">
                    <ul class="flat-infomation">
                        <li class="phone">
                            Call Us: <a href="#" title="">(888) 1234 56789</a>
                        </li>
                    </ul><!-- /.flat-infomation -->
                </div><!-- /.col-md-4 -->
                <div class="col-md-4">

                    <ul class="flat-unstyled">
                        
                    </ul><!-- /.flat-unstyled -->
                </div><!-- /.col-md-4 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->

    <script type="text/javascript">
        ready(function(){
            $.ajax({
                type: "GET",
                url: '{{ URL::to("u/data") }}',
                dataType: 'json',
                success: function(data){               
                    $(".flat-unstyled").html(data.html);
                }
            });
        });        
    </script>