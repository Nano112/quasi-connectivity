<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use App\Http\Utils\RedditConnector;
use Illuminate\Support\Facades\Validator;

class Form extends Component
{
    public $url;

    protected $rules = [
        'url' => 'required|url',
        'created_utc' => 'required',
        'post_id' => 'required|unique:posts',
    ];

    protected $messages = [
        'url.required' => 'You must input a url',
        'url.url' => 'Please enter a valid URL',
        'created_utc.required' => 'The post seems to be invalid please verify',
        'post_id.required' => 'The post seems to be invalid please verify',
        'post_id.unique' => 'The post has already been submited',
    ];

    public function render()
    {
        return view('livewire.post.form');
    }

    public function createItem()
    {
        $fields = [
            'url' => $this->url,
            'created_utc' => RedditConnector::getCreatedTime($this->url),
            'post_id' => RedditConnector::getId($this->url),
        ];
        $validator = Validator::make($fields, $this->rules, $this->messages)->stopOnFirstFailure(true);
        $validator->validate();
        $post = Post::create($fields);
        $post->save();

        $this->emit('saved');
    }
}
