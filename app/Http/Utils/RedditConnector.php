<?php

namespace App\Http\Utils;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

#make a class to call reddit's api
class RedditConnector {

     #function that cleans the url from unnecessary parameters
     public static function cleanUrl($url) {
        $url = explode('?', $url)[0];
        $url = explode('#', $url)[0];
        return $url;
    }

    #function that cleans and validates url
    public static function isValidUrl($url) {
        $url = self::cleanUrl($url);
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    #function that checks if the url is a reddit url
    public static function isValidRedditUrl($url) {
        if (! self::isValidUrl($url)) {
            return false;
        }
        $url = self::cleanUrl($url);
        return strpos($url, 'reddit.com') !== false;
    }

    #function that checks if the url is a reddit post url
    public static function isValidRedditPostUrl($url) {
        if (! self::isValidRedditUrl($url)) {
            return false;
        }
        $url = self::cleanUrl($url);
        return strpos($url, 'comments') !== false;
    }


    public static function getPosts($url) {
        if (!self::isValidRedditPostUrl($url)) {
            throw new \Exception("Invalid URL");
        }
        return Cache::forever($url, function(){
            try {
                $response = Http::get('https://www.reddit.com/r/quasi/new.json');
                $posts = Arr::get($response->json(), 'data.children.0.data');
                return $posts;
            } catch (\Exception $e) {
                throw new \Exception("Invalid URL");
            }
        });

    }

    #function to get the post subbreddit from the url
    public static function getSubreddit($url) {
        $post = self::getPosts($url);
        $subreddit = Arr::get($post, 'subreddit');
        return $subreddit;
    }

    #function to get the post title from the url
    public static function getTitle($url) {
        $post = self::getPosts($url);
        $title = Arr::get($post, 'title');
        return $title;
    }

    #function to get the post author from the url
    public static function getAuthor($url) {
        $post = self::getPosts($url);
        $author = Arr::get($post, 'author');
        return $author;
    }

    #function to get the post score from the url
    public static function getScore($url) {
        $post = self::getPosts($url);
        $score = Arr::get($post, 'score');
        return $score;
    }

    #function to get the post comment count from the url
    public static function getCommentCount($url) {
        $post = self::getPosts($url);
        $comments = $post['num_comments'];
        return $comments;
    }

    #function to get the post created time from the url
    public static function getCreatedTime($url) {
        $post = self::getPosts($url);
        $created = $post['created_utc'];
        return $created;
    }
}
