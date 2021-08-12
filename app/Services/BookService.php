<?php
namespace App\Services;

use App\Models\Book;

Class BookService{

    public function __construct()
    {
        $this->uploadImageService = new UploadImageService; 
    }
    
    public function add_book($request){

        $book_validation = $request->all();

        // Image book
        $book_validation['image'] = $this->uploadImageService->upload_image($request->image);

        $book_save = Book::create($book_validation);

        if($book_save){
            return redirect()->route('book.create')->with('success',__('message.author_success'));
        }else{
            return back()->with('fail',__('message.fail'));
        }
    }

    public function update_book($request,$book_id){
        
        // Get Book
        $book = Book::where('id',$book_id)->get();

        $book_validation = $request->except(['_method', '_token']);

        // check image Book
        if ($request->has('image')) {
            $book_validation['image'] = $this->uploadImageService->upload_image($request->image);
        }else{
            $book_validation['image'] =  $book[0]->image;
        }
        
        $book_save_update = Book::where('id', $book[0]->id)->update($book_validation);

        if($book_save_update){
            return redirect()->route('book.edit', [$book[0]->id])->with('update_success',__('message.update_success') );
        }else{
            return back()->with('fail',__('message.fail'));
        }
    }
}
?>