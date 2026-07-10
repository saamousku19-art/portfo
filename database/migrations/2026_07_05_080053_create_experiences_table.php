<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('experiences', function (Blueprint $table) {
        $table->id();
        $table->string('poste');               // Ex: "Développeur Web"
        $table->string('entreprise');          // Ex: "Google"
        $table->string('lieu')->nullable();    // Ex: "Paris" (nullable = peut être vide)
        $table->date('date_debut');            // Date de début
        $table->date('date_fin')->nullable();  // Date de fin (null = toujours en poste)
        $table->text('description')->nullable(); // La description de la mission
        $table->integer('ordre')->default(0);  // Pour trier comme tu veux
        $table->timestamps();    // created_at et updated_at
        });
    }

    
};
