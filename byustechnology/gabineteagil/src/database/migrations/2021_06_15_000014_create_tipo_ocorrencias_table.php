<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_ocorrencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prefeitura_id')->contrained()->onDelete('cascade');
            $table->string('titulo');
            $table->longText('descricao')->nullable();
            $table->longText('template')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_ocorrencias');
    }
}
