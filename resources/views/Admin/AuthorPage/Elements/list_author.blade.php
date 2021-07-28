@foreach ($data_author as $author)
<tr>
    <td>{{$author->id}}</td>
    <td>{{$author->name}}</td>
    <td>{{$author->desc}}</td>
    <td style="width: 214px;">
        <a style="float: left" href="{{URL::to('author/'.$author->id.'/edit')}}"
            class="btn btn-info btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-info-circle"></i>
            </span>
            <span class="text">{{__('message.update_bnt')}}</span>
        </a>
        <a style="float: left" href="{{route('author.destroy',$author->id)}}" class="btn btn-danger btn-icon-split btndelete">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">{{__('message.delete')}}</span>
        </a>
    </td>
</tr>
@endforeach