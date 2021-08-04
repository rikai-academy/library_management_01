@if (Session::get('fail'))
<div class="alert alert-danger">
    {{__('messages.fail')}}
</div>
@endif
@if (Session::get('success'))
<div class="alert alert-success">
    {{__('messages.cate_success')}}
</div>
@endif