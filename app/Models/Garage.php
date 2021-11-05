<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specialiste;

class Garage extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'adresse', 'description', 'latitude', 'longitude'];

    public function specialistes()
    {
        return $this->hasMany(Specialiste::class);
    }
}