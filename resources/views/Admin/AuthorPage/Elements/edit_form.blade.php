<form class="user" action="{{route('author.update',$author->id)}}" method="POST">
    @method('PUT')
    @csrf   
    @include('Admin.AuthorPage.Elements.message')
    <div class="form-group">
        <input type="text" class="form-control form-control-user" value="" name="name" id="exampleInputEmail" placeholder="{{__('message.input_author')}}">
        <input type="hidden" value="">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.update')}}
    </button>
</form>