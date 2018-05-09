    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-2">
                    <div id="mega-menu">
                        <div class="btn-mega"><span></span>ALL CATEGORIES</div>
                        <ul class="menu">
                        @if( isset($category))
                            @foreach ($category as $menuLevel1)
                                @if(isset($menuLevel1->subcategory) AND count($menuLevel1->subcategory) > 0)
                                        @php
                                            $typemenu = "dropdown"
                                        @endphp
                                    @else
                                        @php
                                            $typemenu = ""
                                        @endphp
                                @endif

                            <li>
                                <a href="#" title="" class="{{ $typemenu }}">
                                    <span class="menu-img">
                                        <img src="{{ $menuLevel1->image }}" alt="">
                                    </span>
                                    <span class="menu-title">
                                        {{ $menuLevel1->name }}
                                    </span>
                                </a>

                                @if($typemenu === "dropdown")
                                <div class="drop-menu">                                    
                                    @foreach ($menuLevel1->subcategory as $menuLevel2)
                                    <div class="one-third">
                                        <div class="cat-title">
                                            {{ $menuLevel2->name }}
                                        </div>
                                        @if(isset($menuLevel2->subcategory) AND count($menuLevel2->subcategory) > 0)
                                        <ul>
                                            @foreach ($menuLevel2->subcategory as $menuLevel3)
                                            <li>
                                                <a href="{{ url('k/'.$menuLevel3->permalink) }}" title="">{{ $menuLevel3->name }}</a>
                                            </li>
                                            @endForeach                                            
                                        </ul>
                                        @endif        
                                    </div>
                                    @endForeach
                                </div>
                                @endif
                            </li>
                            @endForeach
                        @endIf
                        </ul>
                    </div>
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-bottom -->