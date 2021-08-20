<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
