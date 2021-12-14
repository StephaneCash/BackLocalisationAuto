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
        $specialiste = new Specialiste;

        $specialiste->nom = $request->nom;
        $specialiste->postnom = $request->postnom;
        $specialiste->prenom = $request->prenom;
        $specialiste->telephone = $request->telephone;

        $specialiste->save();
        return response()->json($specialiste);
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}