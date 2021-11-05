<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Specialiste;

class SpecialistesController extends Controller
{
    public function index()
    {
        $specialiste = Specialiste::with('garage')->get();
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
        $specialiste = DB::select("SELECT * FROM specialistes where id_specialiste = '$id'");
        return response()->json($specialiste);
    }

    public function update(Request $request, $id)
    {
        $nom_specialiste = $request->nom_specialiste;
        $postnom_specialiste = $request->postnom_specialiste;
        $prenom_specialiste = $request->prenom_specialiste;
        $telephone_specialiste = $request->telephone;

        $nom_specialite = $request->nom_specialite;
        $description_specialite = $request->description_specialite;

        $specialiste = DB::update("UPDATE specialistes SET
            nom_specialiste='$nom_specialiste', postnom_specialiste='$postnom_specialiste', 
            prenom_specialiste='$prenom_specialiste', telephone='$telephone_specialiste'
            WHERE id_specialiste='$id'
            ");

        DB::update("UPDATE specialites SET 
            nom_specialite='$nom_specialite', description_specialite='$description_specialite'");
        return response()->json($specialiste);
    }

    public function destroy($id)
    {

        $specialiste = DB::delete("DELETE FROM specialistes WHERE id_specialiste='$id'");
        return response()->json($specialiste);
    }
}