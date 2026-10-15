<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat 5 penulis, masing-masing 10 buku
        Author::factory()
            ->count(5)
            ->hasBooks(10)
            ->create();

        // Buat 8 kategori
        $categories = Category::factory()->count(8)->create();

        // Beri 1-3 kategori acak ke setiap buku
        Book::all()->each(function ($book) use ($categories) {
            $book->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}