<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{

    protected $model = Book::class;

    public function definition()
    {
        return [
            'id' => 1,
            'name' => 'Tư Duy Nhanh Và Chậm',
            'quantity' => 1000,
            'image' => '1630952496-book.jpg',
            'desc' => 'Tư duy nhanh và chậm Chúng ta thường tự cho rằng con người là sinh vật có lý trí mạnh mẽ',
            'price' => 15000,
            'tags' => 'tư duy, tư duy nhanh chậm, tư văn duy',
            'publisher_id' => 1,
            'category_id' => 1,
            'author_id' => 1,
        ];
    }
}
