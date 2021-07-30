@extends('layouts.user.content.app')
@section('content')
<div id="sidebar">
@include('layouts.user.content.menu')
</div>
<div id="content"><br>
 <div class="products">
  <h3>{{__('public.detail')}}</h3>
  <div id="detail">
   <img id="detail-img" src="/css/userhome/images/{{$userbook->image}}">
   <div id ="detail-content ">
    <h1 id="font-1" >{{$userbook->name}}</h1>
    <p id="detail-content-b">{{__('public.quote')}}</p>
    <p id="detail-content-p"> {{$userbook->desc}}</p>
   </div>
  </div>
  <button class="button" style="float: right"><a href="" id="btn-a">{{__('public.rental')}}</a></button>
 </div>
<div class="cl">&nbsp;</div>
 <div id="best-sellers">
  <h3>{{__('public.popular_book')}}</h3>
  <ul>
   <li>
    <div class="product">
     <a href="{{ route('homepage.show', $userbook->id) }}">
      <img src="/css/userhome/images/{{$userbook->image}}" alt=""/>
      <span class="book-name">{{$userbook->name}}</span>
     </a>
    </div>
   </li>
  </ul>
 </div>
</div>
@endsection