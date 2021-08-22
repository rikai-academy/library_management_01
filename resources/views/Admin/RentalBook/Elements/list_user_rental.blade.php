@foreach ($data_borrow as $borrow)
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$borrow->Book->name}}</td>
    <td>{{$borrow->quantity}}</td>
    <td>{{$borrow->datetime_borrow}}</td>
    <td>{{$borrow->datetime_return}}</td>
    <td>{{$borrow->sub_total}}</td>

    @if ($status == 1)
    <td class="td_status_1">
        <a href="{{route('borrow.return_book',$borrow->id)}}" class="btn btn-success btn-icon-split btn_float_left">
            <span class="icon text-white-50">
                <i class="fas fa-exchange-alt"></i>
            </span>
            <span class="text">{{__('message.return')}}</span>
        </a>
        <a href="{{route('borrow.miss_book',$borrow->id)}}" class="btn btn-secondary btn-icon-split btn_float_left">
            <span class="icon text-white-50">
                <i class="fas fa-book-open"></i>
            </span>
            <span class="text">{{__('message.miss')}}</span>
        </a>
    </td>

    @elseif( $status == 2)
    <td class="td_status_2">
        <a href="{{route('borrow.approve_book',$borrow->id)}}" class="btn btn-success btn-icon-split btn_float_left">
            <span class="icon text-white-50">
                <i class="fas fa-clipboard-check"></i>
            </span>
            <span class="text">{{__('message.approve')}}</span>
        </a>
        <a href="{{route('borrow.destroy',$borrow->id)}}" class="btn btn-danger btn-icon-split btn_float_left">
            <span class="icon text-white-50">
                <i class="far fa-trash-alt"></i>
            </span>
            <span class="text">{{__('message.refuse')}}</span>
        </a>
    </td>

    @elseif( $status == 3)
    <td class="td_status_3">
        <a href="#" class="btn btn-outline-secondary btn-icon-split btn_float_left">
            <span class="icon text-white-50">
                <i class="fas fa-smile"></i>
            </span>
            <span class="text">{{__('message.book_borrow_return_end')}}</span>
        </a>
    </td>

    @elseif( $status == 5)
    <td class="td_status_5">
        <a href="{{route('borrow.destroy_borrow',$borrow->id)}}" class="btn btn-danger btn-icon-split btn_float_left">
            <span class="icon text-white-50">
                <i class="far fa-trash-alt"></i>
            </span>
            <span class="text">{{__('message.delete')}}</span>
        </a>
    </td>
    @endif
</tr>
@endforeach

@isset($borrow->User->name)
<h4><span class="badge badge-dark">{{__('message.user_rental')}}</span><i
        class="far fa-hand-point-right ml-2 mr-2"></i><span class="badge badge-info">{{$borrow->User->name}} -
        {{$borrow->User->email}}</span></h4>
@endisset

@isset($borrow->User->id)
@if ($status == 1)
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
        <td class=".td__1">
            <a href="{{route('borrow.return_all',$borrow->User->id)}}"
                class="btn btn-primary btn-icon-split btn_float_right">
                <span class="icon text-white-50">
                    <i class="fas fa-exchange-alt"></i>
                </span>
                <span class="text">{{__('message.return_all')}}</span>
            </a>
        </td>
    </tr>
</table>
@endif
@if ($status == 2)
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
        <td class=".td__2">
            <a href="{{route('borrow.approve',$borrow->User->id)}}"
                class="btn btn-success btn-icon-split btn_float_right">
                <span class="icon text-white-50">
                    <i class="fas fa-clipboard-check"></i>
                </span>
                <span class="text">{{__('message.approve_all')}}</span>
            </a>
        </td>
    </tr>
</table>
@endif
@if ($status == 5)

<table class="table table-dark" id="dataTable" width="100%" cellspacing="0">
    <tr>
        <td class="td_float_right">
            <h4><span class="badge badge-light">{{$sub_total}}</span></h4>
        </td>
        <td class="td_float_right">
            <h4><span class="badge badge-light">{{__('message.sub_total')}}</span></h4>
        </td>
    </tr>
</table>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <tr>
        <td class="td__2">
            @if(isset($borrow->User->id))
            <a href="{{route('borrow.accept_book_all',$borrow->User->id)}}" @endif
                class="btn btn-success btn-icon-split btn_float_left">
                <span class="icon text-white-50">
                    <i class="fas fa-clipboard-check"></i>
                </span>
                <span class="text">{{__('message.approve_all')}}</span>
            </a>
        </td>
        <td class="td__1">
            <a href="{{route('borrow.refuse_all',$borrow->User->id)}}"
                class="btn btn-danger btn-icon-split btn_float_left">
                <span class="icon text-white-50">
                    <i class="fas fa-recycle"></i>
                </span>
                <span class="text">{{__('message.refuse_all')}}</span>
            </a>
        </td>
    </tr>
</table>
@endif
@endisset