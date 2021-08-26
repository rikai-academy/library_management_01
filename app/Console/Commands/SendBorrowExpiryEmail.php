<?php

namespace App\Console\Commands;

use App\Enums\Status;
use App\Models\BorrowedBook;
use App\Services\SendMailService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendBorrowExpiryEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->sendMail = new SendMailService; 

    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expDate = Carbon::now()->addDay(3);
        $borrow_expiry =  BorrowedBook::whereDate('datetime_return','<', $expDate)->where('status',Status::Approved)->get();
        
        foreach($borrow_expiry as $expiry){
            $this->sendMail->sendMailExpiry($expiry->User->id,$expiry->User->email,$expiry->id);
        }
    }
}
