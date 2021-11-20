<?php

namespace App\Http\Utils;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

#make a class to call reddit's api
class RedditConnector
{

    #function that cleans the url from unnecessary parameters
    public static function cleanUrl($url)
    {
        $url = explode('?', $url)[0];
        $url = explode('#', $url)[0];
        return $url;
    }

    #function that cleans and validates url
    public static function isValidUrl($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    #function that checks if the url is a reddit url
    public static function isValidRedditUrl($url)
    {
        if (!self::isValidUrl($url)) {
            return false;
        }
        return strpos($url, 'reddit.com') !== false;
    }

    #function that checks if the url is a reddit post url
    public static function isValidRedditPostUrl($url)
    {
        if (!self::isValidRedditUrl($url)) {
            return false;
        }
        return strpos($url, 'comments') !== false;
    }


    public static function getPosts($url)
    {
        $url = self::cleanUrl($url);
        if (!self::isValidRedditPostUrl($url)) {
            return null;
        }
        try {
            return Cache::rememberForever($url, function() use ($url) {
                $json = Http::get("$url.json")->json();
                return Arr::get($json, '0.data.children.0.data');
            });
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    #function to get the post subbreddit from the url
    public static function getSubreddit($url)
    {
        $post = self::getPosts($url);
        if (!$post) {
            return null;
        }
        $subreddit = Arr::get($post, 'subreddit');
        return $subreddit;
    }

    #function to get the post title from the url
    public static function getTitle($url)
    {
        $post = self::getPosts($url);
        if (!$post) {
            return null;
        }
        $title = Arr::get($post, 'title');
        return $title;
    }

    #function to get the post author from the url
    public static function getAuthor($url)
    {
        $post = self::getPosts($url);
        if (!$post) {
            return null;
        }
        $author = Arr::get($post, 'author');
        return $author;
    }

    #function to get the post score from the url
    public static function getScore($url)
    {
        $post = self::getPosts($url);
        if (!$post) {
            return null;
        }
        $score = Arr::get($post, 'score');
        return $score;
    }

    #function to get the post comment count from the url
    public static function getCommentCount($url)
    {
        $post = self::getPosts($url);
        if (!$post) {
            return null;
        }
        $comments = $post['num_comments'];
        return $comments;
    }

    #function to get the post created time from the url
    public static function getCreatedTime($url)
    {
        $post = self::getPosts($url);
        if (!$post) {
            return null;
        }
        $created = Carbon::parse($post['created_utc']);
        return $created;
    }

    #function to get the post unique id from the url
    public static function getId($url)
    {
        $post = self::getPosts($url);
        if (!$post) {
            return null;
        }
        $id = $post['id'];
        return $id;
    }

    #function to get the post description from the url
    public static function getDescription($url)
    {
        $post = self::getPosts($url);
        if (!$post) {
            return null;
        }
        $description = $post['selftext'];
        return $description;
    }


    #function to get the post image from the url
    public static function getImage($url)
    {
        $post = self::getPosts($url);
        if (!$post) {
            return null;
        }
        $image = Arr::get($post, 'url');
        #verify the image is an image url using extension
        if (strpos($image, 'jpg') !== false || strpos($image, 'png') !== false || strpos($image, 'gif') !== false) {
            return $image;
        }
        return '';
    }
}
