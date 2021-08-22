<div class="row">
    <div class="col">
        <label for="formGroupExampleInput">{{__('message.email_user_borrow')}} </label>
        <div class="search_select_box">
            <select name="user_id" class="form-control custom-select" data-live-search="true" wire:model="selectUser">
                <option value="0">{{__('message.select_email')}}</option>
                @foreach ($users as $user)
                <option value="{{$user->id}}">
                    {{$user->email}}
                </option>
                @endforeach
            </select>
            <span class="text-danger">
                @error('user_id')
                {{$message}}
                @enderror
            </span>
        </div>
    </div>
    <div class="col">
        <label for="formGroupExampleInput">{{__('message.full_name')}}</label>
        <input type="text" disabled class="form-control" wire:model="user_name" />
    </div>
</div>