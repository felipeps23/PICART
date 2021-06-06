<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('iduser')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->longtext('photo')->nullable();
            $table->longtext('file')->nullable();
            $table->decimal('price', 6,2);
            $table->timestamps();
            
            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presets');
    }
}
