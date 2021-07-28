<form class="user" action="{{route('publisher.update',$publisher->id)}}" method="POST">
    @method('PUT')
    @csrf
    @include('Admin.PublisherPage.Elements.message')
    <div class="form-group">
        <input type="text" class="form-control form-control-user" value="" name="name" id="exampleInputEmail" placeholder="{{__('message.input_publisher')}}">
        <input type="hidden" value="">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.update')}}
    </button>
</form>