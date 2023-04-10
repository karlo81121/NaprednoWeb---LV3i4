@extends('layouts.frontend')

@section('content')


<div class="container mt-3">
    <h1>Welcome to Laravel Application!</h1>
    <p>This is the home page.</p>

    <div>
        @if (Route::has('login'))
            <div>
                @auth
                    <a class="text-decoration-none text-primary" href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a class="text-decoration-none text-primary mx-1" href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                    <a class="text-decoration-none text-primary mx-1" href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
        @endif
    </div>
</div>

@endsection