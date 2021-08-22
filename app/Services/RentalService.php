<?php

namespace App\Services;

use App\Enums\Status;
use App\Http\Requests\BorrowRequest;
use App\Models\Book;
use App\Models\BorrowedBook;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;

class RentalService
{

    // Save many record borrow
    public function store_borrow(BorrowRequest $request)
    {
        $date_time = mktime(0, 0, 0, date("m"), date("d") + 10, date("Y"));

        DB::beginTransaction();
        try {
            foreach ($request->newBook as $book) {
                if ($book['book_id'] == 0) {
                    return back()->with('none_select_book', __('message.return_mess_book'));
                } else {
                    $price = Book::where('id', $book['book_id'])->value('price');
                    $borrow_add = DB::table('borrowed_books')->insert(
                        [
                            'user_id' => $request->user_id,
                            'book_id' => $book['book_id'],
                            'quantity' => $book['quantity'],
                            'status' => 5,
                            'datetime_borrow' => Carbon::now(),
                            'datetime_return' => date("Y/m/d H:i:s", $date_time),
                            'sub_total' => $price * $book['quantity'],
                        ]
                    );
                    DB::commit();
                }
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    return $borrow_add;
    }

    // approve many record with status == 2
    public function approve_borrow_book($user_id)
    {
        $data_borrow = BorrowedBook::where([['user_id', $user_id], ['status', Status::WaitingBook]])->get();
        DB::beginTransaction();
        try {
            for ($i = 0; $i < count($data_borrow); $i++) {
                $approve_all = DB::table('borrowed_books')->whereIn('id', [$data_borrow[$i]->id])->where('status', Status::WaitingBook)->update(['status' => Status::Approved]);
                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return $approve_all;
    }

    // approve one record with status == 2
    public function approve($borrow_id)
    {
        $approve = BorrowedBook::where('id', $borrow_id)->where('status', Status::WaitingBook)->update(['status' => Status::Approved]);
        return $approve;
    }

    // destroy one record with status == 2
    public function destroy($borrow_id)
    {
        $destroy = BorrowedBook::destroy($borrow_id);
        return $destroy;
    }

    // change status == 1 to status == 4 (user miss book)
    public function miss_book($borrow_id)
    {
        $miss_book = BorrowedBook::where('id', $borrow_id)->where('status', Status::Approved)->update(['status' =>  Status::BookMiss]);
        return $miss_book;
    }

    // return book one record
    public function return_book($borrow_id)
    {
        $return_book = BorrowedBook::where('id', $borrow_id)->where('status', Status::Approved)->update(['status' => Status::BookReturn]);
        return $return_book;
    }

    // return book many record with user_id
    public function return_book_all($user_id)
    {
        $data_borrow = BorrowedBook::where([['user_id', $user_id], ['status', Status::Approved]])->get();
        DB::beginTransaction();
        try {
            for ($i = 0; $i < count($data_borrow); $i++) {
                $return_all = DB::table('borrowed_books')->whereIn('id', [$data_borrow[$i]->id])->where('status', Status::Approved)->update(['status' => Status::BookReturn]);
                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return $return_all;
    }

    // destroy borrow one record
    public function destroy_borrow($borrow_id)
    {
        $destroy = BorrowedBook::destroy($borrow_id);
        return $destroy;
    }

    // destroy borrow many record
    public function refuse_all($user_id)
    {
        $check_borrow = BorrowedBook::where([['user_id', '=', $user_id], ['status', '=', Status::BookWaitingAccept]])->get();
        DB::beginTransaction();
        try {
            for ($i = 0; $i < count($check_borrow); $i++) {
                $destroy_all = BorrowedBook::whereIn('id', [$check_borrow[$i]->id])->value('id');
                $delete = DB::table('borrowed_books')->delete($destroy_all);
                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return $delete;
    }

    // change status == 5 to status == 1
    public function accept_book_all($user_id)
    {
        $data_borrow = BorrowedBook::where([['user_id', $user_id], ['status', Status::BookWaitingAccept]])->get();

        DB::beginTransaction();
        try {
            for ($i = 0; $i < count($data_borrow); $i++) {
                $return_all = DB::table('borrowed_books')->whereIn('id', [$data_borrow[$i]->id])->where('status', Status::BookWaitingAccept)->update(['status' => Status::Approved]);
                DB::commit();
            }
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
        return $return_all;
    }
}
