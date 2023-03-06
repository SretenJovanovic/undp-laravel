<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->title(),
            'excerpt'=>fake()->sentence(),
            'body'=>fake()->paragraph(10),
            'slug'=>fake()->unique()->slug(),
            'category_id'=>Category::factory(),
            'user_id'=>User::factory()
        ];
    }
}
