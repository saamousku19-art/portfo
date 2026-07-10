<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('formations', function (Blueprint $table) {
        $table->id();
        $table->string('diplome');               // Ex: "Master en Informatique"
        $table->string('ecole');                 // Ex: "Université Félix Houphouët-Boigny"
        $table->string('lieu')->nullable();      // Ex: "Abidjan"
        $table->year('annee_debut');             // Ex: 2018 (type "year" en BDD)
        $table->year('annee_fin')->nullable();   // Ex: 2022 (null = en cours)
        $table->text('description')->nullable();
        $table->integer('ordre')->default(0);
        $table->timestamps();
    });
}
};
