<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index() {
        $recentposts = Post::where("status", true)
            ->where('is_public', true)
            ->orderBy("id", "DESC")->paginate(10);
        $featuredposts = Post::with(["user"])->where("status", true)->orderBy("id", "DESC")->limit(10)->get();
        
        return view("frontend.home.index", compact("recentposts", "featuredposts"));
    }
}
