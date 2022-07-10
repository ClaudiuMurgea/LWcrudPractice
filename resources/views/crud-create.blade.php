@extends('layouts.app')
@section('content')
    <h1>Hello World!</h1>
    <div class="wrapper">
        <form action="/create" method="POST">
        @csrf
            <div class="container">
                <div class="each">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Name...">
                    @error('name')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="each">
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email...">
                    @error('email')
                        <span style="color:red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="each">
                    <input type="password" name="password" value="{{ old('password') }}" placeholder="Password...">
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