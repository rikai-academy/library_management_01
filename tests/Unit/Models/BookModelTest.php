<?php

namespace Tests\Unit\Models;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookFollow;
use App\Models\BorrowedBook;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use App\Models\Publisher;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class BookModelTest extends TestCase
{
    use DatabaseMigrations;
    
    public function test_book_be_longs_to_categories()
    {
        $categories = Category::factory()->make();
        $book = Book::factory()->make(['category_id' => $categories->id]);

        # Check Foreign Key is the same
        $this->assertEquals('category_id', $book->category()->getForeignKeyName());

        # Check BelongsTo
        $this->assertInstanceOf(BelongsTo::class, $book->category());
    }

    public function test_book_be_longs_to_authors()
    {
        $author = Author::factory()->make();
        $book = Book::factory()->make(['author_id' => $author->id]);

        # Check Foreign Key is the same
        $this->assertEquals('author_id', $book->author()->getForeignKeyName());

        # Check BelongsTo
        $this->assertInstanceOf(BelongsTo::class, $book->author());
    }

    public function test_book_be_longs_to_publishers()
    {
        $publisher = Publisher::factory()->make();
        $book = Book::factory()->make(['publisher_id' => $publisher->id]);

        # Check Foreign Key is the same
        $this->assertEquals('publisher_id', $book->publisher()->getForeignKeyName());

        # Check BelongsTo
        $this->assertInstanceOf(BelongsTo::class, $book->publisher());
    }

    public function test_book_has_many_comment()
    {
        $book = Book::factory()->make();
        $user = User::factory()->make();
        $comment = Comment::factory()->make(['book_id' => $book->id , 'user_id' => $user->id]);

        # Check Foreign Key is the same
        $this->assertEquals('book_id', $book->comment()->getForeignKeyName());

        # Check HasMany
        $this->assertInstanceOf(HasMany::class, $book->comment());
    } 


    public function test_book_has_many_borrow_book()
    {
        $book = Book::factory()->make();
        $user = User::factory()->make();
        $borrow = BorrowedBook::factory()->make(['book_id' => $book->id , 'user_id' => $user->id]);

        # Check Foreign Key is the same
        $this->assertEquals('book_id', $book->Borrowed()->getForeignKeyName());

        # Check HasMany
        $this->assertInstanceOf(HasMany::class, $book->Borrowed());
    } 

    public function test_book_has_many_rate_book()
    {
        $book = Book::factory()->make();
        $user = User::factory()->make();
        $rate = Rate::factory()->make(['book_id' => $book->id , 'user_id' => $user->id]);

        # Check Foreign Key is the same
        $this->assertEquals('book_id', $book->rate()->getForeignKeyName());

        # Check HasMany
        $this->assertInstanceOf(HasMany::class, $book->rate());
    } 

    public function test_book_has_many_follow_book()
    {
        $book = Book::factory()->make();
        $user = User::factory()->make();
        $follow = BookFollow::factory()->make(['book_id' => $book->id , 'user_id' => $user->id]);

        # Check Foreign Key is the same
        $this->assertEquals('book_id', $book->Follow()->getForeignKeyName());

        # Check HasMany
        $this->assertInstanceOf(HasMany::class, $book->Follow());
    } 

    public function test_book_has_many_like_book()
    {
        $book = Book::factory()->make();
        $user = User::factory()->make();
        $like = Like::factory()->make(['book_id' => $book->id , 'user_id' => $user->id]);

        # Check Foreign Key is the same
        $this->assertEquals('book_id', $book->likeBook()->getForeignKeyName());

        # Check HasMany
        $this->assertInstanceOf(HasMany::class, $book->likeBook());
    } 

}
