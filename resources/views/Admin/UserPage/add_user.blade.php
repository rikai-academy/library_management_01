@extends('Layout.blank_admin')
@section('main')

<div class="col-lg-7 add_form">
    <div class="p-5">
        <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">{{__('message.add_user')}}</h1>
        </div>
        @include('Admin.UserPage.Elements.add_form')
    </div>
</div>
@stop