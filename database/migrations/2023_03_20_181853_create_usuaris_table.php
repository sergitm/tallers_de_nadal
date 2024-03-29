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
        Schema::create('usuaris', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nom');
            $table->string('cognoms')->nullable();
            $table->enum('categoria', ['alumne', 'professor'])->default('alumne');
            $table->string('etapa')->nullable();
            $table->string('curs')->nullable();
            $table->string('grup')->nullable();
            $table->boolean('admin')->default(false);
            $table->boolean('superadmin')->default(false);
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuaris');
    }
};
