@extends('layouts.user.content.app')
@section('content')
<div class="products"><br>
 <h3>{{__('public.list_book')}}</h3><br>
 <table>
  <tr>
   <th id="items">{{__('public.img')}}</th>
   <th id="items">{{__('public.name')}}</th>
   <th id="items">{{__('public.quanity')}}</th>
   <th id="items">{{__('public.time_rent')}}</th>
   <th id="items">{{__('public.time_return')}}</th>
   <th id="items">{{__('public.price')}}</th>
  </tr>
  <form id='myform' method='POST' action='#'>
   <tr>
    <td>
     <img src="/css/images/image02.jpg" alt="" id="rental-img">
    </td>
    <td>
    </td>
    <td>
     <input type='button' value='-' class='qtyminus' field='quantity'/>
     <input type='text' name='quantity' value='0' class='qty' />
     <input type='button' value='+' class='qtyplus' field='quantity'/>
    </td>
    <td>
     <input type="datetime-local" id="birthdaytime" name="birthdaytime">
    </td>
    <td>
     <input type="datetime-local" id="birthdaytime" name="birthdaytime">
    </td>
    <td>
    </td>
   </tr>
  </form>
 </table>
 <table>
  <tr>
   <th id="items-1">
    <b>{{__('public.total')}}</b> 
   </th>
  </tr>
 </table>
 <br>
 <button class="button" style="float: right">
  <a href="/rental.html" id="btn-a">{{__('public.access')}}</a>
 </button>			
</div>
<div class="cl">&nbsp;</div>
<div class="cl">&nbsp;</div>
@endsection
