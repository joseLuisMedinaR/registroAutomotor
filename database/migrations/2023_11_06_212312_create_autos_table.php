<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('titular_id')->unsigned();
            $table->string('marca',100);
            $table->string('modelo', 100);
            $table->string('patente',15) -> Unique;
            $table->enum('tipo', ['standar','suv','camioneta','camion']);
            $table->timestamps();

            $table->foreign('titular_id')->references('id')->on('titulares')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('autos');
    }
};
