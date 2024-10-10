<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
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
    public function definition(): array
    {

        $texts = fake()->paragraphs(10);
        $text = join('', array_map(fn ($text) => '<p>' . $text . '</p>', $texts));

        return [
          //  'user_id' => User::factory(),
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'content' => $text,
            'thumbnail' => '',//Post::random(10),
            'uuid' => (string) Str::uuid(),
            'is_public' => fake()->boolean(),
        ];
    }


}
