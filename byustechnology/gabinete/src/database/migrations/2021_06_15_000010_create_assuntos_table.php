<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssuntosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assuntos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prefeitura_id')->contrained()->onDelete('cascade');
            $table->string('codigo');
            $table->string('titulo');
            $table->text('descricao')->nullable();
            $table->string('cor', 8)->default('#000000');
            $table->string('cor_texto', 10)->default('white');
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
        Schema::dropIfExists('assuntos');
    }
}
