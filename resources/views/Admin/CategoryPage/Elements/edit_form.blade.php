<form class="user" action="{{route('category.update',$category->id)}}" method="POST">
    @method('PUT')
    @csrf
    @include('Admin.CategoryPage.Elements.message')
    <div class="form-group">
        <input type="text" class="form-control form-control-user" value="{{$category->name}}" name="name" id="exampleInputEmail" placeholder="{{__('message.input_cate')}}">
        <input type="hidden" name="id" value="{{$category->id}}">
        <span class="text-danger">
            @error('name')
            {{$message}}
            @enderror
        </span>
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" value="{{$category->desc}}" name="desc" id="exampleInputEmail" placeholder="{{__('message.input_desc_cate')}}">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.update')}}
    </button>
</form>