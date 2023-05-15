<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;

class Users extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.users', [
            'users' => User::paginate(1),
        ]);
    }
}
