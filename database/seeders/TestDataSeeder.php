<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Database\Factories\PostFactory;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class TestDataSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory()->count(10)->create();

        $userIds = [];
        foreach ($users as $user) {
            $userIds[] = $user->id;
        }   

        foreach ($users as $user) {
            $posts = Post::factory(['user_id' => $user->id])->count(rand(5,15))
            //->has(Comment::factory(['user_id' => $user->id])->count(20), 'comments')
            ->create();
 
            foreach ($posts as $post) {
                for ($i=0; $i<rand(10,15); $i++) {
                    $idx = rand(0, count($userIds)-1);
                    Comment::factory([
                        'post_id' => $post->id,
                        'user_id' => $userIds[$idx]
                    ])->create();
                }
            }
 
        }
    }
}
