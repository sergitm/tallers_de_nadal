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
        Schema::create('tallers', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('creador')->constrained('usuaris')->restrictOnDelete()->cascadeOnUpdate();
            $table->text('descripcio');
            $table->string('adreçat');
            $table->text('material');
            $table->string('aula');
            $table->text('observacions')->nullable();
            $table->boolean('actiu')->default(false);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tallers');
    }
};
