                                        <div class="title">
                                                Categories
                                            </div>
                                            <ul>
                                            @if( isset($categoryInSearch))
                                                @foreach ($categoryInSearch as $categorySearch)
                                                <li>
                                                    <a href="{{ $categorySearch->permalink }}">{{ $categorySearch->fullname }}</a>
                                                </li>                             
                                                @endForeach
                                            @endIf
                                            </ul>
                                        </div><!-- /.cat-list-search -->