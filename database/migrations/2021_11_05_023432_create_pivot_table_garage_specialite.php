<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotTableGarageSpecialite extends Migration
{
    public function up()
    {
        Schema::create('garage_specialite', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('garage_id');
            $table->foreign('garage_id')->references('id')->on('garages')->onDelete('cascade');

            $table->unsignedBigInteger('specialite_id');
            $table->foreign('specialite_id')->references('id')->on('specialites')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('garage_specialite');
    }
}