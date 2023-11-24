<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('titulares', function (Blueprint $table) {            
            $table->id();
            $table->string('apellido', 100);
            $table->string('nombre',100);
            $table->char('dni',8);
            $table->string('domicilio',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('titulares');
    }
};
