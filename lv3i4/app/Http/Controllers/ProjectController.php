<?php

namespace App\Http\Controllers;

use Auth;

use App\Models\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::where('user_id', auth()->user()->id)->get();
        $projects = Project::all();
        return view('dashboard', compact('project', 'projects'));
    }

    public function store(Request $request)
    {
        $project = new Project;

        $project->user_id = auth()->user()->id;
        $project->clanovi = $request->clanovi;
        $project->naziv_projekta = $request->naziv_projekta;
        $project->opis_projekta = $request->opis_projekta;
        $project->cijena_projekta = $request->cijena_projekta;
        $project->obavljeni_poslovi = $request->obavljeni_poslovi;
        $project->datum_pocetka = $request->datum_pocetka;
        $project->datum_zavrsetka = $request->datum_zavrsetka;

        $result = $project->save();

        if($result){
            return redirect('/dashboard');
        }
        else {
            return redirect('/login');
        }
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('update', ['data' => $project]);
    }

    public function update(Request $request)
    {
        $project = Project::find($request->input('id'));
        $project->naziv_projekta = $request->naziv_projekta;
        $project->opis_projekta = $request->opis_projekta;
        $project->clanovi = $request->clanovi;
        $project->cijena_projekta = $request->cijena_projekta;
        $project->obavljeni_poslovi = $request->obavljeni_poslovi;
        $project->datum_pocetka = $request->datum_pocetka;
        $project->datum_zavrsetka = $request->datum_zavrsetka;
        $project->save();

        return redirect('/dashboard');
    }

    public function editbymember($id)
    {
        $project = Project::find($id);
        return view('clan', ['data' => $project]);
    }

    public function updatebymember(Request $request)
    {
        $project = Project::find($request->input('id'));
        $project->obavljeni_poslovi = $request->obavljeni_poslovi;
        $project->save();

        return redirect('/dashboard');
    }
}
