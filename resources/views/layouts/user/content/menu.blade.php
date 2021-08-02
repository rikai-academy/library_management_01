<ul class="categories">
 <li>
  <h4>{{__('public.category')}}</h4>
  <nav>
   <ul class="nav-menu nav-vertical">
    @foreach(Menu::getCategory() as $mc)
    <li><a href="{{url('/category/'.$mc->id)}}" class="nav-active">{{$mc->name}}</a>
    </li>
    @endforeach
   </ul>
  </nav>
 </li>
 <li>
  <h4>{{__('public.author')}}</h4>
  <nav>
   <ul class="nav-menu nav-vertical">
    @foreach(Menu::getAuthor() as $ma)
    <li><a href="{{url('/author/'.$ma->id)}}" class="nav-active">{{$ma->name}}</a>
    </li>
    @endforeach
   </ul>
  </nav>
 </li>
 <li>
  <h4>{{__('public.publisher')}}</h4>
  <nav>
   <ul class="nav-menu nav-vertical">
    @foreach(Menu::getPublisher() as $mp)
    <li><a href="{{url('/publisher/'.$mp->id)}}" class="nav-active">{{$mp->name}}</a>
    </li>
    @endforeach
   </ul>
  </nav>
 </li>
</ul>
 
