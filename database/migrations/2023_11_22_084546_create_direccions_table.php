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
        Schema::create('direccions', function (Blueprint $table) {
            $table->id();
            $table->string('nocasa');
            $table->string('calle');
            $table->string('estado');
            $table->string('pais');

            // Agregar las claves foráneas
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->unsignedBigInteger('provedor_id')->nullable();
            $table->foreign('provedor_id')->references('id')->on('provedors');

            # $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('direccions');
    }
};

