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