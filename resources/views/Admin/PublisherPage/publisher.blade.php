@extends('Layout.blank_admin');

@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{__('message.author_list')}}</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary" style="float: left;">{{__('message.data_table')}}</h6>
            <a style="float: right" href="" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-flag"></i>
                </span>
                <span class="text">{{__('message.add_new')}}</span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{__('message.id')}}</th>
                            <th>{{__('message.publisher_name')}}</th>
                            <th>{{__('message.desc')}}</th>
                            <th>{{__('message.action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @include('Admin.PublisherPage.Elements.list_publisher')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@stop