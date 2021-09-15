<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciaArquivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_arquivos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('ocorrencia_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('ocorrencia_mensagem_id')->nullable();
            $table->string('caminho');
            $table->string('arquivo');
            $table->string('url');
            $table->string('mime');
            $table->timestamps();

            $table->foreign('ocorrencia_mensagem_id')->references('id')->on('ocorrencia_mensagens')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrencia_arquivos');
    }
}
