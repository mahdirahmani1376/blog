<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
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
        User::factory()->create([
            'name' => 'mahdi rahmani',
            'user_name' => 'mahdi_rahmani',
            'email' => 'admin@test.com',
            'password' => '123qwe',
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'mahdi ',
            'user_name' => 'mahdi',
            'email' => 'writer@test.com',
            'password' => '123qwe',
            'is_admin' => false,
        ]);

        $users = User::factory()->count(10)->create();
        $categories = Category::factory()->count(10)->create();
        foreach ($users as $user) {
            Post::factory()
                ->for($user, 'author')
                ->for($categories->random(), 'category')
                ->count(5)
                ->create()
                ->each(function (Post $post) use ($users) {
                    Comment::factory()
                        ->for($post, 'post')
                        ->sequence(fn(Sequence $sequence) => ['user_id' => $users->random()->id])
                        ->count(3)->create();
                });
        }

    }
}
