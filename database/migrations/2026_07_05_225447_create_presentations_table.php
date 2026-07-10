<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('presentations', function (Blueprint $table) {
            $table->id();
        
            // === NOUVEAUX CHAMPS (ceux qu'il te faut) ===
            $table->string('prenom');               // Ex: "Jean"
            $table->string('nom');                  // Ex: "Dupont"
            $table->date('date_naissance');         // Ex: "1995-05-15"
            $table->string('lieu_naissance');       // Ex: "Abidjan"
        
            // === ANCIENS CHAMPS ===
            $table->string('titre')->nullable();    // Ex: "Développeur Web" (on le rend facultatif)
            $table->text('contenu');                // La biographie longue
            $table->string('photo')->nullable();    // Le chemin de l'image de profil
            $table->string('statut')->default('publie'); 
            $table->timestamps();
        });
    }
};
