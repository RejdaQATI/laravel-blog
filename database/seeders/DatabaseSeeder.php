<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    

        // User::factory(10)->create();

        User::factory(3)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' =>bcrypt('test'),
            'role'=> 'admin',
        ]);
        User::factory()->create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' =>bcrypt('test'),
            'role'=> 'client',
        ]);

        $categories =Category::factory(5)->create();

        Post::factory(20)->create()->each(function ($posts) use ($categories) {
            $randcat = $categories->random();
            $posts->categories()->attach($randcat);
        });

        $this->call([
            PostSeeder::class,
            CategorySeeder::class,
        ]);

    
        


    }
}
