<table wire:poll.750ms>
    <tr>
        <th id="items-1"><b>{{__('message.sub_total')}} : {{$sub_total->sum('sub_total')}}</b> </th>
    </tr>
    <tr>
        <th id="items-1"> <a class="button" href="{{route('book_borrow.destroy_all')}}" style="float: right">{{__('message.delete_all')}}</a></th>
    </tr>
</table>
