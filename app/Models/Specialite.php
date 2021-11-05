<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Garage;

class Specialite extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    public function garages()
    {
        return $this->belongsToMany(Garage::class);
    }
}