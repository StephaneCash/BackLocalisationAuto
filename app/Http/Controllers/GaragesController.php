<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaragesController extends Controller
{
    public function index()
    {
        $specialiste = DB::select('SELECT * FROM garages, specialites, garagesSpecialites
             WHERE garagesSpecialites.id_garage =  garages.id_garage
             AND specialites.id_specialite = garagesSpecialites.id_specialite
             ');
        return response()->json($specialiste);
    }

    public function store(Request $request)
    {
        $adresse_garage = $request->adresse_garage;
        $nom_garage = $request->nom_garage;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $description_garage = $request->description_garage;

        $nom_specialite = $request->nom_specialite;
        $description_specialite = $request->description_specialite;

        $garages = DB::insert("INSERT INTO garages 
            (adresse_garage, nom_garage, latitude, longitude, description_garage) 
            VALUES('$adresse_garage', '$nom_garage', '$latitude', '$longitude', '$description_garage')");

        $id_garage = DB::table('garages')->max('id_garage');

        DB::insert("INSERT INTO specialites (nom_specialite, description_specialite)
                VALUES('$nom_specialite', '$description_specialite')");

        $id_specialite = DB::table('specialites')->max('id_specialite');

        DB::insert("INSERT INTO garagesSpecialites(id_specialite, id_garage) 
            VALUES('$id_specialite', '$id_garage')");

        return response()->json($garages);
    }
}