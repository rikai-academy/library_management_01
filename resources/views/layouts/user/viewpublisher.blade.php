@extends('layouts.user.content.app')
@section('content')
<div id="sidebar">
@include('layouts.user.content.menu')
</div>
<div id="content"><br>
 <div class="products">
  <h3>{{__('public.publisher')}}: {{$getPublisher->name}}</h3>
  <ul>
   @foreach($bookByPublisher as $pl)
   <li> 
    <div class="product">
     <a href="{{ route('homepage.show', $pl->id) }}" class="info">
      <span class="holder">
       <img src="{{asset('/uploads')}}/{{$pl->image}}" alt="" />
       <span class="book-name">{{$pl->name}}</span>
      </span>
     </a>
    </div>
   </li>
   @endforeach
  </ul>
 </div>
</div>
@endsection