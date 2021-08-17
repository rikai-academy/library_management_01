@foreach ($data_borrow as $borrow)
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$borrow->User->name}}</td>
    <td>{{$borrow->User->email}}</td>

    <td class="td_btn_list">
        {!!showBorrowStatus($status,$borrow->User->id)!!}
        <span class="icon text-white-50">
            <i class="fas fa-info-circle"></i>
        </span>
        <span class="text">{{__('message.detail')}}</span>
        </a>
    </td>
</tr>
@endforeach