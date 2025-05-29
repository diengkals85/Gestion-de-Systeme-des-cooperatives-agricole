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
        Schema::create('transactionfinanciere', function (Blueprint $table) {
            $table->id();
            $table->string('type_transaction');
			$table->float('Montant');
			$table->text('Description_transaction');
			$table->timestamp('Date_transaction');
            $table->foreignId('Id_cooperative')->constrained('cooperative');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactionfinanciere');
    }
};
