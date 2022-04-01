<?php

namespace App\Http\Livewire\Admin;

interface CrudComponent
{

    public function save() : void;

    public function update() : void;

    public function delete($id) : void;
}
