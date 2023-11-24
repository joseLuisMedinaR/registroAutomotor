<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('infracciones', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('auto_id')->unsigned();
            $table->date('fecha');
            $table->text('descripcion');
            $table->enum('tipo',['alta velocidad', 'doble fila','alcoholemia','falta de documentacion']);
            $table->timestamps();

            $table->foreign('auto_id')->references('id')->on('autos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('infracciones');
    }
};
