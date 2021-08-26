<form class="user" action="{{route('book.update',$book->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf   
    @include('Admin.BookPage.Elements.message')
    
    <div class="row">
        <div class="col">
            <label for="formGroupExampleInput">{{__('message.input_book')}} </label>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="name" value="{{$book->name}}" id="exampleInputEmail" placeholder="{{__('message.input_book')}}">
                <span class="text-danger">
                    @error('name')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <label for="formGroupExampleInput">{{__('message.input_quantity')}} </label>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="quantity" value="{{$book->quantity}}" id="exampleInputEmail" placeholder="{{__('message.input_quantity')}}">
                <span class="text-danger">
                    @error('quantity')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <label for="formGroupExampleInput">{{__('message.desc_book')}} </label>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="desc" value="{{$book->desc}}" id="exampleInputEmail" placeholder="{{__('message.desc_book')}}">
                <span class="text-danger">
                    @error('desc')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <label for="formGroupExampleInput">{{__('message.price')}} </label>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="price" value="{{$book->price}}" id="exampleInputEmail" placeholder="{{__('message.price')}}">
                <span class="text-danger">
                    @error('price')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <label for="formGroupExampleInput">{{__('message.tags')}} </label>
            <div class="form-group">
                <input type="text" data-role="tagsinput" name="tags" value="{{$book->tags}}">
                <span class="text-danger">
                    @error('tags')
                    {{$message}}
                    @enderror
                </span>
            </div>
            <label for="formGroupExampleInput">{{__('message.cate_name')}} </label>
            <div class="form-group">
                <select name="category_id" class="form-control custom-select">
                    @foreach ($categories as $cate)
                        <option value="{{ $cate->id }}"
                            {{ $cate->id == $book->category_id ? 'selected' : '' }}>                          
                            {{ $cate->name }} 
                        </option>                                       
                    @endforeach
                </select>
            </div>
            <label for="formGroupExampleInput">{{__('message.publisher_name')}} </label>
            <div class="form-group">
                <select name="publisher_id" class="form-control custom-select">
                    @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}"
                            {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>
                            {{ $publisher->name }} 
                        </option>                                       
                    @endforeach
                </select>
            </div>
            <label for="formGroupExampleInput">{{__('message.author_name')}} </label>
            <div class="form-group">
                <select name="author_id" class="form-control custom-select">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" 
                            {{ $author->id == $book->author_id ? 'selected' : '' }}>                   
                            {{ $author->name }} 
                        </option>                                       
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="col">
            <img style="width: 205px; height: 275px;" src="{{asset('uploads')}}/{{$book->image}}" id="block" class="rounded mx-auto d-block " alt="...">
            
            <div class="form-group" style="margin: 100px 0px 0px 130px;">
                <input type="file" placeholder="Ảnh đại diện" accept=".png, .jpg, .jpeg, .gif" name="image" value="{{$book->image}}"
                    onchange="loadFile_avt(event)">
                    <span class="text-danger">
                        @error('image')
                        {{$message}}
                        @enderror
                    </span>
            </div>  
        </div>
        
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.update')}}
    </button>
</form>