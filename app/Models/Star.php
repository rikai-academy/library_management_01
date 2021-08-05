<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    use HasFactory;

    public function Rate()
    {
        return $this->hasMany("App\Models\Rate", "star_id", "id");
    }
}
