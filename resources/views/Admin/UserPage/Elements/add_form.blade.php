<form class="user" action="{{route('user.store')}}" method="POST">
    @csrf
    @include('Admin.UserPage.Elements.message')
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="cate_name" id="exampleInputEmail"
            placeholder="{{__('message.input_userName')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="cate_name" id="exampleInputEmail"
            placeholder="{{__('message.input_email')}}">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.add_new')}}
    </button>
</form>