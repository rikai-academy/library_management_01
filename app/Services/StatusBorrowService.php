<?php

namespace App\Services;

use App\Enums\Status;
use App\Models\BorrowedBook;

class StatusBorrowService
{

    // return list with status == 1
    public function detail_borrow_book($user_id)
    {
        $data_borrow = BorrowedBook::where([['user_id', $user_id], ['status', Status::Approved]])->get();
        return $data_borrow;
    }

    // return list with status == 2
    public function waiting_book($user_id)
    {
        $data_borrow = BorrowedBook::where([['user_id', $user_id], ['status', Status::WaitingBook]])->get();
        return $data_borrow;
    }

    // return list with status == 3
    public function detail_return($user_id)
    {
        $data_borrow = BorrowedBook::where([['user_id', $user_id], ['status', Status::BookReturn]])->get();
        return $data_borrow;
    }

    // return list with status == 4
    public function accept_book($user_id)
    {
        $data_borrow = BorrowedBook::where([['user_id', $user_id], ['status', Status::BookWaitingAccept]])->get();
        return $data_borrow;
    }
}
