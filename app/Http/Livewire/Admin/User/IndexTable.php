<?php

namespace App\Http\Livewire\Admin\User;


use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class IndexTable extends LivewireDatatable
{
    public $model = User::class;

    public function columns()
    {
        return [
            NumberColumn::name('id')->searchable(),
            Column::name('name')->searchable(),
            Column::name('email')->searchable(),
            Column::callback(['id', 'name'], function ($id, $name) {
                return view('admin.user.table-actions', ['id' => $id, 'name' => $name]);
            })->label('Actions')->unsortable()
        ];
    }
}
