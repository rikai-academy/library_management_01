@extends('Layout.blank_admin')

@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    @if ($status == 1)
        <h1 class="h3 mb-2 text-gray-800">{{__('message.user_borrow')}}</h1>
    @elseif ($status == 2)
        <h1 class="h3 mb-2 text-gray-800">{{__('message.user_borrow_waiting')}}</h1>
    @elseif ($status == 3)
        <h1 class="h3 mb-2 text-gray-800">{{__('message.user_borrow_return')}}</h1>
    @endif
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary btn_float_left">{{__('message.data_table')}}</h6>
            <a href="{{route('publisher.create')}}" class="btn btn-primary btn-icon-split btn_float_right">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">{{__('message.add_new')}}</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('Admin.RentalBook.Elements.search_rental_form')
                @include('Admin.RentalBook.Elements.message')
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{__('message.stt')}}</th>
                            <th>{{__('message.user_name')}}</th>
                            <th>{{__('message.user_email')}}</th>
                            <th>{{__('message.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('Admin.RentalBook.Elements.list_rental')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"></h1>
        <a href="{{route('publisher.export')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-download fa-sm text-white-50"> </i>
            {{__('message.export_excel')}}
        </a>
    </div>
</div>
<!-- /.container-fluid -->
<form method="POST" action="" id="form-delete">
    @csrf @method('DELETE')
</form>
@stop