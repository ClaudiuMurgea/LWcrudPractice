@extends('layouts.app')
@section('content')
    <h1>{{ $user->name}}</h1>
    <div class="wrapper">
       
        <form action="/update/{{ $user->id }}" method="POST">
        @csrf
            <div class="container">
                <div class="each">
                    <input type="text" name="name" value="{{ $user->name }}">
                    @error('name')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="each">
                    <input type="text" name="email" value="{{ $user->email }}">
                    @error('email')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="each">
                    <input type="password" name="password" placeholder="New password...">
                    @error('password')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="each">
                    <button type="submit"  class="button">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection