<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class UserSelect extends Component
{
    public $selectUser;
    public $user_name;

    public function render()
    {
        $users = User::get();
        return view('livewire.user-select',compact('users'));
    }

    public function updatedSelectUser($user_id){
        $this->user_name = User::where('id',$user_id)->value('name');

    }
}
