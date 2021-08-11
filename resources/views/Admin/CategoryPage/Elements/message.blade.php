@if (Session::get('fail'))
<div class="alert alert-danger">
    {{__('message.fail')}}
</div>
@endif
@if (Session::get('success'))
<div class="alert alert-success">
    {{__('message.success')}}
</div>
@endif
@if (Session::get('update_success'))
<div class="alert alert-success">
    {{__('message.update_success')}}
</div>
@endif
@if (Session::get('delete_success'))
<div class="alert alert-success">
    {{__('message.delete_success')}}
</div>
@endif