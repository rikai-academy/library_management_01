<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
    ];

    public function Book()
    {
        return $this->hasMany("App\Models\Book", "publisher_id", "id");
    }

    public function scopeLoadByNamePublisher($query)
    {
        if($name = request()->name){
            $query = $query->where('name','like','%'.$name.'%');
        }
        return $query;
    }
}
