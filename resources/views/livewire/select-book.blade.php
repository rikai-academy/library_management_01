<div>
    @foreach ($newBook as $index => $add_newBook)
    <div class="row mt-3 mb-3">
        <div class="col-5">
            <div class="search_select_box" wire:ignore>
                <label for="formGroupExampleInput">{{__('message.book_borrow')}}</label>
                <select name="newBook[{{$index}}][book_id]" class="form-control custom-select select_book"
                    data-live-search="true" wire:model="newBook.{{$index}}.book_id">
                    <option value="0">{{__('message.select_book')}}</option>
                    @foreach ($bookSelect as $book)
                    <option value='{{$book->id}}'>
                        {{$book->name}} - {{$book->Author->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <span class="text-danger">
                @error('book_id')
                {{$message}}
                @enderror
            </span>
        </div>
        <div class="col-3">
            <label for="formGroupExampleInput">{{__('message.quantity')}}</label>
            <input type="number" class="form-control" name="newBook[{{$index}}][quantity]"
                wire:model="newBook.{{$index}}.quantity" />
        </div>
        <div class="col mt-auto">
            <a wire:click.prevent="removeBook({{$index}})" class="btn btn-danger btn-icon-split btn_float_left">
                <span class="icon text-white-50">
                    <i class="far fa-trash-alt"></i>
                </span>
                <span class="text">{{__('message.delete')}}</span>
            </a>
        </div>
    </div>
    @endforeach

    <a wire:click.prevent="addBook" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
        <i class="fas fa-plus-square fa-sm text-white-50"> </i>
        {{__('message.add_book')}}
    </a>
</div>