@extends('layouts.user.content.app')
@section('content')
<div id="sidebar">
@include('layouts.user.content.menu')
</div>
<div id="content"><br>
 <div class="products"><br>
  <h3>{{__('public.author')}}</h3>
  <div id="detail">
   <div id ="detail-content ">
    <h1 id="font-1" ></h1><br>   
     <p id="detail-content-p"></p>
   </div>
  </div>
 </div>
</div>
@endsection