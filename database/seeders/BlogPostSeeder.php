<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BlogPost;
use Illuminate\Support\Str;

class BlogPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staticPosts = [
            [
                'title' => 'Beauty of the code',
                'excerpt' => 'Writing code poeticly. No redundancy, no fluff. Every line has a purpose. It\'s this hidden beauty in the balance of logic, syntax, and purpose that we now just call "clean code" or "best practices".',
                'category' => 'Code Quality',
                'reading_time' => 3,
                'published_at' => now()->subDays(1), // Diterbitkan kemarin
                'image' => 'https://picsum.photos/seed/default-1/800/400',
                'tags' => ['Coding', 'Best Practice'],
                'featured' => true,
            ],
            [
                'title' => 'FineTuning an Image Classification Model with TensorFlow',
                'excerpt' => 'A comprehensive guide on how to fine-tune an image classification model using TensorFlow.',
                'category' => 'Machine Learning',
                'reading_time' => 6,
                'published_at' => now(), // Diterbitkan hari ini
                'image' => 'https://picsum.photos/seed/default-2/800/400',
                'tags' => ['AI', 'TensorFlow', 'Python'],
                'featured' => false,
            ],
        ];

        // Loop dan buat setiap postingan statis
        foreach ($staticPosts as $postData) {
            
            // Ambil excerpt untuk konten (atau isi konten lengkap)
            $content = $postData['excerpt'] . " " . $postData['excerpt'];

            BlogPost::create([
                'title' => $postData['title'],
                'slug' => Str::slug($postData['title']),
                'excerpt' => $postData['excerpt'],
                'content' => $content, // Anda bisa ubah ini
                'featured_image' => $postData['image'],
                'category' => $postData['category'],
                'tags' => $postData['tags'],
                'status' => 'published',
                'featured' => $postData['featured'],
                'published_at' => $postData['published_at'],
                'author_id' => 1, // Pastikan user dengan ID 1 ada
                'views' => rand(1000, 5000), // Acak views
                'reading_time' => $postData['reading_time'],
                'meta_title' => $postData['title'],
                'meta_description' => $postData['excerpt'],
            ]);
        }

        if (BlogPost::count() === 0) {
            foreach ($staticPosts as $row) {
                BlogPost::create($row);
            }
        }

        if (BlogPost::count() < 10) {
            BlogPost::factory()->count(10 - BlogPost::count())->create();
        }
    }
}
