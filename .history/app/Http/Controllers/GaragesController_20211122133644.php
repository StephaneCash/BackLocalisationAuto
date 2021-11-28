<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\Specialiste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GaragesController extends Controller
{
    public function index()
    {
        $garage = Garage::with('specialistes', 'specialites')->get();
        return response()->json($garage);
    }

    public function store(Request $request)
    {
        $garage = new Garage;

        $garage->nom = $request->nom;
        $garage->adresse = $request->adresse;
        $garage->description = $request->description;
        $garage->latitude = $request->latitude;
        $garage->longitude = $request->longitude;

        if($request->hasFile('image')){
            $file = $request->file
        }

        $garage->save();
        return response()->json($garage);
    }

    public function show($id)
    {
        $garage = Garage::findOrFail($id); // Récupérer les données d'un id
        return response()->json($garage);
    }

    public function update(Request $request, $id)
    {
        $garage = Garage::findOrFail($id);

        $garage->nom = $request->nom;
        $garage->adresse = $request->adresse;
        $garage->description = $request->description;
        $garage->latitude = $request->latitude;
        $garage->longitude = $request->longitude;

        $garage->save();
        return response()->json($garage);
    }

    public function destroy($id)
    {
        $garage = Garage::findOrFail($id);
        $garage->delete();
        return response()->json($garage);
    }
}