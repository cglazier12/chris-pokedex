<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    // ALMOST every migration will also have a model associated with it. If you open up your models folder you will see a Pokemon class
    // certain repeatable functions will live in the model but more on that later
    public function up()
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            // this will be a foreign id that equals the id of the user it is assigned to
            $table->foreignId('user_id');
            // this will hold the actual id of the pokemon, we will use it to reference a relational stats table that will hold all the stats for all the pokemon
            $table->foreignId('poke_id');
            // column type string, column name sprite, will hold the url of the physical location of the pokemon sprite
            $table->string('sprite');
            // lets store the type so we can display it
            $table->string('type_primary_name');
            // just an example of all the fun things we can store, we wont be doing anything with this as part of your project
            // but if we wanted to have deeper level of the application we could display a page for your pokemons type that could link off to a new page displaying info retrieved from this url whenever a user clicked a button
            $table->string('type_primary_url');
            // not every pokemon have two types so we will invoke nullable on these two fields so SQL doesnt yell at us if we try to save a record with "non-nullable" fields
            $table->string('type_secondary_name')->nullable();
            $table->string('type_secondary_url')->nullable();
            $table->integer('height');
            $table->integer('weight');
            // this just automatically creates a created_at and updated_at column, created_at only changes when the record pops into existence, updated_at changes anytime a column changes after the record was created
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
        Schema::dropIfExists('pokemon');
    }
}
