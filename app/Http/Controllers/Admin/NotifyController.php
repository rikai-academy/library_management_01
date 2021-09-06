<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function index()
    {
        $data_notifications =  Notification::orderBy('created_at', 'DESC')->get();
        return view('Admin.Notification.notify', compact('data_notifications'));
    }

    public function destroy($notify_id){
        $notify_destroy = Notification::destroy($notify_id);

        if($notify_destroy){
            return redirect(route('notify.index'))->with('delete_success',__('message.delete_success'));
        }else{
            return back()->with('fail',__('message.fail'));
        }
    }
}
