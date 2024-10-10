<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Post;
use App\Models\User;
use App\Models\SubscribedUsers;
class FavoritePosts extends Model
{
    
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id', 'title', 'content');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'name', 'username');
    }

    public function favoriteUsers(): HasMany
    {
        return $this->hasMany(SubscribedUsers::class, 'user_id', 'favorite_user_id');
    }


}