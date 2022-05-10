<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscordPost extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'approved', 'created_utc', 'ressource_url', 'username', 'discord_user_id', 'discord_guild_id', 'discord_channel_id', 'discord_message_id', 'text', 'avatar_url', 'invite_url'];
}
