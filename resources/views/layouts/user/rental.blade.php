@extends('layouts.user.content.app')
@section('content')
<div class="products"><br>
 <h3>{{__('public.list_book')}}</h3><br>
 <form action="{{route('book_borrow.update',Auth::user()->id)}}" method="POST">
  @method('PUT')
  @csrf
  <table>
   <tr>
    <th id="items">{{__('public.img')}}</th>
    <th id="items">{{__('public.name')}}</th>
    <th id="items">{{__('public.quanity')}}</th>
    <th id="items">{{__('public.time_rent')}}</th>
    <th id="items">{{__('public.time_return')}}</th>
    <th id="items">{{__('public.price')}}</th>
   </tr>
   <div>
   @foreach ($data_borrow as $borrow)
   @livewire('counter', ['borrow_book' => $borrow])
   @endforeach
   </div>
  </table>
   @livewire('total',['sub_total' => $data_borrow])
  <br>
  <input type="submit" class="button rent" value="{{__('public.access')}}">
 </form>
</div>
<div class="cl">&nbsp;</div>
<div class="cl">&nbsp;</div>
@endsection
