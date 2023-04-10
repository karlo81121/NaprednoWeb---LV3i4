@extends('layouts.frontend')

@section('content')

<div class="container row">
    <div class="col-md-3">
        <br>
        <h3>Uredi projekt</h3>
        <br>
        <form method="POST" action="{{  route('project.update') }}" >
            <input type="hidden" name="id" value="{{ $data->id }}">
            {{ csrf_field() }}
            <div class="from-group mb-2">
                <input type="text" id="clanovi" name="clanovi" class="form-control" value="{{ $data->clanovi }}" placeholder="Unesi novog člana projekta">
            </div>
            <div class="form-group mb-2">
                <input type="text" id="naziv_projekta" name="naziv_projekta" class="form-control" value="{{ $data->naziv_projekta }}" placeholder="Unesi novi naziv projekta"> 
            </div>
            <div class="from-group mb-2">
                <input type="text" id="opis_projekta" name="opis_projekta" class="form-control" value="{{ $data->opis_projekta }}" placeholder="Unesi novi opis projekta">
            </div>
            <div class="from-group mb-2">
                <input type="number" id="cijena_projekta" name="cijena_projekta" class="form-control" value="{{ $data->cijena_projekta }}" placeholder="Unesi novu cijenu projekta">
            </div>
            <div class="from-group mb-2">
                <input type="text" id="obavljeni_poslovi" name="obavljeni_poslovi" class="form-control" value="{{ $data->obavljeni_poslovi }}" placeholder="Unesi nove obavljene poslove">
            </div>
            <div class="from-group mb-2">
                <input type="date" id="datum_pocetka" name="datum_pocetka" class="form-control" value="{{ $data->datum_pocetka }}" placeholder="Unesi novi datum početka">
            </div>
            <div class="from-group mb-2">
                <input type="date" id="datum_zavrsetka" name="datum_zavrsetka" class="form-control" value="{{ $data->datum_zavrsetka }}" placeholder="Unvesi novi datum završetka">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary bg-primary" value="Spremi">
            </div>
        </form>
    </div>
</div>

@endsection