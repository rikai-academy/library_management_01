<div id="navigation">
 <ul>
  <li>
   <a href="{{route('homepage.index')}}">{{__('public.home')}}</a>
  </li>
  <li>
   <a href="{{route('book_borrow.index')}}">{{__('public.rental')}}</a>
  </li>
  <li>
   <a href="{{url('contact')}}">{{__('public.contacts')}}</a>
  </li>
  <li> 
   <div class="search-container">
    <form action="{{url('/search')}}">
     <input type="text" placeholder="{{__('public.input_here')}}" name="query">
     <button type="submit">
     {{__('public.search')}}
     </button>
    </form>
   </div>
  </li>	
 </ul>
</div>