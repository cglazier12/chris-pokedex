<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokemon_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poke_id');
            $table->integer('hp');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('special_attack');
            $table->integer('special_defense');
            $table->integer('speed');
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
        Schema::dropIfExists('pokemon_stats');
    }
}
