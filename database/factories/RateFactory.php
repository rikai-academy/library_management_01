<?php

namespace Database\Factories;

use App\Models\Rate;
use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    protected $model = Rate::class;

    public function definition()
    {
        return [
            'star_id' => 1500,
        ];
    }
}
