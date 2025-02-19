<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bitacoras', function (Blueprint $table) {
            $table->id();
            $table->json('tipo_documento')->nullable();
            $table->string('numero_documento')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('celular')->nullable();
            $table->string('correo')->nullable();
            $table->json('tipo_alternativa')->nullable();
            $table->string('estado_sofia')->nullable();
            $table->string('fichas')->nullable();
            $table->string('estado_ficha')->nullable();
            $table->string('instructores')->nullable();
            $table->string('programa_formacion')->nullable();
            $table->string('numero_radicado')->nullable();
            $table->json('numero_bitacoras')->nullable(); // Ahora es JSON
            $table->timestamp('fecha_asignacion')->nullable();
            $table->timestamp('fecha_inicio_ep')->nullable();
            $table->timestamp('fecha_fin_ep')->nullable();
            $table->timestamp('fecha_corte')->nullable();
            $table->timestamp('fecha_18_meses')->nullable();
            $table->text('observaciones')->nullable();
            $table->text('juicios_evaluativos')->nullable();
            $table->json('momentos')->nullable(); // Ahora es JSON
            $table->string('paz_salvo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('bitacoras');
    }
};
