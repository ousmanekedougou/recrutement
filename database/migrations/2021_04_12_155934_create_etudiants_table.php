<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etudiants', function (Blueprint $table) {
            $table->id();
            $table->boolean('genre')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->datetime('naissance');
            $table->string('lieu');
            $table->string('niveau');
            $table->string('diplome');
            $table->string('curiculum');
            $table->string('image');
            $table->string('identite')->unique();
            $table->integer('commune_id');
            $table->string('etablissement');
            $table->string('status');
            $table->string('filliere');
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
        Schema::dropIfExists('etudiants');
    }
}
