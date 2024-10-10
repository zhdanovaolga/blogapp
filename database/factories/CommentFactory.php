<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //'post_id' => Post::factory(),
            'message' => fake()->sentence(),
            'parent_id' => null,
            //'user_id' => User::factory(),
            //'name' => fake()->sentence(),
            //'email' => fake()->unique()->safeEmail(),

        ];
    }
}
