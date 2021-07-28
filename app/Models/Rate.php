<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    public function User()
    {
        return $this->belongsTo("App\Models\User", "user_id", "id");
    }

    public function Book()
    {
        return $this->belongsTo("App\Models\Book", "book_id", "id");
    }

    public function Star()
    {
        return $this->belongsTo("App\Models\Star", "star_id", "id");
    }
}
