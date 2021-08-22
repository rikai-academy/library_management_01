<table wire:poll.750ms>
    <tr>
        <th id="items-1"><b>{{__('message.sub_total')}} : {{$sub_total->sum('sub_total')}}</b> </th>
    </tr>
    <tr>
        <th id="items-1"> <a class="button btn_float_right" href="{{route('book_borrow.destroy_all')}}"
                >{{__('message.delete_all')}}</a></th>
    </tr>
</table>