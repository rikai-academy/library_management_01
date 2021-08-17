<tr>
    <td><img src="css/images/image02.jpg" alt="" id="rental-img"></td>
    <td>{{$borrow_book->book->name}}</td>
    <td wire:poll.0.000000000001s>
        <input type='button' value='-' class='qtyminus' wire:click="qtyMinus('{{$borrow_book->id}}')" />
        <input type='text' name='quantity' value='{{$borrow_book->quantity}}' class='qty' />
        <input type='button' value='+' class='qtyplus' wire:click="qtyPlus({{$borrow_book->id}})" />
    </td>
    <td>
        <span name="birthdaytime">{{$date_now->format('d/m/Y')}}</span>
    </td>
    <td>
        <span name="birthdaytime">{{$date_return}}</span>
    </td>
    <td>{{$borrow_book->book->price}}</td>
    <td>{{$borrow_book->sub_total}}</td>
    <td>
        <a style="float: left" href="" class="btn btn-danger btn-icon-split btndelete"
            wire:click.prevent="destroy('{{$borrow_book->id}}')">
            <span class="icon text-white-50">
                <i class="fas fa-trash"></i>
            </span>
            <span class="text">{{__('message.delete')}}</span>
        </a>
    </td>
</tr>