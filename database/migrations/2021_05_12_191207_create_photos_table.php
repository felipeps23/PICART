<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('iduser')->unsigned();
            $table->bigInteger('idpreset')->unsigned();
            $table->longtext('photo');
            $table->string('camera');
            $table->string('lens');
            $table->string('shutter_speed');
            $table->string('iso');
            $table->string('focal');
            $table->string('type');
            
            $table->timestamps();
            
            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('idpreset')->references('id')->on('presets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
