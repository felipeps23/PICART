<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValuationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valuations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('iduser')->unsigned();
            $table->bigInteger('idpreset')->unsigned();
            $table->tinyinteger('valuation')->nullable();
            $table->text('text_valuation');
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
        Schema::dropIfExists('valuations');
    }
}
