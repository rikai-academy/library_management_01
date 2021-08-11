<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
    ];

    public function Book()
    {
        return $this->hasMany("App\Models\Book", "category_id", "id");
    }
    public function scopeLoadByNameCate($query)
    {
        if($name = request()->name){
            $query = $query->where('name','like','%'.$name.'%');
        }
        return $query;
    }
}
