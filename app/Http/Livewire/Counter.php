<?php

namespace App\Http\Livewire;

use App\Models\BorrowedBook;
use App\Services\BorrowBookService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Counter extends Component
{
    public $borrow_book;
    
    public function __construct()
    {
        $this->borrowBookService = new BorrowBookService; 
    }

    public function qtyPlus($borrow_id){
        $borrow = BorrowedBook::where('id','=', $borrow_id)->get();
        $this->borrowBookService->qtyPlus($borrow[0]->id,$borrow[0]->quantity,$borrow[0]->book_id);
    }

    public function qtyMinus($borrow_id){
        $borrow = BorrowedBook::where('id','=', $borrow_id)->get();
        $this->borrowBookService->qtyMinus($borrow[0]->id,$borrow[0]->quantity,$borrow[0]->book_id);
    }

    public function render()
    {
        $date_borrow = mktime(0, 0, 0, date("m"), date("d")+10, date("Y")); 
        $date_now = Carbon::now();
        $date_return = date("d/m/Y", $date_borrow);
        $total = Auth::user()->BorrowedBook->sum('sub_total');
        return view('Livewire.counter',compact('date_now','date_return','total'));
    }

    public function destroy($borrow_id){
        $this->borrowBookService->destroy($borrow_id);
    }
}
