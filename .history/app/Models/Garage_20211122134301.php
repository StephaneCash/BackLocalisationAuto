<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specialiste;
use App\Models\Specialite;

class Garage extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'adresse', 'description', 'latitude', 'longitude', 'marque_vehicule', 'image'];

    public function specialistes()
    {
        return $this->hasMany(Specialiste::class);
    }

    public function specialites()
    {
        return $this->belongsToMany(Specialite::class);
    }
}