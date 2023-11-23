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
        Schema::create('pertenece__a_s', function (Blueprint $table) {
            $table->unsignedBigInteger('IdProducto');
            $table->unsignedBigInteger('IdCategoria');

            $table->foreign('IdProducto')->references('id')->on('productos');
            $table->foreign('IdCategoria')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertenece__a_s');
    }
};
