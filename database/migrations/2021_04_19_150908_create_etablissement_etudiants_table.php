<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtablissementEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etablissement_etudiants', function (Blueprint $table) {
            $table->id();
                   $table->unsignedBigInteger('etablissement_id');
            $table->foreign('etablissement_id')
                ->references('id')
                ->on('etablissements')
                ->onDelete('cascade');
            $table->unsignedBigInteger('etudiant_id');
            $table->foreign('etudiant_id')
                ->references('id')
                ->on('etudiants')
                ->onDelete('cascade');
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
        Schema::dropIfExists('etablissement_etudiants');
    }
}
