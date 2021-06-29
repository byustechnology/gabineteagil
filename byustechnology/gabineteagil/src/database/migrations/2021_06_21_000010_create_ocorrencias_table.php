<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prefeitura_id')->constrained()->onDelete('cascade');
            $table->foreignId('pessoa_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('assunto_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('etapa_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('orgao_responsavel_id')->nullable();
            $table->string('titulo');
            $table->longText('descricao');
            $table->timestamps();

            $table->foreign('orgao_responsavel_id')->references('id')->on('orgaos_responsaveis')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrencias');
    }
}
