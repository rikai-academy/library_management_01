<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'address',
        'phone',
        'image_user',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Role()
    {
        return $this->belongsTo("App\Models\Role", "role_id", "id");
    }

    public function BookFollow()
    {
        return $this->hasMany("App\Models\BookFollow", "user_id", "id");
    }

    public function AuthorFollow()
    {
        return $this->hasMany("App\Models\AuthorFollow", "user_id", "id");
    }

    public function Like()
    {
        return $this->hasMany("App\Models\Like", "user_id");
    }

    public function Comment()
    {
        return $this->hasMany("App\Models\Comment", "user_id", "id");
    }

    public function Rate()
    {
        return $this->hasMany("App\Models\Rate", "user_id", "id");
    }

    public function BorrowedBook()
    {
        return $this->hasMany("App\Models\BorrowedBook", "user_id", "id");
    }

    public function scopeLoadByNameUser($query)
    {
        if($name = request()->name){
            $query = $query->where('name','like','%'.$name.'%');
        }
        return $query;
    }
}