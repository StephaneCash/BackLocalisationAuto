<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Specialiste;

class Specialite extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'description'];

    public function specialistes(){
        return $this->hasMany(Specialiste::class);
    }
}
