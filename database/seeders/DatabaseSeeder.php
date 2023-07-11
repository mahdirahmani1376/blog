<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = User::factory()->count(10)->create();
        $categories = Category::factory()->count(10)->create();
        foreach ($users as $user) {
                    Post::factory()
                        ->for($user, 'author')
                        ->for($categories->random(),'category')
                        ->count(10)
                        ->create();
        }

    }
}
