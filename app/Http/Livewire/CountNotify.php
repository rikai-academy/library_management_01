<?php

namespace App\Http\Livewire;

use App\Models\Notification;
use Livewire\Component;

class CountNotify extends Component
{   

    public function reload(){
        $this->emit('refreshLoadNotify');
    }

    
    public function render()
    {
        $count_notify = Notification::count();
        return view('livewire.count-notify', compact('count_notify'));
    }
}
