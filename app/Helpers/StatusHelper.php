<?php

use App\Enums\Status;

function showBorrowStatus($status, $user_id)
{
    $statusElement = "";
    if ($status == Status::Approved) {
        $statusElement .= "<a href='".route('borrow.detail',$user_id)."'class='btn btn-info btn-icon-split btn_float_left'>";
    }elseif ($status == Status::WaitingBook) {
        $statusElement .= "<a href='".route('borrow.waiting',$user_id)."'class='btn btn-info btn-icon-split btn_float_left'>";
    }elseif($status == Status::BookReturn) {
        $statusElement .= "<a href='".route('borrow.detail_return',$user_id)."'class='btn btn-info btn-icon-split btn_float_left'>";
    }elseif ($status == Status::BookWaitingAccept) {
        $statusElement .=  "<a href='".route('borrow.detail_return',$user_id)."'class='btn btn-info btn-icon-split btn_float_left'>";
    }
    return $statusElement;
}
