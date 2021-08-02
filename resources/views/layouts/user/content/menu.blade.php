<ul class="categories">
        <li>
            <h4>Categories</h4>
                <nav>
                    <ul class="nav-menu nav-vertical" >
                        @foreach($menucategory as $mc)
                    <li ><a href="/category/{{$mc->id}}" class="nav-active" >{{$mc->name}}</a>
                            {{-- <ul>
                                <li><a href="#">Sub Nav Link</a>
                                    <ul>
                                        <li><a href="#">Sub Sub Nav Link</a></li>
                                        <li><a href="#">Sub Sub Nav Link</a></li>
                                        <li><a href="#">Sub Sub Nav Link</a></li>
                                    </ul>
                                </li>
                            </ul> --}}
                        </li>
                        @endforeach
                      
                    </ul>
                </nav>
        </li>
        <li>
            <h4>Authors</h4>
            <nav>
                <ul class="nav-menu nav-vertical" >
                    @foreach($menuauthor as $ma)
                    <li ><a href="/author/{{$ma->id}}" class="nav-active" >{{$ma->name}}</a>
                        {{-- <ul>
                            <li><a href="#">Sub Nav Link</a>
                                <ul>
                                    <li><a href="#">Sub Sub Nav Link</a></li>
                                    <li><a href="#">Sub Sub Nav Link</a></li>
                                    <li><a href="#">Sub Sub Nav Link</a></li>
                                </ul>
                            </li>
                        </ul> --}}
                    </li>
                    @endforeach
                </ul>
            </nav>
        </li>
    </ul>