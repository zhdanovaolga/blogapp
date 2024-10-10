@extends("frontend.master")

@section("title", $post->title." - ".config('app.sitesettings')::first()->site_title)

@section("content")
<section class="post-single">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <div class="post-single-image">
                    <img src="{{ asset("uploads/post/".$post->thumbnail) }}" alt="{{ $post->title }}"/>
                </div>
                <div class="post-single-body">
                    <div class="post-single-title">
                        <h1>{{ $post->title }}</h1>
                        <ul class="entry-meta">
                            <li class="post-author-img"><img src="{{ asset("uploads/author/".($post->user->profile ?? "default.webp")) }}" alt="{{ $post->user->name }}"/></li>
                            <li class="post-author"> <a href="{{ route("frontend.user", $post->user->username) }}">{{ $post->user->name }}</a></li>
                           
                            <li class="post-date"> <span class="line"></span>{{ $post->created_at->format("F d, Y") }}</li>
                        </ul>
                    </div>
                    <div class="post-single-content">
                        {!! $post->content !!}
                    </div>

                    <?php if($loggedIn): ?>
                        <?php if(!$isSubscribed): ?>
                                <form action="{{ route("frontend.subscribe") }}" method="POST">
                                            @method("POST")
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $post->user->id }}" />
                                            <input type="hidden" name="subscribed_user_id" value="{{ $post->user->id }}" />
                                            <button type="submit" class="btn btn-success">Subscribe</button>
                                            
                                </form>
                                <?php else: ?>
                                    <form action="{{ route("frontend.unsubscribe") }}" method="POST">
                                            @method("POST")
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $post->user->id }}" />
                                            <input type="hidden" name="subscribed_user_id" value="{{ $post->user->id }}" />
                                            <button type="submit" class="btn btn-success">Unsubscribe</button>
                                </form>
                        <?php endif; ?>
                        <?php if($isOwner && !$post->is_public): ?>
                        <div class="row mt-1">
                                    <div class="col-12">
                                    <label for="share">This post is private. To share copy this link and send it to your friend</label>
                                    <input readonly class="form-control" type="text" name="share" value="{{ route("frontend.post", $post->uuid) }}" /> 
                                    </div>                        
                                </div> 
                        <?php endif; ?>
                    <?php endif; ?>
                                                    
                    <div class="post-single-bottom">
                        @if ($post->tags_count > 0)
                        <div class="tags">
                            <p>Tags:</p>
                            <ul class="list-inline">
                                @foreach ($post->tags as $tag)
                                <li>
                                    <a href="{{ route("frontend.tag", $str::slug($tag->name)) }}">{{ $tag->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                    </div>
                    @include("frontend.post.inc.author")
                    @include("frontend.post.inc.comment")
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
