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
        Schema::create('generas', function (Blueprint $table) {
            $table->bigIncrements('NumeroOrden');
            $table->unsignedBigInteger('IdFacturas');

            $table->foreign('NumeroOrden')->references('id')->on('ordens');
            $table->foreign('IdFacturas')->references('id')->on('facturas');
            # $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generas');
    }
};
