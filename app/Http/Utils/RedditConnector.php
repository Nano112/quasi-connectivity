<?php

namespace App\Http\Utils;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

#make a class to call reddit's api
class RedditConnector
{
    const VALID_SUBREDDITS = ['r/redstone', 'r/technicalminecraft', 'r/minecraft', 'r/qualityredstone'];

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

    #function that checks if the url is a reddit subreddit url
    public static function isValidRedditSubredditUrl($url)
    {
        if (!self::isValidRedditUrl($url)) {
            return false;
        }
        foreach (VALID_SUBREDDITS as $subreddit) {
            if (strpos($url, $subreddit) !== false) {
                return true;
            }
        }
    }

    #function that gets the post from the url
    public static function getPosts($url)
    {
        $url = self::cleanUrl($url);
        if (!self::isValidRedditSubredditUrl($url)) {
            return null;
        }
        try {
            return Cache::rememberForever($url, function () use ($url) {
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
        try {
            $post = self::getPosts($url);
            if (!$post) {
                info('no post');
                return null;
            }
            info('post found');
            $image = Arr::get($post, 'media_metadata');
            if (!$image) {
                $image = Arr::get($post, 'url');
                if (strpos($image, 'jpg') !== false || strpos($image, 'png') !== false || strpos($image, 'gif') !== false) {
                info('image found through url');
                    return $image;
                }
                info('no image found');
                return null;
            }
            info('media_metadata found');
            $image = $image[array_key_first($image)];
            $image = Arr::get($image, 's.u');
            $image = str_replace('preview', 'i', $image);
            return $image;
        } catch (\Exception $e) {
            info('error: ' . $e->getMessage() . ' at ' . $e->getLine() . ' in ' . $e->getFile() . ' in ' . $e->getTraceAsString());
            return null;
        }
        $image = Arr::get($post, 'url');
        if (strpos($image, 'jpg') !== false || strpos($image, 'png') !== false || strpos($image, 'gif') !== false) {
            return $image;
        }

    }

    #function that returns an array of url's contained in a string
    private static function getUrlsFromString($string)
    {
        $regex = '/https?\:\/\/[^\" ]+/i';
        preg_match_all($regex, $string, $matches);
        return $matches[0];
    }

    #function to filter array of url's and return a new array with only url's that contain "video"
    private static function filterUrls($urls)
    {
        $filtered = [];
        foreach ($urls as $url) {
            if (strpos($url, 'video') !== false) {
                $filtered[] = $url;
            }
        }
        return $filtered;
    }

    #function to extract the video id e.g. "n7fgh3c9lr081" from video url
    private static function getVideoId($url)
    {
        $url = explode('video/', $url)[1];
        $id = explode('/player', $url)[0];
        return $id;
    }

    #function to get the video url from the post url
    public static function getVideo($url)
    {
        $post = self::getPosts($url);
        if (!$post) {
            return null;
        }
        $video = Arr::get($post, 'media.reddit_video.fallback_url');
        $video = explode('?', $video)[0];
        if(empty($video)){
            $urls =  self::filterUrls(self::getUrlsFromString(self::getDescription($url)));
            if(!empty($urls)){
                $id = self::getVideoId($urls[0]);
                return "https://v.redd.it/$id/DASH_720.mp4";
            }
            return null;
        }
        return $video;
    }

    //https://external-preview.redd.it/BEBYRbFu-x_8Pvdfg-2-8m97nPqp67oz8iSX8YwMlUY.png?width=960&crop=smart&format=pjpg&auto=webp&s=cf504c0d008346fd5306918152f85ea14912d336
}
