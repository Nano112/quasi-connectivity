<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Counter extends Component
{
    public function render()
    {
        $post = Post::where('approved', true)->orderBy('created_utc', 'desc')->first();
        $timestamp = $post->created_utc ?? now();
        return view('livewire.post.counter', [ 'timestamp' => $timestamp->getPreciseTimestamp(3) ]);
    }
}
