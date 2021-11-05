<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialistesTable extends Migration
{
    public function up()
    {
        Schema::create('specialistes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
            $table->string('telephone');

            $table->unsignedBigInteger('garage_id');
            $table->foreign('garage_id')->references('id')->on('garages');
        });
    }

    public function down()
    {
        Schema::dropIfExists('specialistes');
    }
}