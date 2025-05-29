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
        Schema::create('projetagricole', function (Blueprint $table) {
            $table->id();
            $table->string('Nom_projet');
			$table->text('Description');
			$table->timestamp('Date_debut');
			$table->timestamp('Date_fin');
			 $table->string('Status_projet');
			 $table->string('Responsable');
            $table->foreignId('id_membre')->constrained('membre');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projetagricole');
    }
};
