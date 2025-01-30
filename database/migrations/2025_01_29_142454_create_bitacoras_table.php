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
        $table->string('tipo_documento');
        $table->string('numero_documento');
        $table->string('nombre');
        $table->string('apellidos');
        $table->string('celular');
        $table->string('correo');
        $table->string('tipo_alternativa')->nullable();
        $table->string('estado_sofia');
        $table->string('proyecto')->nullable();
        $table->string('arl')->nullable();
        $table->string('ficha');
        $table->string('nombre_programa');
        $table->string('instructor_seguimiento');
        $table->string('numero_radicado')->nullable();
        $table->string('numero_bitacoras')->nullable(); // Almacena como JSON
        $table->date('fecha_asignacion')->nullable();
        $table->date('fecha_inicio_ep');
        $table->date('fecha_fin_ep');
        $table->text('observaciones')->nullable();
        $table->string('momentos')->nullable(); // Almacena como JSON
        $table->string('paz_salvo')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bitacoras');
    }
};
