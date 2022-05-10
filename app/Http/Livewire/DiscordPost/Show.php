<?php

namespace App\Http\Livewire\DiscordPost;

use Livewire\Component;
use App\Models\DiscordPost;

class Show extends Component
{
    public function render()
    {
        $discordPosts  = DiscordPost::all();
        return view('livewire.discord-post.show', ['discordPosts' => $discordPosts]);
    }
}
