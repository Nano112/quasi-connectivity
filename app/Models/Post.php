<?php

namespace App\Models;

use App\Http\Utils\RedditConnector;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'approved', 'created_utc'];

    public function getTitleAttribute()
    {
        return RedditConnector::getTitle($this->url);
    }

    public function getAuthorAttribute()
    {
        return RedditConnector::getAuthor($this->url);
    }

    public function getSubredditAttribute()
    {
        return RedditConnector::getSubreddit($this->url);
    }

    public function getScoreAttribute()
    {
        return RedditConnector::getScore($this->url);
    }

    public function getCommentCountAttribute()
    {
        return RedditConnector::getCommentCount($this->url);
    }
}
