@extends('Layout.blank_admin');

@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    @if (isset($searchResults))
                        @if ($searchResults->isEmpty())
                            <h2>{{ __('message.search_title_sr') }}<b>"{{ $search_term }}"</b>.</h2>
                        @else
                            <h2>{{ __('message.count_search') }}{{ $searchResults->count() }}
                                {{ __('message.search_key') }}<b>"{{ $search_term }}"</b>
                            </h2>
                            <hr />
                            @foreach ($searchResults->groupByType() as $type => $modelSearchResults)
                                <h2>{{ $type }}</h2>
                                <ul>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary" style="float: left;">
                                                {{ __('message.data_table') }}</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('message.stt') }}</th>
                                                            <th>{{ __('message.author_name') }}</th>
                                                            <th>{{ __('message.action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($modelSearchResults as $searchResult)
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $searchResult->title }}</td>
                                                                <td class="btn_search">
                                                                    <a href="{{ $searchResult->url }}"
                                                                        class="btn btn-info btn-icon-split btn_float_left">
                                                                        <span class="icon text-white-50">
                                                                            <i class="fas fa-info-circle"></i>
                                                                        </span>
                                                                        <span
                                                                            class="text">{{ __('message.detail_search') }}</span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </ul>
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop
