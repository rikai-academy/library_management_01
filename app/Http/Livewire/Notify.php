<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class Notify extends Component
{
    public $reload;

    protected $listeners = ['refreshLoadNotify' => '$refresh'];

    public function mount()
    {
        $this->reload = Notification::get();
    }

    public function loadNotify()
    {
        return Notification::orderBy('created_at','DESC')->get();
    }

    public function destroy($id){
        return Notification::where(['id', '=',  $id])->destroy();
    }

    public function updateStatus($id)
    {
       return Notification::where([['id', '=',  $id],['status', '=', 0]])->update(['status' => 1]);
    }

    public function render()
    {
        $data = $this->loadNotify();
        return view('livewire.notify', compact('data'));
    }
}
