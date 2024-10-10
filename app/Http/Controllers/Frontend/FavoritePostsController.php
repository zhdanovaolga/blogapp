<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class FavoritePostsController extends Controller
{
    public function index() {
        $user = Auth::check();

        $recentposts = Post::whereHas('user.favoriteUsers', function (Builder $query) {
                $query->where(['subscribed_users.user_id' => Auth::user()->id]);
            })->with(["user"])->where("status", true)->orderBy("id", "DESC")->paginate(10);
        
        return view("frontend.favoritePosts.index", compact("recentposts"));
    }
}
