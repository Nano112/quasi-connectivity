<?php

namespace App\Http\Livewire\Forms\User;

use App\Models\User;
use Livewire\Component;
use Tanthammar\TallForms\Input;
use Spatie\Permission\Models\Role;
use Tanthammar\TallForms\TallForm;
use Tanthammar\TallForms\Checkboxes;

class Edit extends Component
{
    use TallForm;

    public function mount(User $user)
    {
        $this->fill([
            'formTitle' => 'Edit admin',
            'wrapWithView' => true, //see https://github.com/tanthammar/tall-forms/wiki/Wrapper-Layout
            'showGoBack' => true,
        ]);
        $this->mount_form($user);
    }

    public function onUpdateModel($validated_data)
    {
        $this->model->update($validated_data);
    }

    public function fields()
    {
        $inputs = [
            Input::make('name')->rules('required'),
            Input::make('email')->rules('required|email'),
        ];

        // $authed_user = auth()->user();
        // $modified_user = $this->model;
        // $current_roles = $modified_user->getRoleNames()->toArray();
        // $roles = Role::pluck('name')->toArray();

        // if ($authed_user->hasRole('admin')) {
        //     $inputs[] = Checkboxes::make('roles')
        //         ->options($roles)
        //         ->default(['admin']);
        //     }

        return $inputs;
    }
}
