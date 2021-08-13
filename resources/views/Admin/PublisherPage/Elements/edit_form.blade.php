<form class="user" action="{{route('publisher.update',$publisher->id)}}" method="POST">
    @method('PUT')
    @csrf
    @include('Admin.PublisherPage.Elements.message')
    <div class="form-group">
        <input type="text" class="form-control form-control-user" value="{{$publisher->name}}" name="name" id="exampleInputEmail" placeholder="{{__('message.input_publisher')}}">
        <input type="hidden" name="id" value="{{$publisher->id}}">
    </div>
    <div class="form-group">
        <input type="text" class="form-control form-control-user" value="{{$publisher->desc}}" name="desc" id="exampleInputEmail" placeholder="{{__('message.input_publisher')}}">
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        {{__('message.update')}}
    </button>
</form>