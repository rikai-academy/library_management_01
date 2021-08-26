<?php

namespace App\Services;

use App\Enums\Status;
use App\Models\BorrowedBook;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class SendMailService
{
    public function sendMail($user_id, $status){

        $user_data = User::where('id',$user_id)->get();

        if($status == Status::WaitingBook){
            $data_borrow = BorrowedBook::where([['user_id','=',$user_id],['status','=',Status::WaitingBook]])->get();
            $mess_email = __('message.mess_email_waiting');
            $attention = '';
        }elseif($status == Status::Approved){
            $data_borrow = BorrowedBook::where([['user_id','=',$user_id],['status','=',Status::Approved]])->get();
            $mess_email = __('message.mess_email_approve');
            $attention = __('message.attention');
        }elseif($status == Status::Reject){
            $data_borrow = BorrowedBook::where([['user_id','=',$user_id],['status','=',Status::Reject]])->get();
            $mess_email = __('message.mess_email_reject');
            $attention = '';
        }

        $data = [
            'name' => $user_data[0]->name,
            'data_borrow' => $data_borrow,
            'mess_email' => $mess_email,
            'attention' => $attention,
        ];

        Mail::send('Email.thanks_mail', $data, function ($message) use ($user_data){
            $message->from('levii.reys@gmail.com', 'LIBRARY ĐN');
            $message->to($user_data[0]->email);
            $message->subject('Subject');
        });
    }
    public function sendMailExpiry($user_id, $user_email,$borrow_id){

        $data_borrow = BorrowedBook::where('id',$borrow_id)->get();
        $user_data = User::where('id',$user_id)->get();
        
        $data = [
            'date_return' => $data_borrow[0]->datetime_return,
            'name'=> $user_data[0]->name,
            'attention'=> __('message.attention2'),
            'data_borrow'=> $data_borrow,
        ];

        Mail::send('Email.borrow_email', $data, function ($message) use ($user_email){
            $message->from('levii.reys@gmail.com', 'LIBRARY ĐN');
            $message->to($user_email);
            $message->subject('Subject');
        });
    }
}