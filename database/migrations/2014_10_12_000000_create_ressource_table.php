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
        Schema::create('ressource', function (Blueprint $table) {
            $table->id();
            $table->string('nom_ressource');
			$table->string('Type_ressource');
			$table->bigInteger('Qte_ressource');
			$table->string('Status');
			$table->foreignId('id_cooperative')->constrained('cooperative');
		           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ressource');
    }
};
