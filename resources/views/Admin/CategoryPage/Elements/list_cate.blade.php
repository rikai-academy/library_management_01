@foreach ($data_cate as $cate)
<tr>
    <td>{{$cate->id}}</td>
    <td>{{$cate->name}}</td>
    <td>{{$cate->desc}}</td>
    <td style="width: 214px;">
        <a style="float: left" href="{{URL::to('category/'.$cate->id.'/edit')}}"
            class="btn btn-info btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-info-circle"></i>
            </span>
            <span class="text">{{__('message.update_bnt')}}</span>
        </a>
        <a style="float: left" href="{{route('category.destroy',$cate->id)}}"  class="btn btn-danger btn-icon-split btndelete">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">{{__('message.delete')}}</span>
        </a>
    </td>
</tr>
@endforeach
