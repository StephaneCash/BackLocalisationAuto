<?php

namespace App\Http\Controllers;

use App\Models\Specialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SpecialitesController extends Controller
{
    public function index()
    {
        $specialites = DB::select('SELECT * FROM specialites, specialistes, specialistesSpecialites
             WHERE specialistesSpecialites.id_specialite =  specialites.id_specialite 
             AND specialistes.id_specialiste = specialistesSpecialites.id_specialiste');
        return response()->json($specialites);
    }

    public function store(Request $request)
    {
        $specialite = new Specialite;
        $specialite->nom = $request->nom;
        $specialite->description = $request->description;

        $specialite->save();
        return response()->json($specialite);
    }

    public function show($id)
    {
        $specialites = Specialite::findOrFail($id); // Récupérer les données d'un id
        return response()->json($specialites);
    }

    public function update(Request $request, $id)
    {
        $specialite = Specialite::findOrFail($id);
        $specialite->nom = $request->nom;
        $specialite->description = $request->description;

        $specialite->save();
        return response()->json($specialite);
    }

    public function destroy($id)
    {
        $specialite = Specialite::findOrFail($id);
        $specialite->delete();
        return response()->json($specialite);
    }
}