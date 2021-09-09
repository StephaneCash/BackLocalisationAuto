<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Specialiste;

class SpecialistesController extends Controller
{
    public function index() {
        $specialiste = Specialiste::with('specialte')->get();
        return response()->json($specialiste);
    }

    public function store(Request $request)
    {
        $specialiste = new Specialiste;
        $specialiste->nom = $request->nom;
        $specialiste->postnom = $request->postnom;
        $specialiste->prenom = $request->prenom;
        $specialiste->adresse = $request->adresse;
        $specialiste->specialite_id = $request->specialite_id;

        $specialiste->save();
        return response()->json($specialiste);
    }

    public function show($id)
    {
        $specialiste = Specialiste::findOrFail($id);
        return response()->json($specialiste);
    }

    public function update(Request $request, $id)
    {
        $specialiste = Specialiste::findOrFail($id);
        $specialiste->nom = $request->nom;
        $specialiste->postnom = $request->postnom;
        $specialiste->prenom = $request->prenom;
        $specialiste->adresse = $request->adresse;
        $specialiste->specialite_id = $request->specialite_id;

        $specialiste->save();
        return response()->json($specialiste);
    }

    public function destroy($id){
        $specialiste = Specialiste::findOrFail($id);
        $specialiste->delete();
        return response()->json($specialiste);
    }
}
