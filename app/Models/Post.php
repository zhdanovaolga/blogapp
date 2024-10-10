<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "posts";
    protected $fillable = [
        "user_id",
        "title",
        "slug",
        "content",
        "thumbnail",
        "views",
        "enable_comment",
        "status",
        "uuid",
        "is_public",
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'enable_comment' => 'boolean',
        'status' => 'boolean',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function readTime() {
        $minutesToRead = round(Str::wordCount(static::find($this->id)->content) / 200);
        if ($minutesToRead < 1) {
            return "Less than a minute";
        }
        return $minutesToRead." Mins Read";
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class)->orderBy("created_at", "ASC");
    }

    public function scopePublic($builder) {
        return $builder->where('is_public', '=', true);
    }
}
