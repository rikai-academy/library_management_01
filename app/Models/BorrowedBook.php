<?php

namespace App\Models;

use App\Enums\Status;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BorrowedBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'quantity',
        'status',
        'datetime_borrow',
        'datetime_return',
        'sub_total',
    ];

    public function Book()
    {
        return $this->belongsTo("App\Models\Book", "book_id", "id");
    }

    public function User()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function scopeExpirationBorrow($query)
    {
        $expDate = Carbon::now()->addDay(11);
        $query =  $query->whereDate('datetime_return', '<', $expDate)->where('status', Status::Approved)->get();
        return $query;
    }

    public function scopeCountQuantityBookReturn($query, $time)
    {
        return $query->where([['datetime_return', '=', $time], ['status', '=', Status::BookReturn]])->sum('quantity');
    }
    public function scopeSumPriceBookReturn($query, $time)
    {
        return $query->where([['datetime_return', '=', $time], ['status', '=', Status::BookReturn]])->sum('sub_total');
    }
    public function scopeCountQuantityBookBorrow($query, $time)
    {
        return $query->where([['datetime_return', '=', $time], ['status', '=', Status::Approved]])->sum('quantity');
    }
    public function scopeSumPriceBookBorrow($query, $time)
    {
        return $query->where([['datetime_return', '=', $time], ['status', '=', Status::Approved]])->sum('sub_total');
    }
    public function scopeLoadDayToDay($query ,$day, $today)
    {
        return $query->distinct() ->orderBy('datetime_return', 'asc')->whereBetween('datetime_return', [$day, $today]) ->pluck('datetime_return')->toArray();
    }
}
