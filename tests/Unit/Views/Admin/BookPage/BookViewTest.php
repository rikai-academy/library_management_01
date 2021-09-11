<?php

namespace Tests\Unit\Views\Admin\BookPage;

use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BookViewTest extends TestCase
{
    use DatabaseMigrations;

    public function test_index_view()
    {
        $book_data = Book::factory()->make();

        $user = User::factory()->make();

        $this->actingAs($user);
        $this
            ->get('/admin/book')
            ->assertSee('name', $book_data->name)
            ->assertStatus(200);
    }

    public function test_create_view()
    {
        $user = User::factory()->make();

        $this->actingAs($user);
        $this
            ->get('admin/book/create')
            ->assertStatus(200);
    }

    public function test_update_view()
    {
        $book_data = Book::factory()->make();
        $user = User::factory()->make();

        $this->actingAs($user);
        $this
            ->get(route('book.edit',$book_data->id))
            ->assertSee('name', $book_data->name);
    }
}
