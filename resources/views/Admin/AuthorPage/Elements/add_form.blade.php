<form class="user" action="{{route('author.store')}}" method="POST">
    @csrf
    @include('Admin.AuthorPage.Elements.message')
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="name" id="exampleInputEmail" placeholder="{{__('message.input_author')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="desc" id="exampleInputEmail" placeholder="{{__('message.input_desc_author')}}">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.add_new')}}
    </button>
</form>