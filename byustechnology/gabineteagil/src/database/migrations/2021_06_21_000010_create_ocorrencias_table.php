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
            $table->string('tipo')->nullable();
            $table->foreignId('prefeitura_id')->constrained()->onDelete('cascade');
            $table->foreignId('pessoa_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('assunto_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('etapa_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('orgao_responsavel_id')->nullable();
            $table->string('titulo');
            $table->longText('descricao');
            $table->string('protocolo')->nullable();

            // Dados do endereço
            $table->string('cep');
            $table->string('logradouro');
            $table->string('numero');
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->char('estado', 2);

            // Data de previsão
            $table->dateTime('prevista_para')->nullable();

            // Conclusão
            $table->dateTime('concluida_em')->nullable();
            $table->longText('concluida_observacao')->nullable();
            $table->unsignedBigInteger('concluida_por')->nullable();

            // Cancelamento
            $table->dateTime('cancelada_em')->nullable();
            $table->longText('cancelada_observacao')->nullable();
            $table->unsignedBigInteger('cancelada_por')->nullable();

            $table->timestamps();

            $table->foreign('orgao_responsavel_id')->references('id')->on('orgaos_responsaveis')->onDelete('set null');
            $table->foreign('concluida_por')->references('id')->on('users')->onDelete('set null');
            $table->foreign('cancelada_por')->references('id')->on('users')->onDelete('set null');
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
