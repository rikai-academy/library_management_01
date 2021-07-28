<form class="user" action="{{route('book.store')}}" method="POST">
    @csrf
    @include('Admin.BookPage.Elements.message')
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="name" id="exampleInputEmail"
            placeholder="{{__('message.input_book')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="desc" id="exampleInputEmail"
            placeholder="{{__('message.input_desc_book')}}">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.add_new')}}
    </button>
</form>