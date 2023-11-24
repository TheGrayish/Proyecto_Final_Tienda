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
            
            // $table->bigIncrements('Id_Proveedor')->default(0);
            
            // $table->foreign('Id_Proveedor')->references('id')->on('provedors');
            
          #  $table->primary('id');
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

