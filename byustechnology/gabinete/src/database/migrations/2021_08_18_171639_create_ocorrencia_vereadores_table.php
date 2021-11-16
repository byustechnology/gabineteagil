<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOcorrenciaVereadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ocorrencia_vereadores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prefeitura_id')->contrained()->onDelete('cascade');
            $table->unsignedBigInteger('ocorrencia_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('vereador');
            $table->timestamps();

            $table->foreign('ocorrencia_id')->references('id')->on('ocorrencias')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ocorrencia_vereadores');
    }
}
