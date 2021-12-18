<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Commune;

class CommuneController extends Controller
{
    public function index()
    {
        $commune = Commune::with('garages')->get();
        return response()->json($commune);
    }
}
