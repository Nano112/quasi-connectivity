<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Show extends Component
{
    protected $listeners = ['saved'];

    public function render()
    {
        $list = Post::all()->sortByDesc('created_at');

        return view('livewire.post.show', [ 'list' => $list ]);
    }

    public function saved()
    {
        $this->render();
    }

    public function markAsDone(Post $item)
    {
        $item->approved = true;
        $item->save();
    }

    public function markAsToDo(Post $item)
    {
        $item->approved = false;
        $item->save();
    }

    public function deleteItem(Post $item)
    {
        $item->delete();
    }
}
