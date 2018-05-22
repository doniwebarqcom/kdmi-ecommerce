        <style type="text/css">
        .new-chat-window {
              position: relative;
              display: block;
              margin: 10px auto;
              text-align: center;
              z-index: 2;
            }

        .new-chat-window .fa {
          position: absolute;
          top: 7px;
          left: 10px;
          font-weight: bold;
          font-style: normal;
          float: right !important;
        }

        .new-chat-window-input {
          border: 1px solid #ccc;
          line-height: 30px;
          padding-left: 30px;
          width: 100%;
          z-index: 1;
        }  

        .select2-container--default .select2-selection--single{
            border-radius: 30px; 
            position: relative;
            border: 2px solid #e5e5e5;
            height: 42px;
            width: 100%;
            margin: 0 auto;
            padding: 2px 25px;
            margin-right: 15px;
            font-family: 'Open Sans';
        }  

        .select2-selection__arrow{
            display: none;
        }

        .owl-item{
            /*width: 1905px !important;
            height:  588px !important;*/
            
        }
        </style>

        <section class="flat-row flat-slider">
            <div class="">
                <div class="row">
                    
                        <div class="slider owl-carousel" style="">
                            @foreach($banner as $key => $value)
                                @if($value->type === 0)
                                    <div class="slider-item style2">
                                        <div class="item-text">
                                            <div class="header-item">
                                                <p>{{ $value->category }}</p>
                                                <h2 class="name">{{ $value->name }}</h2>
                                                <p>{{ $value->description }}</p>
                                            </div>
                                            <div class="divider65"></div>
                                            <div class="content-item">
                                                <div class="price">
                                                    <span class="sale">
                                                        @if($value->price_discont > 0)
                                                            Rp {{number_format($value->price_discont)}}
                                                        @else
                                                            Rp {{number_format($value->price)}}
                                                        @endIf
                                                    </span>
                                                    <span class="btn-shop">
                                                        <a href="{{ URL::to('product/'.$value->alias) }}" title="">SHOP NOW <img src="http://grandetest.com/theme/techno-html/images/icons/right-2.png" alt=""></a>
                                                    </span>
                                                    <div class="clearfix"></div>
                                                </div>

                                                @if($value->price_discont > 0)
                                                    <div class="regular">
                                                        {{number_format($value->price)}}
                                                    </div>
                                                @endIf
                                            </div>
                                        </div>
                                        @if($value->discont > 0)
                                            <div class="item-image">,    
                                                <div class="sale-off">
                                                    {{$value->discont}}% <span>sale</span>
                                                </div>
                                                <img src="{{$value->image}}" alt="">
                                            </div>
                                            <div class="clearfix"></div>
                                        @endIf                                    
                                    </div><!-- /.slider -->

                                @else
                                    <div class="slider-item">
                                        <img style="display: block;margin-left: auto;margin-right: auto;" src="{{$value->image}}" alt="" class="center">
                                    </div><!-- /.slider -->      
                                @endIf
                            @endForeach

                        </div><!-- /.slider -->                                                

                    <div  class="col-md-4" style="position: absolute; z-index: 1; margin-left: 10%">
                        <div style="margin:20px 30px 30px 30px">
                            <div class="tab" style="height: 40px;    border-radius: 5px;"><h2 align="center" style="color: #fff; margin-top: 10px">Cari Pulsa</h2></div>

                            <div style="background: #fff;   border: 1px solid #ccc; border-bottom: none;" class="tab">
                                <ul style="margin-left: 10px; margin-top: 10px; width: 95%"  class="nav nav-tabs">
                                    <li id="pulsa_tab" style="width: 50%" class="tablinks active"><a onclick="openCity(event, 'pulsa')" align='center' href="#"><strong> Pulsa </strong></a></li>
                                    <li id="listrik_tab" style="width: 50%" class="tablinks"><a onclick="openCity(event, 'listrik')" align='center' href="#"><strong>Listrik</strong></a></li>
                                </ul>
                            </div>

                            <div class="tabcontent" id="pulsa" style="display: block !important; background: #fff; height: 300px">
                                {!! Form::open(['url' => 'login', 'method' => 'post', 'id' => 'formPulsa'], ['accept-charset' => 'utf-8']) !!}
                                                                                                                                
                                    <div class="form-box new-chat-window">                                        
                                        <input type="text" name="phone" class="new-chat-window-input" id="phonePulsa" placeholder="Example : 0821" style="padding: 8px 15px 8px 70px;" />
                                        <i class="fa"><img src="http://pulsa.kodami.id/logo-operator/simpati.png" style="width: 58px;"></i>
                                    </div>
                                    <br/>

                                    <div class="form-box">
                                       <select name="type_pulsa" id="type_pulsa">
                                            <option value="0">- Pilih Type -</option>
                                            <option value="Pulsa">Pulsa</option>
                                            <option value="Paket Data">Paket Data</option>
                                            <option value="Paket Telepon">Paket Telepon</option>
                                            <option value="Paket SMS">Paket Sms</option>
                                       </select>
                                    </div><br/>


                                    <div class="form-box">
                                       <select name="type_pulsa" id="pilihan_paket">
                                           
                                       </select>
                                    </div>

                                    <div class="form-box" style=" margin-top: 20px">
                                        <button type="submit" class="login" style="background-color: #9d1818; width: 50%">Beli</button>
                                    </div><!-- /.form-box -->

                                {!! Form::close() !!}
                            </div>

                            <div class="tabcontent" id="listrik" style="background: #fff; height: 300px; display: none">
                                {!! Form::open(['url' => 'login', 'method' => 'post', 'id' => 'formListrik'], ['accept-charset' => 'utf-8']) !!}
                                    
                                    <div class="form-box" style="margin-top: 10px">
                                         <select name="listrik_payment" id="listrik_payment">
                                           <option value="1">Token Listrik</option>
                                           <option value="2">Tagihan Listrik</option>
                                       </select>
                                    </div><br/>

                                    <div class="form-box">
                                         <input type="text" name="no_meteran" id="phonePulsa" placeholder="No Meteran" />
                                    </div><br/>

                                     <div class="form-box">
                                        <select name="nominal_listrik" id="nominal_listrik">
                                           <option value="0">- Pilih Nominal -</option>
                                           <option value="1">Rp 20.000</option>
                                           <option value="2">Rp 50.000</option>
                                           <option value="3">Rp 100.000</option>
                                           <option value="4">Rp 200.000</option>
                                           <option value="5">Rp 500.000</option>
                                           <option value="6">Rp 1.000.000</option>
                                       </select>
                                    </div>
                                  
                                    <div class="form-box" style=" margin-top: 20px">
                                        <button type="submit" class="login" style="background-color: #9d1818; width: 50%">Beli</button>
                                    </div><!-- /.form-box -->

                                {!! Form::close() !!}
                            </div>

                        </div>
                    </div>

                </div><!-- /.row -->
            </div><!-- /.container -->            
        </section><!-- /.flat-slider -->

@section('footer-script')
    <script type="text/javascript">
        function openCity(evt, target) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            document.getElementById(target).style.display = "block";

            if(target == 'pulsa')
                $("#pulsa_tab").addClass("active");
            else
                $("#listrik_tab").addClass("active");
        }

        $("#pilihan_paket").select2();
        $("#type_pulsa").select2();

        $("#listrik_payment").change(function(){
            if($(this).val() == 1)
                $("#nominal_listrik").show();
            else
                $("#nominal_listrik").hide();
        });

        $("#type_pulsa").change(function(){
            var telp = $("#phonePulsa").val();
            var type = $(this).val();

            if(telp != "" &&  type != 0)
                callPaket(telp, type);
            else
                $("#pilihan_paket").html("");
        });

        function callPaket(telp, type)
        {
            $.ajax({
                type: "GET",
                url: '{{ URL::to("ajax/get-pulsa") }}',
                data : {
                    'jenis_product' : type,
                    'no_telepon' : telp,
                },
                dataType: 'json',
                success: function(data){
                    $("#pilihan_paket").html("");
                    $.each(data.product, function(key, value){
                        $("#pilihan_paket").append('<option>'+ value.jenis_paket+'</option>');
                    });
                }
            });
        }
       

    </script>
@endsection