<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prefeitura_id')->constrained()->onDelete('cascade');
            $table->string('codigo')->unique();
            $table->string('titulo');

            // Documento é usado CPF ou CNPJ
            $table->string('tipo');
            $table->string('documento')->nullable();

            // Dados do endereço
            $table->string('cep')->nullable();
            $table->string('logradouro')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro');
            $table->string('cidade');
            $table->char('estado', 2);

            // Dados para pessoas fisicas
            $table->string('genero')->nullable();
            $table->date('nascido_em')->nullable();
            $table->string('estado_civil')->nullable();
            $table->string('escolaridade')->nullable();
            $table->string('profissao')->nullable();
            $table->string('conjugue_nome')->nullable();
            $table->date('conjugue_nascido_em')->nullable();
            $table->integer('filhos')->nullable()->default(0);
            $table->decimal('renda', 16, 2)->nullable()->default(0);
            $table->string('residencia_tipo')->nullable();
            $table->string('moradia_tipo')->nullable();
            $table->integer('influencia')->nullable()->default(0);

            // Dados para pessoas jurídicas
            $table->string('ramo_atuacao')->nullable();
            $table->date('fundada_em')->nullable();
            $table->integer('colaboradores_quantidade')->nullable();

            $table->longText('observacao')->nullable();
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
        Schema::dropIfExists('pessoas');
    }
}
