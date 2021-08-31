@extends('Layout.blank_admin');

@section('main')
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{__('message.book_waiting')}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_waiting_return}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                {{__('message.book_waiting_return')}}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_approve}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Sách Đang Có</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$count_book}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->

    </div>

    <!-- Content Row -->

    <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{__('message.statistic_table')}}</h6>

                <form action="{{ route('statistic.index') }}" method="GET">
                    <div class="form-inline">
                        <label for="formGroupExampleInput">{{ __('message.select_date') }}</label>
                        <input class="form-control" name="day" type="text" placeholder="{{ __('message.date_1') }}"
                            id="datepicker" value="{{request()->day}}">
                        <label class="mr-2 ml-2" for="formGroupExampleInput">{{ __('message.to') }}</label>
                        <input class="form-control" name="today" type="text" placeholder="{{ __('message.date_2') }}"
                            id="datepicker2" value="{{request()->today}}">
                        <input type="submit" value=" {{ __('message.approve') }}"
                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-2">
                    </div>
                </form>

                <form action="" method="GET">
                    <div class="form-inline mb-auto">
                        <label for="formGroupExampleInput">{{ __('message.book_borrow') }}</label>
                        <select name="select_day" class="form-control custom-select select_book">
                            <option value="7">{{__('message.one_week')}}</option>
                            <option value="30">{{__('message.one_month')}}</option>
                            <option value="365">{{__('message.one_year')}}</option>
                        </select>
                    </div>
                </form>

                <div class="form-inline mb-auto">
                    <a onclick="updateChart_return()"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-book-open"></i>
                        </span>
                        <span class="text">{{ __('message.statistic_return') }}</span>
                    </a>
                    <a onclick="updateChart()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-2">
                        <span class="icon text-white-50">
                            <i class="fas fa-book-open"></i>
                        </span>
                        <span class="text">{{ __('message.statistic_borrow') }}</span>
                    </a>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body h-100">
                <div class="chart-area h-100">
                    <canvas id="canvas" style="height:50vh; width:80vw"></canvas>
                </div>
            </div>
        </div>
    </div>
    @if (isset($datetime_return))
        <script>
            var date_time = <?php echo $datetime_return; ?>;
            var quantity = <?php echo $count_quantity_book_return; ?>;
            var sum_price = <?php echo $sum_price_book_return; ?>;
            var quantity_borrow = <?php echo $count_quantity_book_borrow; ?>;
            var sum_price_borrow = <?php echo $sum_price_book_borrow; ?>;
            var url = "{{url('admin/statistic/{day_select}')}}";
        </script>
    @endif
@stop
