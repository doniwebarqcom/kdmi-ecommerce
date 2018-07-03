                                    @if(isset($categoryInSearch))
                                        @foreach ($categoryInSearch as $key => $categorySearch)                                            
                                                <div class="cat-list-search">
                                                    <div class="title">
                                                        {{ $categorySearch->name }}                                                
                                                    </div>
                                                    @isset($categorySearch->sub_category)                                                        
                                                        <ul>
                                                            @foreach ($categorySearch->sub_category as $keySub => $sub)
                                                                @if($keySub < 2)
                                                                    <a href="{{ url('k/'.$sub->permalink) }}" title=""> <li>{{ $sub->name }}</li> </a>
                                                                @endIf
                                                            @endforeach
                                                        </ul>                                                        
                                                    @endisset
                                                </div>
                                            
                                        @endforeach
                                    @endIf