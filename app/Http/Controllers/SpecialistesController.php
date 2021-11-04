<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Specialiste;

class SpecialistesController extends Controller
{
    public function index()
    {
        $specialiste = DB::select('SELECT * FROM specialistes, specialites, specialistesSpecialites
             WHERE specialistesSpecialites.id_specialiste =  specialistes.id_specialiste 
             AND specialites.id_specialite = specialistesSpecialites.id_specialite');
        return response()->json($specialiste);
    }

    public function store(Request $request)
    {

        $nom_specialiste = $request->nom_specialiste;
        $postnom_specialiste = $request->postnom_specialiste;
        $prenom_specialiste = $request->prenom_specialiste;
        $telephone_specialiste = $request->telephone;

        $nom_specialite = $request->nom_specialite;
        $description_specialite = $request->description_specialite;

        $specialiste = DB::insert("INSERT INTO specialistes 
            (nom_specialiste, postnom_specialiste, prenom_specialiste, telephone) 
            VALUES('$nom_specialiste', '$postnom_specialiste', '$prenom_specialiste', '$telephone_specialiste')");

        $id_specialiste = DB::table('specialistes')->max('id_specialiste');

        DB::insert("INSERT INTO specialites (nom_specialite, description_specialite)
                VALUES('$nom_specialite', '$description_specialite')");

        $id_specialite = DB::table('specialites')->max('id_specialite');

        DB::insert("INSERT INTO specialistesSpecialites(id_specialiste, id_specialite) 
            VALUES('$id_specialiste', '$id_specialite')");

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
        $specialiste->description = $request->description;
        $specialiste->telephone = $request->telephone;
        $specialiste->image = $request->image;
        $specialiste->specialite_id = $request->specialite_id;

        $specialiste->save();
        return response()->json($specialiste);
    }

    public function destroy($id)
    {
        $specialiste = Specialiste::findOrFail($id);
        $specialiste->delete();
        return response()->json($specialiste);
    }
}