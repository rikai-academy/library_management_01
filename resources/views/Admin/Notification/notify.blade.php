@extends('Layout.blank_admin')
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <!-- DataTales Example -->
        <div class="card shadow mb-4 col-8 m-auto">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="float: left;">{{ __('message.notify') }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @include('Admin.AuthorPage.Elements.message')
                    @foreach ($data_notifications as $data_notify)
                        <div class="card">
                            <div class="card-body dropdown-item d-flex align-items-center">
                                <div class="col-11">
                                    <div class="small text-gray-500">{{ $data_notify->created_at }}</div>
                                    <span class="font-weight-bold">{{ $data_notify->User->name }}</span>
                                    <span class="font">{{ $data_notify->title }}</span>
                                </div>
                                <a href="{{route('notify.destroy',$data_notify->id)}}" class="btn btn-danger btn-icon-split btndelete">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                    <span class="text">{{__('message.delete')}}</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <form method="POST" action="" id="form-delete">
        @csrf @method('DELETE')
    </form>
@stop
