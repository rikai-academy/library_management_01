<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\Book;
use App\Models\BorrowedBook;
use App\Services\BorrowBookService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookBorrowController extends Controller
{
    public function __construct()
    {
        $this->borrowBookService = new BorrowBookService; 
    }
    
    public function index()
    {
        $data_borrow = BorrowedBook::where([['user_id','=',Auth()->id()],['status','=', Status::BookInCart]])->get();
        return view('layouts.user.rental',compact('data_borrow'));
    }

    public function store($book_id)
    {
        return $this->borrowBookService->add_borrow_book($book_id);
    }

    public function update()
    {
        return $this->borrowBookService->rentalBook();
    }

    public function destroy_all()
    {
        return $this->borrowBookService->destroyAll();
    }
}
