<?php

namespace App\Services;

use App\Enums\Status;
use App\Models\BorrowedBook;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Mail;

class SendMailService
{
    public function sendMail($user_id, $status)
    {

        $user_data = User::where('id', $user_id)->get();

        if ($status == Status::WaitingBook) {
            $data_borrow = BorrowedBook::where([['user_id', '=', $user_id], ['status', '=', Status::WaitingBook]])->get();
            $mess_email = __('message.mess_email_waiting');
            $attention = '';
        } elseif ($status == Status::Approved) {
            $data_borrow = BorrowedBook::where([['user_id', '=', $user_id], ['status', '=', Status::Approved]])->get();
            $mess_email = __('message.mess_email_approve');
            $attention = __('message.attention');
        } elseif ($status == Status::Reject) {
            $data_borrow = BorrowedBook::where([['user_id', '=', $user_id], ['status', '=', Status::Reject]])->get();
            $mess_email = __('message.mess_email_reject');
            $attention = '';
        }

        $data = [
            'name' => $user_data[0]->name,
            'data_borrow' => $data_borrow,
            'mess_email' => $mess_email,
            'attention' => $attention,
        ];

        $email_to = env("MAIL_USERNAME");

        Mail::send('Email.thanks_mail', $data, function ($message) use ($user_data, $email_to) {
            $message->from($email_to, 'LIBRARY ĐN');
            $message->to($user_data[0]->email);
            $message->subject(__('message.subject'));
        });
    }

    public function sendMailComment($user_data, $book_id)
    {
        for ($i = 0; $i < count($user_data); $i++) {
            $user[] = User::where('id', $user_data[$i]->user_id)->get();
        }
        for ($i = 0; $i < count($user); $i++) {
            $data = [
                'name' => $user[$i][0]->name,
                'title' => __('message.new_comment'),
                'book_id' => $book_id,
            ];
            $email_to = env("MAIL_USERNAME");

            Mail::send('Email.comment_email', $data, function ($message) use ($user, $i, $email_to) {
                $message->from($email_to, 'LIBRARY ĐN');
                $message->to($user[$i][0]->email);
                $message->subject(__('message.subject'));
            });
        }
    }
    public function sendMailExpiry($user_id, $user_email, $book_id)
    {
        $user_data = User::where('id', $user_id)->get();
        $data_borrow = BorrowedBook::where([['user_id', '=', $user_id], ['status', '=', Status::Approved]])->get();
        $mess_email = __('message.mess_email_approve');
        $attention = __('message.attention');

        $data = [
            'name' => $user_data[0]->name,
            'data_borrow' => $data_borrow,
            'mess_email' => $mess_email,
            'attention' => $attention,
            'date_return' => $data_borrow[0]->datetime_return,
        ];

        $email_to = env("MAIL_USERNAME");

        Mail::send('Email.borrow_email', $data, function ($message) use ($user_email, $email_to) {
            $message->from($email_to, 'LIBRARY ĐN');
            $message->to($user_email);
            $message->subject(__('message.subject'));
        });
    }
}
