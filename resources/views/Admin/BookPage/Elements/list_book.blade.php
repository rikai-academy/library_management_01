@foreach ($book_data as $book)
<tr>
    <td>{{$book->id}}</td>
    <td>{{$book->name}}</td>
    <td>{{$book->quantity}}</td>
    <td>{{$book->price}}</td>
    <td>{{$book->publisher->name}}</td>
    <td>{{$book->category->name}}</td>
    <td>{{$book->author->name}}</td>
    <td><img style="width: 50px; height: 50px;" src="{{url('public/uploads/')}}/{{$book->image}}" alt=""></td> 
    <td style="width: 214px;">
        <a style="float: left" href="{{URL::to('book/'.$book->id.'/edit')}}"
            class="btn btn-info btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-info-circle"></i>
            </span>
            <span class="text">{{__('message.update_bnt')}}</span>
        </a>
        <a style="float: left" href="{{route('book.destroy',$book->id)}}" class="btn btn-danger btn-icon-split btndelete">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">{{__('message.delete')}}</span>
        </a>
    </td>
</tr>
@endforeach

