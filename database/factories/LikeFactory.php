<?php

namespace Database\Factories;

use App\Models\Like;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    protected $model = Like::class;
   
    public function definition()
    {

        return [
            'count_like' => 10,
        ];
    }
}
