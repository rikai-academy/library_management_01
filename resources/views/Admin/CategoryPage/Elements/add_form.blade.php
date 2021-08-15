<form class="user" action="{{route('category.store')}}" method="POST">
    @include('Admin.CategoryPage.Elements.message')
     @csrf
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="name" value="{{old('name')}}" id="exampleInputEmail" placeholder="{{__('message.input_cate')}}">
        <span class="text-danger">
            @error('name')
            {{$message}}
            @enderror
        </span>
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="desc" id="exampleInputEmail" placeholder="{{__('message.desc_cate')}}">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.add_new')}}
    </button>
</form>