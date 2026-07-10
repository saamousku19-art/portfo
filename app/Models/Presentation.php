<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presentation extends Model
{
    protected $fillable = ['prenom', 'nom', 'date_naissance', 'lieu_naissance', 'titre', 'contenu', 'photo', 'statut'];
}
