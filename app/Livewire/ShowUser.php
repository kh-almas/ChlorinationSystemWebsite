<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ShowUser extends Component
{
    use WithPagination;

    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.show-user', ['users' => $users]);
    }
}
