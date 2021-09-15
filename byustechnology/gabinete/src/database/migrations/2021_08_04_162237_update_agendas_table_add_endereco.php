<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateAgendasTableAddEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agendas', function (Blueprint $table) {
            $table->after('cor', function($table) {
                $table->string('cep')->nullable();
                $table->string('logradouro')->nullable();
                $table->string('numero')->nullable();
                $table->string('complemento')->nullable();
                $table->string('bairro')->nullable();
                $table->string('cidade')->nullable();
                $table->char('estado', 2)->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('agendas', function (Blueprint $table) {
            $table->dropColumn([
                'cep', 
                'logradouro', 
                'numero', 
                'complemento', 
                'bairro', 
                'cidade', 
                'estado' 
            ]);
        });
    }
}
