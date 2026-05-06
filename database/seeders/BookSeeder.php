<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $categories = [
            'Fiksi' => Category::firstOrCreate(['name' => 'Fiksi', 'slug' => 'fiksi']),
            'Sains' => Category::firstOrCreate(['name' => 'Sains', 'slug' => 'sains']),
            'Teknologi' => Category::firstOrCreate(['name' => 'Teknologi', 'slug' => 'teknologi']),
            'Sejarah' => Category::firstOrCreate(['name' => 'Sejarah', 'slug' => 'sejarah']),
            'Pengembangan Diri' => Category::firstOrCreate(['name' => 'Pengembangan Diri', 'slug' => 'pengembangan-diri']),
        ];

        $realisticTitles = [
            'Bumi Manusia', 'Laskar Pelangi', 'Hujan', 'Pulang', 'Pergi', 'Tentang Kamu', 
            'Atomic Habits', 'The Psychology of Money', 'Thinking, Fast and Slow', 'Sapiens',
            'Homo Deus', '21 Lessons for the 21st Century', 'Clean Code', 'The Pragmatic Programmer',
            'Design Patterns', 'Refactoring', 'Guns, Germs, and Steel', 'Cosmos', 'A Brief History of Time',
            'The Selfish Gene', 'Sejarah Tuhan', 'Madilog', 'Di Bawah Bendera Revolusi', 'Catatan Seorang Demonstran',
            'Pemrograman Web dengan PHP', 'Belajar Laravel 10', 'Mastering Vue.js', 'React.js untuk Pemula',
            'Filosofi Teras', 'Berdamai dengan Diri Sendiri', 'Seni Bersikap Bodo Amat', 'Ikigai',
            'Rich Dad Poor Dad', 'Kecerdasan Emosional', 'Dunia Sophie', 'Filsafat Ilmu',
            'Fisika Dasar', 'Biologi Molekuler', 'Kimia Organik', 'Algoritma dan Struktur Data',
            'Kalkulus I', 'Statistika untuk Penelitian', 'Manajemen Proyek IT', 'Cybersecurity 101',
            'Jaringan Komputer', 'Sistem Operasi Modern', 'Machine Learning untuk Pemula', 'Deep Learning',
            'Sejarah Indonesia Modern', 'Nusantara: Sejarah Indonesia'
        ];

        foreach ($realisticTitles as $index => $title) {
            $catName = array_rand($categories);
            // Some manual smart mapping to make it realistic
            if (in_array($title, ['Bumi Manusia', 'Laskar Pelangi', 'Hujan', 'Pulang', 'Pergi', 'Tentang Kamu'])) $catName = 'Fiksi';
            if (in_array($title, ['Atomic Habits', 'The Psychology of Money', 'Filosofi Teras', 'Berdamai dengan Diri Sendiri', 'Seni Bersikap Bodo Amat', 'Ikigai', 'Rich Dad Poor Dad'])) $catName = 'Pengembangan Diri';
            if (in_array($title, ['Clean Code', 'The Pragmatic Programmer', 'Design Patterns', 'Refactoring', 'Pemrograman Web dengan PHP', 'Belajar Laravel 10', 'Mastering Vue.js', 'React.js untuk Pemula', 'Algoritma dan Struktur Data', 'Manajemen Proyek IT', 'Cybersecurity 101', 'Jaringan Komputer', 'Sistem Operasi Modern', 'Machine Learning untuk Pemula', 'Deep Learning'])) $catName = 'Teknologi';
            if (in_array($title, ['Sapiens', 'Homo Deus', '21 Lessons for the 21st Century', 'Guns, Germs, and Steel', 'Sejarah Tuhan', 'Madilog', 'Di Bawah Bendera Revolusi', 'Catatan Seorang Demonstran', 'Sejarah Indonesia Modern', 'Nusantara: Sejarah Indonesia'])) $catName = 'Sejarah';
            if (in_array($title, ['Cosmos', 'A Brief History of Time', 'The Selfish Gene', 'Dunia Sophie', 'Filsafat Ilmu', 'Fisika Dasar', 'Biologi Molekuler', 'Kimia Organik', 'Kalkulus I', 'Statistika untuk Penelitian'])) $catName = 'Sains';

            Book::create([
                'category_id' => $categories[$catName]->id,
                'title' => $title,
                'author' => $faker->name,
                'publisher' => $faker->company,
                'year' => $faker->numberBetween(1990, 2024),
                'stock' => $faker->numberBetween(0, 20),
            ]);
        }
    }
}
