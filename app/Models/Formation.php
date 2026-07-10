<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = ['diplome', 'ecole', 'lieu', 'annee_debut', 'annee_fin', 'description', 'ordre'];
}
