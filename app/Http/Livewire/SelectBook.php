<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class SelectBook extends Component
{
    public $bookSelect = [];
    public $book_id;
    public $newBook = [];
    public $newBook1 = [];

    public function mount()
    {
        $this->bookSelect = Book::all();
        $this->newBook = [
            ['book_id' => '', 'quantity' => 1]
        ];
    }

    public function render()
    {
        info($this->newBook);
        return view('livewire.select-book');
    }

    public function removeBook($index)
    {
        if($index >= 1){
            unset($this->newBook[$index]);
            $this->newBook = array_values($this->newBook);
        }
    }
    
    public function addBook()
    {
        $this->newBook[] = ['book_id' => '', 'quantity' => 1];
    }    
}
