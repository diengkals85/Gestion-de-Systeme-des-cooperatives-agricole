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
        Schema::create('membre', function (Blueprint $table) {
            $table->id();
            $table->string('Nom_membre');
            $table->string('Prenom_membre');
			$table->string('contact_membre');
			$table->string('Status');
            $table->date('Date_adhesion');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membre');
    }
};
