<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'category_id' => Category::factory(),
            'author_id' => User::factory(),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'excerpt' => $this->faker->paragraph(2 ),
            'body' => $this->faker->paragraph(6 ),
            'published_at' => Carbon::now(),
        ];
    }
}
