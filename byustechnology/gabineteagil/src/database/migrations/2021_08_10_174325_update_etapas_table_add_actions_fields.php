<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEtapasTableAddActionsFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('etapas', function (Blueprint $table) {
            $table->after('cor_texto', function($table) {
                $table->boolean('conclui')->default(false);
                $table->boolean('cancela')->default(false);
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
        Schema::table('etapas', function (Blueprint $table) {
            $table->dropColumn(['conclui', 'cancela']);
        });
    }
}
