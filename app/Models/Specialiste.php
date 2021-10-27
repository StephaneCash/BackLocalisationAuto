<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Specialite;

class Specialiste extends Model
{
    use HasFactory;

    // Champs qui peuvent être modifiés
    protected $fillable = ['nom', 'postnom', 'prenom', 'adresse', 'description', 'telephone', 'image'];

    public function specialte()
    {
        return $this->belongsTo(Specialite::class);
    }
}