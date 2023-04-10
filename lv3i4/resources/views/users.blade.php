@extends('layouts.frontend')

@section('content')

<div class="container">
    <br>
    <h3><b>Popis korisnika koje je moguće dodati kao članove na projekt.</b></h3>
    <br>
    <hr>
    @foreach($user as $userdata)
        <p><b>Ime:</b> {{ $userdata->name }}</p>
        <p><b>Email:</b> {{ $userdata->email }}</p>
        <hr>
    @endforeach
</div>

@endsection