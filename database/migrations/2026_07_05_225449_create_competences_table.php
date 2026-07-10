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
            Schema::create('competences', function (Blueprint $table) {
                $table->id();
                $table->string('nom');                  // Ex: "PHP", "Laravel", "JavaScript"
                $table->string('categorie')->nullable(); // Ex: "Backend", "Frontend", "Base de données"
                $table->string('niveau')->nullable();    // Ex: "Expert", "Intermédiaire", "Débutant"
                $table->string('icone')->nullable();     // Ex: "fab fa-php" (pour FontAwesome)
                $table->integer('ordre')->default(0);
                $table->timestamps();
    });
}
    
};
