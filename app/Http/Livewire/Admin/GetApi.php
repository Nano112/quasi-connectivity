<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;

class GetApi extends Component
{
    public $apiKey = '';

    public function mount()
    {
        $this->apiKey = Str::random(32);
    }

    public function refreshApiKey()
    {
        $this->apiKey = Str::random(32);
    }
}
