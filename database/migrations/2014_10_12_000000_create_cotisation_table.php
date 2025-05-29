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
        Schema::create('cotisation', function (Blueprint $table) {
            $table->id();
            $table->float('Montant');
			$table->timestamp('Date_cotisation');
            $table->foreignId('id_membre')->constrained('membre');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cotisation');
    }
};
