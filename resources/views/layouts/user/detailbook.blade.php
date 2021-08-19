@extends('layouts.user.content.app')
@section('content')
<div id="sidebar">
@include('layouts.user.content.menu')
</div>
<div id="content"><br>
 <div class="products">
  <h3>{{__('public.detail')}}</h3>
  <div id="detail">
   <img id="detail-img" src="{{asset('/uploads')}}/{{$userBook->image}}">
   <div id ="detail-content ">
    <h1 id="font-1" >{{$userBook->name}}</h1>
    <p id="detail-content-b">{{__('public.quote')}}</p>
    <p id="detail-content-p"> {{$userBook->desc}}</p>
   </div>
  </div>
  <button class="button" style="float: right"><a href="" id="btn-a">{{__('public.rental')}}</a></button>
 </div>
 <div class="cl">&nbsp;</div>
 <div id="best-sellers">
  <h3>{{__('public.new_book')}}</h3>
  <ul>
   @foreach($books as $newBook)
   <li>
    <div class="product">
     <a href="{{ route('homepage.show',$newBook->id) }}">
      <img src="{{asset('/uploads')}}/{{$newBook->image}}" alt=""/>
      <span class="book-name">{{$newBook->name}}</span>
     </a>
    </div>
   </li>
   @endforeach
  </ul>
 </div>
</div>
@endsection
