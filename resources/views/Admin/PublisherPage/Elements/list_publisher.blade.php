@foreach ($data_publisher as $publisher)
<tr>
    <td>{{$publisher->id}}</td>
    <td>{{$publisher->name}}</td>
    <td>{{$publisher->desc}}</td>
    <td style="width: 214px;">
        <a style="float: left" href="{{URL::to('publisher/'.$publisher->id.'/edit')}}" class="btn btn-info btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-info-circle"></i>
            </span>
            <span class="text">{{__('message.update_bnt')}}</span>
        </a>
        <a style="float: left" href="{{route('publisher.destroy',$publisher->id)}}" class="btn btn-danger btn-icon-split btndelete">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">{{__('message.delete')}}</span>
        </a>
    </td>
</tr>
@endforeach
