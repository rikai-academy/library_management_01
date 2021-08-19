@extends('layouts.user.content.app')
@section('content')
<div id="sidebar">
@include('layouts.user.content.menu')
</div>
<div id="content"><br>
 <div class="products">
  <h3>{{__('public.category')}}: {{$getCategory->name}}</h3>
  <ul>
   @foreach($bookByCategory as $cate)
   <li> 
    <div class="product">
     <a href="{{ route('homepage.show', $cate->id) }}" class="info">
      <span class="holder">
       <img src="{{asset('/uploads')}}/{{$cate->image}}" alt="" />
       <span class="book-name">{{$cate->name}}</span>
      </span>
     </a>
    </div>
   </li>
   @endforeach
  </ul>
 </div>
</div>
@endsection
