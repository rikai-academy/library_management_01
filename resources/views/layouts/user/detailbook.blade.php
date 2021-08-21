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
   <div id="detail-content ">
    <h1 id="font-1">{{$userBook->name}}</h1>
    <p id="detail-content-b">{{__('public.quote')}}</p>
    <p id="detail-content-p"> {{$userBook->desc}}</p>
   </div>
  </div>
  <button class="button" style="float: right"><a href="{{route('book_borrow_add.store',$userBook->id)}}" id="btn-a">{{__('public.rental')}}</a></button>
 </div>
 <br>
 <h3>{{__('public.cmt')}}</h3>
 <div class="panel-body">
  <form method="post" action=" {{url('/comment')}}">
   <input type="hidden" name="_token" value="{{ csrf_token() }}">
   <input type="hidden" name="book_id" value="{{$userBook->id}}">
   <div class="form-group-1">
    <textarea required="required" placeholder="Enter comment here" name="desc_comment" class="form-control" rows="5" cols="100"></textarea>
    <input type="submit" name='post_comment' class="btn btn-success" value="Comment" />
   </div>		
  </form>
 </div>
 @foreach($comment as $cmt)
 <div class="list-group">
  <div class="list-group-item">
   <b>{{$cmt->User->name}}</b>
   <p class="comment-space">{{__('public.date_time')}} {{ $cmt->created_at->format('d-m-Y H:i:s') }}</p>
   <hr>
   <br>
   <b>{{ $cmt->desc_comment }}</b>
  </div>
 </div>
 @endforeach
 <div class="cl">&nbsp;</div>
 <div id="best-sellers">
  <h3>{{__('public.popular_book')}}</h3>
  <ul>
   <li>
    <div class="product">
     <a href="{{ route('homepage.show', $userBook->id) }}">
      <img src="{{asset('/uploads')}}/{{$userBook->image}}" alt="" />
      <span class="book-name">{{$userBook->name}}</span>
     </a>
    </div>
   </li>
  </ul>
 </div>
</div>
@endsection
