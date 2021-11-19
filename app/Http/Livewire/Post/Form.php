<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Form extends Component
{
    public $url;

    protected $rules = [
        'url' => 'required|url'
    ];

    public function render()
    {
        return view('livewire.post.form');
    }

    public function createItem()
    {
        $this->validate();

        $item = new Post(['url' => $this->url]);
        $item->save();

        $this->emit('saved');
    }
}
