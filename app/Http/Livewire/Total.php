<?php

namespace App\Http\Livewire;

use App\Models\BorrowedBook;
use App\Services\BorrowBookService;
use Livewire\Component;

class Total extends Component
{
    public $sub_total;
    
    public function __construct()
    {
        $this->borrowBookService = new BorrowBookService; 
    }
    
    public function render()
    {
        return view('livewire.total');
    }
}
