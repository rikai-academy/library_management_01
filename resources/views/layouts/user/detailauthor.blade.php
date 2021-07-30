@extends('layouts.user.content.app')
@section('content')
<div id="sidebar">
@include('layouts.user.content.menu')
</div>
<div id="content"><br>
 <div>
  <h3>{{__('public.author')}}</h3>
  <div id="detail">
   <div id ="detail-content ">
    <h1 id="font-1" >{{$getAuthor->name}}</h1>
    <p id="detail-content-b">{{__('public.info')}}</p>
    <p id="detail-content-p"> {{$getAuthor->desc}}</p>
   </div>
  </div>
 </div>
 <br>
 <div class="products">
  <h3>{{__('public.author_book')}}</h3>
  <br>
  <ul>
   @foreach($bookByAuthor as $author)
   <li> 
    <div class="product">
     <a href="{{ route('homepage.show', $author->id) }}" class="info">
      <span class="holder">
       <img src="{{asset('/uploads')}}/{{$author->image}}" alt=""/>
       <span class="book-name">{{$author->name}}</span>
      </span>
     </a>
    </div>
   </li>
   @endforeach
  </ul>
 </div>
</div>
@endsection
