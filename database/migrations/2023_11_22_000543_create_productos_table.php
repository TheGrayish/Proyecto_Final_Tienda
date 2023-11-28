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

        Schema::create('productos', function (Blueprint $table) {
            $table->id('id');
            $table->string('descripcion');
            $table->integer('precio');
            $table->string('nombre');
            $table->integer('stock');
            $table->string('imagen')->nullable();
            
            //  // Agregar columna para la relación con facturas
            //  $table->foreignId('factura_id')->nullable();
            //  $table->foreign('factura_id')->references('id')->on('facturas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};

