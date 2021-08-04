<form class="user" action="{{route('category.store')}}" method="POST">
    @csrf
    @include('Admin.CategoryPage.Elements.message')
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="cate_name" id="exampleInputEmail"
            placeholder="{{__('message.input_cate')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="cate_name" id="exampleInputEmail"
            placeholder="{{__('message.input_desc_cate')}}">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.add_new')}}
    </button>
</form>