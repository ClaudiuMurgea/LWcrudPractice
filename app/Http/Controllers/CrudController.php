<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\models\User;
use App\Repositories\UserRepository;
// use Jantinnerezo\LivewireAlert\LivewireAlert;

class CrudController extends Controller
{
    // use LivewireAlert;
    public $userRepository;

    public function __construct(UserRepository $userRepository)  {
        $this->userRepository = $userRepository;
    }

    public function index() 
    {   
        $users = User::all();
        return  view('crud-index')->with('users', $users);
    }
    public function create()
    {
        return view('crud-create');
    }
    public function store(Request $request)
    {   
       request()->validate([
            'name'      =>  'required',
            'email'     =>  'required',
            'password'  => 'required'
        ],
        [   
            'name.required'     => 'Hey. Need a name',
            'email.required'    => 'Hey. Need a email',
            'password.required' => 'What about pass?'            
        ]);

       $user = new User();
       $user->name = $request->input('name');
       $user->email = $request->input('email');
       $user->password = Hash::make($request->input('password'));
       $user->save();
       return redirect('/crud')->with('message', "User Created");
    }
    public function edit(User  $user) {
        return view('crud-edit')->with('user', $user);
    }
    public function update(Request $request, $id, UserRepository $userRepository)
    {
        request()->validate([
            'name'      =>  'required',
            'email'     =>  'required',
            'password'  =>  ''
        ],
        [   
            'name.required'     => 'Hey. Need a name',
            'email.required'    => 'Hey. Need a email',
        ]);

        $userRepository->update($id, [
            'name'      =>  $request->input('name'),
            'email'     =>  $request->input('email'),
            'password'  =>  Hash::make($request->input('password'))
        ]);

        return redirect('/crud')->with('message', "User Updated");
    }

    public function delete(User $user, UserRepository $userRepository) 
    {
        $userRepository->deleteById($user->id);
        return redirect('/crud')->with('message', 'User deleted');
    }
}
