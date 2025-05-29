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
        Schema::create('utilisateurressource', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('Quantite_utilise');
            $table->foreignId('id_projet')->constrained('projetagricole');
			$table->foreignId('Id_ressource')->constrained('ressource');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilisateurressource');
    }
};
