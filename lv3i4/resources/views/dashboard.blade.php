<!DOCTYPE html>
<html>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> 
    </head>

<x-app-layout>

    <div class="container-fluid mt-5 text-center">
        <p class="mt-5 mb-3"><b>OTVORI NOVI PROJEKT</b></p>
        <form action="{{ url('/addproject') }}" method="POST">
            <div class="form-group w-100">
                @csrf
                <input class="mx-1 mt-2 mb-2" type="text" name="naziv_projekta" id="naziv_projekta" placeholder="Naziv">
                <input class="mx-1 mt-2 mb-2" type="text" name="opis_projekta" id="opis_projekta" placeholder="Opis">
                <input class="mx-1 mt-2 mb-2" type="number" name="cijena_projekta" id="cijena_projekta" placeholder="Cijena">
                <input class="mx-1 mt-2 mb-2" type="text" name="clanovi" id="clanovi" placeholder="Članovi">
                <input class="mx-1 mt-2 mb-2" type="text" name="obavljeni_poslovi" id="obavljeni_poslovi" placeholder="Obavljeni poslovi">
                <input class="mx-1 mt-2 mb-2" type="date" name="datum_pocetka" id="datum_pocetka" placeholder="Datum početka">
                <input class="mx-1 mt-2 mb-2" type="date" name="datum_zavrsetka" id="datum_zavrsetka" placeholder="Datum završetka">
                <button type="submit" class="mx-2 mt-2 mb-2 btn btn-primary bg-primary">Dodaj</button>
            </div>
        </form>

        <p class="mt-5 mb-5">Za pregled, dodavanje članova ili izmjenu projekta, potrebno je kliknuti na <b>Uredi.</b></p>
        <p class="mb-5"><b>MOJI PROJEKTI - <u>VODITELJ</u></b></p>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Naziv</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Cijena</th>
                    <th scope="col">Članovi</th>
                    <th scope="col">Obavljeni poslovi</th>
                    <th scope="col">Datum početka</th>
                    <th scope="col">Datum završetka</th>
                    <th scope="col">Uredi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($project as $projdata)
                <tr>
                    <td>{{ $projdata->naziv_projekta }}</td>
                    <td>{{ $projdata->opis_projekta }}</td>
                    <td>{{ $projdata->cijena_projekta }}</td>
                    <td>{{ $projdata->clanovi }}</td>
                    <td>{{ $projdata->obavljeni_poslovi }}</td>
                    <td>{{ $projdata->datum_pocetka }}</td>
                    <td>{{ $projdata->datum_zavrsetka }}</td>
                    <td class="text-center">
                       <a class="bg-primary rounded p-1 text-white" href="{{ route('project.edit', $projdata->id) }}">Uredi</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p class="mt-5 mt-b"><b>MOJI PROJEKTI - <u>ČLAN</u></b></p>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Naziv</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Cijena</th>
                    <th scope="col">Članovi</th>
                    <th scope="col">Obavljeni poslovi</th>
                    <th scope="col">Datum početka</th>
                    <th scope="col">Datum završetka</th>
                    <th scope="col">Uredi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $projdata)
                @if (str_contains($projdata->clanovi, Auth::user()->name))
                <tr>
                    <td>{{ $projdata->naziv_projekta }}</td>
                    <td>{{ $projdata->opis_projekta }}</td>
                    <td>{{ $projdata->cijena_projekta }}</td>
                    <td>{{ $projdata->clanovi }}</td>
                    <td>{{ $projdata->obavljeni_poslovi }}</td>
                    <td>{{ $projdata->datum_pocetka }}</td>
                    <td>{{ $projdata->datum_zavrsetka }}</td>
                    <td class="text-center">
                       <a class="bg-primary rounded p-1 text-white" href="{{ route('clan.edit', $projdata->id) }}">Uredi</a>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>

        <br>
        <a href="{{ route('users') }}">Pogledajte sve KORISNIKE</a>
    </div>

</x-app-layout>
</html>