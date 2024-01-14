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

    public $admin = '';

    public function updatingSearch() {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.user-table', [
            'users' => User::search($this->search)
            ->when($this->admin !== '', function($query){
                $query->where('is_admin', $this->admin);
            })
            ->paginate($this->perPage)
        ]);
    }
}
