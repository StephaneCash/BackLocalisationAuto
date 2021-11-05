<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Garage;

class Specialiste extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'postnom', 'prenom', 'adresse', 'description', 'telephone', 'image'];

    public function garage()
    {
        return $this->belongsTo(Garage::class);
    }
}