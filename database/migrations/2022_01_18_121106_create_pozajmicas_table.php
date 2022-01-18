<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePozajmicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pozajmicas', function (Blueprint $table) {
            $table->id();
            $table->dateTime('datum');
            $table->foreignId('knjiga_id');
            $table->foreignId('clan_id');
            $table->string('napomena');
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
        Schema::dropIfExists('pozajmicas');
    }
}
