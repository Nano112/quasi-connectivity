<?php

namespace App\Models;

use App\Http\Utils\RedditConnector;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'url', 'approved', 'created_utc'];
    protected $casts = [
        'created_utc' => 'datetime',
    ];

    public static function getLastCreatedUtc()
    {
        $lastCreatedUtc = Cache::remember('lastCreatedUtc', 60, function () {
            return Post::orderBy('created_utc', 'desc')->first()->created_utc;
        });
        return $lastCreatedUtc;
    }

    public static function getLastCreatedTimestamp()
    {
        return \App\Models\Post::getLastCreatedUtc()->timestamp;
    }

    public function getTitleAttribute()
    {
        return Cache::rememberForever("$this->post_id-title", function () {
            try {
                return RedditConnector::getTitle($this->url);
            } catch (\Throwable$th) {
                return null;
            }
        });
    }

    public function getAuthorAttribute()
    {
        return Cache::rememberForever("$this->post_id-author", function () {
            try {
                return RedditConnector::getAuthor($this->url);
            } catch (\Throwable$th) {
                return null;
            }
        });
    }

    public function getSubredditAttribute()
    {
        return Cache::rememberForever("$this->post_id-subreddit", function () {
            try {
                return RedditConnector::getSubreddit($this->url);
            } catch (\Throwable$th) {
                return null;
            }
        });
    }

    public function getScoreAttribute()
    {
        return Cache::rememberForever("$this->post_id-score", function () {
            try {
                return RedditConnector::getScore($this->url);
            } catch (\Throwable$th) {
                return null;
            }
        });
    }

    public function getCommentCountAttribute()
    {
        return Cache::rememberForever("$this->post_id-comment_count", function () {
            try {
                return RedditConnector::getCommentCount($this->url);
            } catch (\Throwable$th) {
                return null;
            }
        });
    }

    public function getDescriptionAttribute()
    {
        return Cache::rememberForever("$this->post_id-description", function () {
            try {
                return RedditConnector::getDescription($this->url);
            } catch (\Throwable$th) {
                return null;
            }
        });
    }

    public function getImageAttribute()
    {
        return Cache::rememberForever("$this->post_id-image", function () {
            try {
                return RedditConnector::getImage($this->url);
            } catch (\Throwable$th) {
                return null;
            }
        });
    }

    public function getVideoAttribute()
    {
        return Cache::rememberForever("$this->post_id-video", function () {
            try {
                return RedditConnector::getVideo($this->url);
            } catch (\Throwable$th) {
                return null;
            }
        });
    }
}
