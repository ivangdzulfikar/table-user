<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;

    public $search;
    public $perPage = '5';

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.user-table', [
            'users' => User::search($this->search)->paginate($this->perPage)
        ]);
    }
}
