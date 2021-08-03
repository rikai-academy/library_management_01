<form class="user" action="{{route('user.update',$user->id)}}" method="POST">
    @method('PUT')
    @csrf
    @include('Admin.UserPage.Elements.message')
    <div class="form-group">
        <input type="text" class="form-control form-control-user" value="" name="cate_name" id="exampleInputEmail"
            placeholder="{{__('message.input_userName')}}">
        <input type="hidden" value="">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.update')}}
    </button>
</form>