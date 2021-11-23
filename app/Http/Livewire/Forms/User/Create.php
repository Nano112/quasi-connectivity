<?php

namespace App\Http\Livewire\Forms\User;

use App\Models\User;
use Livewire\Component;
use Tanthammar\TallForms\Input;
use Tanthammar\TallForms\TallForm;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    use TallForm;

    public function mount(?User $user)
    {
        //Gate::authorize()
        $this->fill([
            'formTitle' => 'Create new admin',
            'wrapWithView' => true,
            'showGoBack' => true,
            'showSave' => false,
        ]);
        $this->mount_form($user); // $user from hereon, called $this->model
    }

    public function onCreateModel($validated_data)
    {
        data_set($validated_data, 'password', Hash::make(data_get($validated_data, 'password')));
        $this->model = User::create($validated_data);
    }

    public function onUpdateModel($validated_data)
    {
        $this->model->update($validated_data);
    }

    public function fields()
    {
        $fields =  [
            Input::make('Name')->rules('required'),
            Input::make('Email')->type('email')->rules('required|email|unique:users,email'),
            Input::make('Password')
                ->type('password')
                ->rules('required|min:8'),
        ];

        return $fields;


    }
}
