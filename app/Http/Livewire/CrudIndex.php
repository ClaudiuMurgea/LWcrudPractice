<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class CrudIndex extends Component
{

    use LivewireAlert;

    protected $listeners = [
        'confirmed',
        'show'
    ];

    public $ids;
    public $userID;
    public $showIndex   = true;
    public $showCreate  = false;
    public $showEdit    = false;

    public function show($type, $ids = null)
    {
        $this->showIndex    = false;
        $this->showCreate   = false;
        $this->showEdit     = false;

        $this->$type = true;
        $this->ids = $ids;
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.crud-index', ['users' => $users])->layout('layouts.app');
    }

    public function delete($id)
    {
        $this->userID = $id;
        $this->confirm('Are you sure want to delete?', [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Yes',
            'showCancelButton' => true,
            'cancelButtonText' => 'Cancel',
            'position' => 'center',
            'timer' => '20000',
            'confirmButtonColor' => '#2C7BE5',
            'onConfirmed' => 'confirmed',
            'allowOutsideClick' => false,
        ]);
    }

    public function confirmed() {
        $user = User::find($this->userID);
        $user->delete();
        $this->alert('success', 'Saved', [
            'position' => 'top-right'
            ]);
    }

}
