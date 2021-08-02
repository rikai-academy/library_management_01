@extends('layouts.user.content.app')
@section('content')
<div id="sidebar">
@include('layouts.user.content.menu')
</div>
<div id="content"><br>
 <div class="products">
  <h3>{{__('public.result_search')}}</h3>
  <ul>
   @foreach($bookSearch as $search)
   <li> 
    <div class="product">
     <a href="{{ route('homepage.show', $search->id) }}" class="info">
      <span class="holder">
       <img src="{{asset('/uploads')}}/{{$search->image}}" alt="" />
       <span class="book-name">{{$search->name}}</span>
      </span>
     </a>
    </div>
   </li>
   @endforeach
  </ul>
 </div>
</div>
@endsection