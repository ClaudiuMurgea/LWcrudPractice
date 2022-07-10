<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class CrudEdit extends Component
{

    use LivewireAlert;

    protected $userRepository;

    public $edit_name;
    public $edit_email;
    public $edit_password;
    public $ids;
    public $active = true;
    public $return = false;

    public function back() {
        $this->active = false;
        $this->return = true;
    }

    public function mount($userID) {
        $user = User::find($userID);
            $this->ids           = $user->id;
            $this->edit_name     = $user->name;
            $this->edit_email    = $user->email;
    }

    public function render()
    {
        return view('livewire.crud-edit')->layout('layouts.app');
    }

    public function boot(UserRepository $userRepository) {
        $this->userRepository =  $userRepository;
    }

    public function update($id)
    {
        $this->validate([
            'edit_name'     => 'required',
            'edit_email'    => 'required',
            'edit_password' => ''
        ]);
        
        $user = $this->userRepository->findOrFail($id);
            $user->name     = $this->edit_name;
            $user->email    = $this->edit_email;
            if($this->edit_password) {
                $user->password = Hash::make($this->edit_password);
            }
            $user->save();

            $this->alert('success', 'Saved', [
                'position' => 'top-right'
            ]);

            // $this->emitUp('show', 'showIndex');
            $this->back();
    }
}
