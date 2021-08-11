<form class="user" action="{{route('publisher.store')}}" method="POST">
    @csrf
    @include('Admin.PublisherPage.Elements.message')
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="name" id="exampleInputEmail" placeholder="{{__('message.input_publisher')}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" name="desc" id="exampleInputEmail" placeholder="{{__('message.input_publisher_desc')}}">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.add_new')}}
    </button>
</form>