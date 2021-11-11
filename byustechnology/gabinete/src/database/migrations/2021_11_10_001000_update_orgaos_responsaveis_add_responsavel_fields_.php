<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrgaosResponsaveisAddResponsavelFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orgaos_responsaveis', function (Blueprint $table) {
            // Dados do secretário
            $table->string('responsavel')->nullable()->after('descricao');
            $table->string('responsavel_telefone')->nullable()->after('responsavel');
            $table->string('responsavel_email')->nullable()->after('responsavel_telefone');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orgaos_responsaveis', function (Blueprint $table) {
            $table->dropColumn([
                'responsavel',
                'responsavel_telefone',
                'responsavel_email'
            ]);
        });
    }
}
