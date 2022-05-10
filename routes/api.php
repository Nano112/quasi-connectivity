<?php

use App\Models\DiscordPost;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// get to return all posts as json
Route::get('/posts', function (Request $request) {
    return Post::all();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// post api to create a new discord post
Route::post('/create-discord-post', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'url' => 'required|url',
        'username' => 'required',
        'discord_user_id' => 'required',
        'discord_guild_id' => 'required',
        'discord_channel_id' => 'required',
        'discord_message_id' => 'required',
        'ressource_url' => 'required',
        'text' => 'required',
        'avatar_url' => 'required',
        'invite_url' => 'required',
        'created_utc' => 'required',
    ]);

    if ($validator->fails()) {
        return response()->json($validator->errors(), 400);
    }
    $request->merge(['created_utc' => Carbon::parse($request->created_utc)->format('Y-m-d H:i:s')]);

    $discordPost = DiscordPost::create($request->all());
    return response()->json($discordPost, 201);
}
);
