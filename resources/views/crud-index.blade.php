@extends('layouts.app')
@section('content')
    <h1 style="text-align:center;">Hello World!</h1>
    @if(Session::has('message'))
        <p style="width:100%; padding:1rem 0; background:red;color:white;text-align:center;font-size:2rem;shadow-box:3px solid #000;">{{ Session::get('message') }}</p>
    @endif
    <div>
        <a href="/crud-create">
            Add User
        </a>
    </div>
    <table>
        <thead>
            <tr>
                <th class="border">Name</th>
                <th class="border">Email</th>
                <th class="border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border">{{ $user->name }}</td>
                    <td class="border">{{ $user->email }}</td>
                    <td class="border">
                        <div style="display:flex;">
                            <div>
                                <form action="/crud-edit/{{ $user->id }}" method="GET">
                                    <button type="submit" class="button">Edit</button>
                                </form>
                            </div>
                            <div>
                                <form action="/crud-delete/{{ $user->id }}" method="GET">
                                    <button type="submit" class="button">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
           
        </tbody>
    </table>    
@endsection