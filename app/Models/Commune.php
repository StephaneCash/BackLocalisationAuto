<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Garage;

class Commune extends Model
{
    protected $fillable = ['nom', 'description'];
    use HasFactory;

    public function garages()
    {
        return $this->hasMany(Garage::class);
    }
}
