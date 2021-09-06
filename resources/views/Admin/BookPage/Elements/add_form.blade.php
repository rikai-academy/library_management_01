<form class="user" action="{{ route('book.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('Admin.BookPage.Elements.message')

    <div class="row">
        <div class="col">
            <label for="formGroupExampleInput">{{__('message.input_book')}} </label>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="name" value="{{ old('name') }}"
                    id="exampleInputEmail" placeholder="{{ __('message.input_book') }}">
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <label for="formGroupExampleInput">{{__('message.input_quantity')}} </label>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="quantity" value="{{ old('quantity') }}"
                    id="exampleInputEmail" placeholder="{{ __('message.input_quantity') }}">
                <span class="text-danger">
                    @error('quantity')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <label for="formGroupExampleInput">{{__('message.desc_book')}} </label>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="desc" value="{{ old('desc') }}"
                    id="exampleInputEmail" placeholder="{{ __('message.desc_book') }}">
                <span class="text-danger">
                    @error('desc')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <label for="formGroupExampleInput">{{__('message.price')}} </label>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" name="price" value="{{ old('price') }}"
                    id="exampleInputEmail" placeholder="{{ __('message.price') }}">
                <span class="text-danger">
                    @error('price')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <label for="formGroupExampleInput">{{__('message.tags')}} </label>
            <div class="form-group">
                <input type="text" data-role="tagsinput" name="tags">
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
                        <option value="{{ $cate->id }}">
                            {{ $cate->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <label for="formGroupExampleInput">{{__('message.publisher_name')}} </label>
            <div class="form-group">
                <select name="publisher_id" class="form-control custom-select">
                    @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}">
                            {{ $publisher->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <label for="formGroupExampleInput">{{__('message.author_name')}} </label>
            <div class="form-group">
                <select name="author_id" class="form-control custom-select">
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">
                            {{ $author->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS3OXgWzMBVC6ziWEHT2J9k6uxhpo85z9bqeg&usqp=CAU"
                id="block" class="rounded mx-auto d-block image_add_book" alt="...">
            <div class="form-group button_image">
                <input type="file" placeholder="Ảnh đại diện" accept=".png, .jpg, .jpeg, .gif" name="image"
                    onchange="loadFile_avt(event)">
            </div>
        </div>

    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{ __('message.add_new') }}
    </button>
</form>
