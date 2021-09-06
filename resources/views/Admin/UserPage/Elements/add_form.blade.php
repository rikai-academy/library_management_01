<form class="user" action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('Admin.UserPage.Elements.message') 
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="name" value="{{old('name')}}" id="exampleInputEmail" placeholder="{{__('message.name_user')}}">
                    <span class="text-danger">
                        @error('name')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="email" value="{{old('email')}}" id="exampleInputEmail" placeholder="{{__('message.email_user')}}">
                    <span class="text-danger">
                        @error('email')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="phone" value="{{old('phone')}}" id="exampleInputEmail" placeholder="{{__('message.phone_user')}}">
                    <span class="text-danger">
                        @error('phone')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" name="address" value="{{old('address')}}" id="exampleInputEmail" placeholder="{{__('message.address_user')}}">
                    <span class="text-danger">
                        @error('address')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password" value="{{old('password')}}" id="exampleInputEmail" placeholder="{{__('message.password')}}">
                    <span class="text-danger">
                        @error('password')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password_confirmation" value="{{old('password_confirmation')}}" id="exampleInputEmail" placeholder="{{__('message.password_conf')}}">
                    <span class="text-danger">
                        @error('password_confirmation')
                        {{$message}}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <select name="role_id" class="form-control custom-select">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">
                                {{ $role->role_name }} 
                            </option>                                       
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col">
                <img src="{{ secure_asset('uploads/none-avatar.jpg')}}" id="block" class="rounded mx-auto d-block image_add_user" alt="...">
                <div class="form-group button_image_user">
                    <input type="file" placeholder="Ảnh đại diện" accept=".png, .jpg, .jpeg, .gif" name="image_user"
                        onchange="loadFile_avt(event)">
                </div>  
            </div>
        
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            {{__('message.add_new')}}
        </button>
</form>
