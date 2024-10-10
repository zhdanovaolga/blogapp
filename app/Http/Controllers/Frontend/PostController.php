<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\SubscribedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index($slug) {
        $userId = null;
        if (Auth::user()) {
            $userId = Auth::user()->id;
        }
        $post = Post::with(["user", "tags", "comments.user", "comments.replies.user"])->with("comments.replies", function($q) {
            $q->where("status", true);
        })->with("comments", function($q) {
            $q->where("status", true)->where("parent_id", null);
        })->withCount(["tags", "comments" => function($q) {
            $q->where("status", true);
        }])->where("status", true)
           ->where(function ($query) use ($slug, $userId) {
            $query
                ->where('is_public', '=', true)
                ->where('slug', '=', $slug)
                ->orWhere('uuid', '=', $slug)
                ->orWhere('slug', '=', $slug);
            if ($userId !== null) {
                $query->where('user_id', '=', $userId);
            }
        })
            ->first();

        //$post->is_public = strtolower($request->input('is_public')) === 'on';

        if ($post) {
            $post->views += 1;
            $post->save();
            $str = Str::class;

            $loggedIn = Auth::check();
            $isSubscribed = $userId ? SubscribedUser::where("user_id", $userId)->where("favorite_user_id", $post->user->id)->first() : false;
            $isOwner = $post->user_id == $userId;

            return view("frontend.post.index", compact("post", "str", "loggedIn", "isSubscribed", "isOwner"));
        }
        return abort(404);
    }


}
