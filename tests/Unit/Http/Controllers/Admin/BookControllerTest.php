<?php

namespace Tests\Unit\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BookController;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Mockery;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Mockery\MockInterface;
use Tests\TestCase;
use Symfony\Component\HttpFoundation\ParameterBag;

class BookControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function test_book_index_page()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user);
        $response = $this->get('admin/book');

        $response->assertStatus(200);
    }

    public function test_store_new_book()
    {
        $user = User::factory()->make();
        $file = UploadedFile::fake()->create('image.jpg');
        $data = [
            'id' => 1,
            'name' => 'Tư Duy Nhanh Và Chậm',
            'quantity' => 1000,
            'image' => $file,
            'desc' => 'Tư duy nhanh và chậm Chúng ta thường tự cho rằng con người là sinh vật có lý trí mạnh mẽ',
            'price' => 15000,
            'tags' => 'tư duy, tư duy nhanh chậm, tư văn duy',
            'publisher_id' => 1,
            'category_id' => 1,
            'author_id' => 1,
        ];

        $this
            ->actingAs($user)
            ->post(route('book.store'), $data)
            ->assertStatus(302)
            ->assertRedirect(route('book.create'))
            ->assertSessionHas('success', __('message.author_success'));
    }

    public function test_update_book()
    {
        $user = User::factory()->make();
        $file = UploadedFile::fake()->create('image.jpg');
        $book_data = Book::factory()->make();

        $data = [
            'name' => 'Tư Duy Nhanh Và Chậm Update',
        ];
        
        $this
            ->actingAs($user)
            ->put(route('book.update',$book_data->id), $data)
            ->assertStatus(302);
    }

    public function test_delete_book()
    {
        $user = User::factory()->make();
        $book_data = Book::factory()->make();

        $this
            ->actingAs($user)
            ->delete(route('book.destroy',$book_data->id))
            ->assertStatus(302)
            ->assertRedirect(route('book.index'))
            ->assertSessionHas('success', __('message.author_success'));
    }
}
