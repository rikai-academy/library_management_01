<div id="footer" class="shell">
 <div class="top">
  <div class="cnt">
   <div class="col about">
    <h4>{{__('public.footer_title')}}</h4>	
    <p>{{__('public.aboutus')}}</p>
   </div>
   <div class="col store">
    <h4>{{__('public.menu')}}</h4>
    <ul>
     <li><a href="{{route('homepage.index')}}">{{__('public.home')}}</a></li>					
     <li><a href="{{route('book_borrow.index')}}">{{__('public.rental')}}</a></li>
    </ul>
   </div>
   <div class="col" id="newsletter">
    <h4>{{__('public.contact_title')}}</h4> 
    <p>{{__('public.ceo')}}</p>
    <p>{{__('public.mobile')}}</p>
    <p>{{__('public.address')}}</p>
   </div>
   <div class="cl">&nbsp;</div>
   <div class="copy">
    <p>&copy;{{__('public.copy')}}</p>
   </div>
  </div>
 </div>
</div>
@livewireScripts
