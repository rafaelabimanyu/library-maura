<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $catFiksi = Category::firstOrCreate(['name' => 'Fiksi', 'slug' => 'fiksi']);
        $catSains = Category::firstOrCreate(['name' => 'Sains', 'slug' => 'sains']);
        $catTeknologi = Category::firstOrCreate(['name' => 'Teknologi', 'slug' => 'teknologi']);

        $books = [
            ['category_id' => $catFiksi->id, 'title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'publisher' => 'Bentang Pustaka', 'year' => 2005, 'stock' => 10],
            ['category_id' => $catFiksi->id, 'title' => 'Bumi Manusia', 'author' => 'Pramoedya Ananta Toer', 'publisher' => 'Hasta Mitra', 'year' => 1980, 'stock' => 5],
            ['category_id' => $catFiksi->id, 'title' => 'Hujan', 'author' => 'Tere Liye', 'publisher' => 'Gramedia', 'year' => 2016, 'stock' => 0],
            ['category_id' => $catSains->id, 'title' => 'Cosmos', 'author' => 'Carl Sagan', 'publisher' => 'Random House', 'year' => 1980, 'stock' => 3],
            ['category_id' => $catSains->id, 'title' => 'A Brief History of Time', 'author' => 'Stephen Hawking', 'publisher' => 'Bantam Books', 'year' => 1988, 'stock' => 7],
            ['category_id' => $catSains->id, 'title' => 'Sapiens', 'author' => 'Yuval Noah Harari', 'publisher' => 'Harvill Secker', 'year' => 2011, 'stock' => 12],
            ['category_id' => $catTeknologi->id, 'title' => 'Clean Code', 'author' => 'Robert C. Martin', 'publisher' => 'Prentice Hall', 'year' => 2008, 'stock' => 4],
            ['category_id' => $catTeknologi->id, 'title' => 'The Pragmatic Programmer', 'author' => 'Andrew Hunt', 'publisher' => 'Addison-Wesley', 'year' => 1999, 'stock' => 6],
            ['category_id' => $catTeknologi->id, 'title' => 'Design Patterns', 'author' => 'Erich Gamma et al.', 'publisher' => 'Addison-Wesley', 'year' => 1994, 'stock' => 2],
            ['category_id' => $catTeknologi->id, 'title' => 'Refactoring', 'author' => 'Martin Fowler', 'publisher' => 'Addison-Wesley', 'year' => 1999, 'stock' => 8],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
