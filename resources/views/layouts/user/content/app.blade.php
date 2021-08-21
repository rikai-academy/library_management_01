<!DOCTYPE html>
<html lang="en-US">
@include('layouts.user.content.head')
<body>
 <div id="header" class="shell">
  <div class="logo">
   <h1>
    <a href="{{route('homepage.index')}}" id="link">{{__('public.library')}}</a>
   </h1>
  </div>
@include('layouts.user.content.menubar')
  <div class="cl">&nbsp;</div>
  <div id="login-details">
@include('layouts.user.content.user')
  </div>
 </div>
@include('layouts.user.content.banner')
 <div id="main" class="shell">
  @yield('content')
   <div class="cl">&nbsp;</div>
 </div>
@include('layouts.user.content.footer')
</body>
</html>