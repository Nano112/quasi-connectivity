<div class="bg-white  my-2 py-2">
    @foreach ($discordPosts as $discordPost)
    {{-- 'url' => 'required|url',
        'username' => 'required',
        'discord_user_id' => 'required',
        'discord_guild_id' => 'required',
        'discord_channel_id' => 'required',
        'discord_message_id' => 'required',
        'text' => 'required',
        'avatar_url' => 'required',
        'invite_url' => 'required', --}}
        <p class="text-black text-xs px-2 self-center">
            Post url:{{ $discordPost->url }}
        </p>
        <p class="text-black text-xs px-2 self-center">
            Post username:{{ $discordPost->username }}
        </p>
        <p class="text-black text-xs px-2 self-center">
            Post ressource_url:{{ $discordPost->ressource_url }}
        </p>
        <p class="text-black text-xs px-2 self-center">
            Post discord_user_id :{{ $discordPost->discord_user_id }}
        </p>
        <p class="text-black text-xs px-2 self-center">
            Post discord_guild_id :{{ $discordPost->discord_guild_id }}
        </p>
        <p class="text-black text-xs px-2 self-center">
            Post discord_channel_id :{{ $discordPost->discord_channel_id }}
        </p>
        <p class="text-black text-xs px-2 self-center">
            Post discord_message_id :{{ $discordPost->discord_message_id }}
        </p>
        <p class="text-black text-xs px-2 self-center">
            Post text :{{ $discordPost->text }}
        </p>
        <p class="text-black text-xs px-2 self-center">
            Post avatar_url :{{ $discordPost->avatar_url }}
        </p>




    @endforeach
</div>
