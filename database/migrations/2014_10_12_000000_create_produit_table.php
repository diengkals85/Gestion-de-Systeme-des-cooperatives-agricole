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
        Schema::create('produit', function (Blueprint $table) {
            $table->id();
            $table->string('Nom_produit');
			$table->bigInteger('quantite');
			$table->float('prix');
            $table->foreignId('id_membre')->constrained('membre');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit');
    }
};
