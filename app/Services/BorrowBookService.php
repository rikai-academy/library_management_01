<?php
namespace App\Services;

use App\Models\Book;
use App\Models\BorrowedBook;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Enums\Status;

Class BorrowBookService{
    public function add_borrow_book($book_id){
        try{
            if(Auth::check()){
                $check_borrow = BorrowedBook::where([['user_id','=',Auth()->id()],['book_id','=',$book_id],['status','=', Status::BookInCart]])->get();

                if(count($check_borrow) > 0){
                    $this->qtyPlus($check_borrow[0]->id,$check_borrow[0]->quantity,$check_borrow[0]->book_id);
                    return redirect(route('book_borrow.index'));
                }else{
                    return $this->add_borrow($book_id);
                }
            }
        }catch (\Throwable $th) {
            return $th;
        }   
    }
    
    private function add_borrow($book_id){

        $price = Book::where('id',$book_id)->value('price');

        $date_time= mktime(0, 0, 0, date("m"), date("d")+10, date("Y"));
    
        $book_borrow['book_id'] = $book_id;
        $book_borrow['user_id'] = auth()->id();
        $book_borrow['quantity'] = 1;
        $book_borrow['status'] = Status::BookInCart;
        $book_borrow['datetime_borrow'] = Carbon::now();
        $book_borrow['datetime_return'] = date("Y/m/d H:i:s", $date_time);
        $book_borrow['sub_total'] = $price *  $book_borrow['quantity'];

        $add_borrow = BorrowedBook::create($book_borrow);
    
        if($add_borrow){
            return redirect(route('book_borrow.index'));
        }else{
            return redirect()->back();
        }
    }

    public function qtyPlus($borrowed_id,$quantity,$book_id){
        $price = Book::where('id',$book_id)->value('price');
        $sub = ($quantity + 1) * $price ;
        $borrowedBook_update = BorrowedBook::where('id',$borrowed_id)->update(['quantity' => $quantity + 1,'sub_total' => $sub]);
        return $borrowedBook_update;
    }

    public function qtyMinus($borrowed_id, $quantity,$book_id){
        $price = Book::where('id',$book_id)->value('price');
        $sub = ($quantity - 1) * $price;
        $borrowedBook_update = BorrowedBook::where('id',$borrowed_id)->update(['quantity' => $quantity - 1,'sub_total' => $sub]);
        
        if($this->checkQuantity($borrowed_id) ==  '0'){
            $this->destroy($borrowed_id);
        }
        return $borrowedBook_update;
    }

    public function rentalBook(){

        $check_borrow = BorrowedBook::where('user_id','=',Auth()->id())->get();
        $date_time= mktime(0, 0, 0, date("m"), date("d")+10, date("Y"));
        $datetime_return =date("Y/m/d H:i:s", $date_time);

        DB::beginTransaction(); 
        try{
            for($i= 0; $i<count($check_borrow) ; $i++){
                DB::table('borrowed_books')->whereIn('id', [$check_borrow[$i]->id])->where('status', Status::BookInCart)->update(['status' => Status::WaitingBook,'datetime_borrow'=> Carbon::now(),'datetime_return' => $datetime_return]);
                DB::commit();
            }
        }catch(Exception $e){
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function destroy($borrow_id){
        
        $borrow_destroy = BorrowedBook::destroy($borrow_id);

        if($borrow_destroy){
            return redirect(route('book_borrow.index'))->with('delete_success',__('message.delete_success'));
        }else{
            return back()->with('fail',__('message.fail'));
        }
    }

    public function destroyAll(){
        $check_borrow = BorrowedBook::where([['user_id','=',Auth()->id()],['status','=',Status::BookInCart]])->get();

        DB::beginTransaction(); 
        try{
            for($i= 0; $i<count($check_borrow) ; $i++){
            $delete_all_borrow_book = BorrowedBook::whereIn('id', [$check_borrow[$i]->id])->value('id');
            $delete = DB::table('borrowed_books')->delete($delete_all_borrow_book);
            DB::commit();
            }
        }catch(Exception $e){
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        if($delete){
            return back()->with('delete_success',__('message.delete_success'));
        }else{
            return back()->with('fail',__('message.fail'));
        }
    }
    
    private function checkQuantity($borrowed_id){
        $quantity = BorrowedBook::where('id',$borrowed_id)->value('quantity');
        return $quantity;
    }
}
