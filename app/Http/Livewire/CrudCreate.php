<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Media;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Repositories\UserRepository;
use Livewire\WithFileUploads;

class CrudCreate extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    protected $userRepository;

    protected $rules = [
        'name'      => 'required',
        'email'     => 'required',
        'photo'     => '',
        'color'     => '',
        'password'  => 'required'
    ];

    public $name;
    public $email;
    public $password;
    public $description;
    public $date;
    public $photo;
    public $color;
    public $active = true;
    public $return = false;


    public function back() 
    {
        $this->active = false;
        $this->return = true;
    }

    public function render()
    {
        return view('livewire.crud-create');
    }

    public function boot(UserRepository $userRepository) {
        $this->userRepository  =  $userRepository;
    }

    public function create()
    {
        $this->validate();

        if($this->photo) {
            $media =  new Media();
            $filename = $this->photo->store('photos', 'public');
            $media->url = $filename;
            $media->save();
        } 
        
        // $this->userRepository->create([
        //     'name'      => $this->name,
        //     'email'     => $this->email,
        //     'password'  => Hash::make($this->password)
        // ]);
        $user = new User();
            $user->name = $this->name;
            $user->email = $this->email;
            $user->password = Hash::make($this->password);
            $user->color = $this->color;
            if($this->photo)  {
                $user->media_id = $media->id;
            }
            $user->save();

        $this->alert('success', 'Saved', [
            'position' => 'top-right'
            ]);
        $this->back();
    }
}
