<?php

namespace App\Http\Livewire\Forms\User;

use App\Models\User;
use Livewire\Component;
use Tanthammar\TallForms\Input;
use Tanthammar\TallForms\TallForm;

class Edit extends Component
{
    use TallForm;

    public function mount(User $user)
    {
        //Gate::authorize()
        $this->fill([
            'formTitle' => 'Edit admin',
            'wrapWithView' => true, //see https://github.com/tanthammar/tall-forms/wiki/Wrapper-Layout
            'showGoBack' => true,
        ]);
        $this->mount_form($user); // $user from hereon, called $this->model
    }

    // Optional method, this already exists in the TallForm trait
    public function onUpdateModel($validated_data)
    {
        $this->model->update($validated_data);
    }

    public function fields()
    {
        return [
            Input::make('name')->rules('required'),
            Input::make('email')->rules('required|email'),
        ];
    }
}
