<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\BorrowedBook;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BorrowedBookFactory extends Factory
{
    protected $model = BorrowedBook::class;
    

    public function definition()
    {
        return [
            'quantity' => 100,
            'status' => Status::WaitingBook,
            'datetime_borrow' => Carbon::now(),
            'datetime_return' => Carbon::now(),
            'sub_total' => 100000,
        ];
    }
}
