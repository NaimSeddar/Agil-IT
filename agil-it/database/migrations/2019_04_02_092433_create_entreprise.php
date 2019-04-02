<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntreprise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprise', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('nomPDG');
            $table->string('siret');
            $table->string('siteP');
            $table->string('batimentP');
            $table->boolean('valider');
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

        Schema::dropIfExists('entreprise');

    }
}
