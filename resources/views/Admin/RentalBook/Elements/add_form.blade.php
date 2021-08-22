<form class="user" action="{{route('borrow.store')}}" method="POST">
    @csrf
    @include('Admin.RentalBook.Elements.message')
    <div class="form-group">
        @livewire('user-select')
        @livewire('select-book')
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.add_new')}}
    </button>
</form>