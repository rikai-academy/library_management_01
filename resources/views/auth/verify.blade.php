@extends('auth.app')

@section('content')
<div class="container">
 <div class="row justify-content-center">
  <div class="col-md-8">
   <div class="card">
    <div class="card-header">{{__('messlog.verify_emai')}}</div>
    <div class="card-body">
     @if (session('resent'))
     <div class="alert alert-success" role="alert">
      {{__('messlog.fresh_email')}}
     </div>
     @endif
	    {{__('messlog.check_email')}}
    	{{__('messlog.notrecevie_email')}}
     <form class="d-inline" method="POST" action="{{route('verification.resend')}}">
     @csrf
      <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{__('messlog.button')}}</button>.
     </form>
    </div>
   </div>
  </div>
 </div>
</div>
@endsection
