<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BookExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use App\Services\BookService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class BookController extends Controller
{
    public function __construct()
    {
        $this->bookService = new BookService; 
    }

    public function index()
    {   
        $book_data = Book::orderBy('created_at','DESC')->LoadByNameBook()->get();

        return view('Admin.BookPage.book',compact('book_data'));
    }

    public function create()
    {
        $categories = Category::get();
        $publishers= Publisher::get();
        $authors = Author::get();
        return view('Admin.BookPage.add_book',compact('categories','publishers','authors'));
    }

    public function store(BookRequest $request)
    {
        return $this->bookService->add_book($request);
    }

    public function edit(Book $book)
    {   
        $categories = Category::get();
        $publishers = Publisher::get();
        $authors = Author::get();
        return view('Admin.BookPage.edit_book',compact('categories','publishers','authors','book'));
    }

    public function update(BookRequest $request, $book_id)
    {
        return $this->bookService->update_book($request,$book_id);
    }

    public function destroy(Book $book)
    {
        if($book->Borrowed->count() > 0){
            return back()->with('fail',__('message.fail'));
        }else{
            $book->delete();
            return redirect()->route('book.index')->with('delete_success',__('message.delete_success') );
        }
    }
    
    public function export()
    {
      return Excel::download(new BookExport, 'Book_data.xlsx');
    }
}
