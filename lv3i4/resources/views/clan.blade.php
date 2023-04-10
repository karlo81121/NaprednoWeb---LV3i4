@extends('layouts.frontend')

@section('content')

<div class="container row">
    <div class="col-md-3">
        <br>
        <h3>Uredi projekt</h3>
        <br>
        <form method="POST" action="{{  route('clan.update') }}" >
            <input type="hidden" name="id" value="{{ $data->id }}">
            {{ csrf_field() }}
            <div class="from-group mb-2">
                <input type="text" id="obavljeni_poslovi" name="obavljeni_poslovi" class="form-control" value="{{ $data->obavljeni_poslovi }}" placeholder="Unesi nove obavljene poslove">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary bg-primary" value="Spremi">
            </div>
        </form>
    </div>
</div>

@endsection
