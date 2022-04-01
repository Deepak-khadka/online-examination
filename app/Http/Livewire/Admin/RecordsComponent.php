<?php

namespace App\Http\Livewire\Admin;

use App\Foundation\Lib\UserType;
use App\Models\User;

class RecordsComponent extends BaseComponent implements CrudComponent
{
   public $userList = [];

    public function render()
    {
        $this->userList = User::where('user_type', '=', UserType::STUDENT)->get();
        return view('livewire.admin.records-component');
    }

    public function save(): void
    {
        // TODO: Implement save() method.
    }

    public function update(): void
    {
        // TODO: Implement update() method.
    }

    public function delete($id): void
    {
        // TODO: Implement delete() method.
    }
}
