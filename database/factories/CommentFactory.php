<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'desc_comment' => Str::random(15),
        ];
    }
}
