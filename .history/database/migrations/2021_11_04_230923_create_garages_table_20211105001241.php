<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGaragesTable extends Migration
{
    public function up()
    {
        Schema::create('garages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nom');
            $table->text('adresse');
            $table->text('description');
            $table->double('latitude');
            $table->double('longitude');
        });
    }

    public function down()
    {
        Schema::dropIfExists('garages');
    }
}