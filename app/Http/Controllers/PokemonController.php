<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonStat;
use Illuminate\Http\Request;
use Auth;
use PokePHP\PokeApi;


class PokemonController extends Controller
{
    Public function addPoke(){
        //add a given Pokemon to the users team
    }


    Public function delPoke(){
        //delete a given pokemon from the users team

    }

    Public function team()
    {
        /*
         *  this is how easy it can be, it likely never will be this simple but all we really need to do
         *  is get all the pokemon owned by this user and pass it to the view. This can be done with just one line of code
         */

        $pokemons = Pokemon::where('user_id', Auth::id())->get();

        return view('team', ['pokemons' => $pokemons]);
    }

    Public function pokedex()
    {
        return view('pokedex');
    }

    Public function show(int $id)
    {

        $api = new PokeApi;

        $poke = json_decode($api->pokemon($id));

        // lets check to see if we already have the stats for this pokemon saved
        // NOTE: this is not the most efficient way to do this. but its a nice little exercise none the less

        if (is_null(PokemonStat::where('poke_id', $id)->first())) {

            $pokemon_stats = new PokemonStat();

            $pokemon_stats->poke_id = $id;

            foreach ($poke->stats as $stat) {

                $statName = $stat->stat->name;

                $pokemon_stats->{str_replace('-', '_', $statName )} = $stat->base_stat;

            }

            $pokemon_stats->save();

        }

        // we are not going to save it to the db yet but we are going to instantiate a new Pokemon class and format the $poke data to pass only what we need to the view.
        // is a little confusing to be passing information from $poke variable to $pokemon variable but bear with me. $pokemon is the new object and $poke is the decoded json response from the api
        $pokemon = new Pokemon();

        $pokemon->poke_id = $id;
        $pokemon->name = ucwords($poke->name);
        $pokemon->sprite = $poke->sprites->front_default;
        $pokemon->type_primary_name = $poke->types[0]->type->name;
        $pokemon->type_primary_url = $poke->types[0]->type->url;

        if (isset($poke->types[1])) {

            $pokemon->type_secondary_name = $poke->types[1]->type->name;
            $pokemon->type_secondary_url = $poke->types[1]->type->url;

        }

        $pokemon->ability_name = $poke->abilities[0]->ability->name;
        $pokemon->ability_url = $poke->abilities[0]->ability->url;
        $pokemon->height = $poke->height;
        $pokemon->weight = $poke->weight;
        $pokemon->moves = $poke->moves;

        $pokemon->stats = $pokemon->getStats();


        return view('show', ['pokemon' => $pokemon]);
    }

    public function store(Request $request)
    {
        $poke = json_decode($request->pokemon);

        $pokemon = new Pokemon();
        $pokemon->poke_id = $poke->poke_id;
        $pokemon->user_id = Auth::id();
        $pokemon->name = $poke->name;
        $pokemon->sprite = $poke->sprite;
        $pokemon->type_primary_name = $poke->type_primary_name;
        $pokemon->type_primary_url = $poke->type_primary_url;

        if (isset($poke->type_pokemon_name)) {
            $pokemon->type_secondary_name = $poke->type_secondary_name;
            $pokemon->type_secondary_url = $poke->type_secondary_url;
        }

        $pokemon->ability_name = $poke->ability_name;
        $pokemon->ability_url = $poke->ability_url;
        $pokemon->height = $poke->height;
        $pokemon->weight = $poke->weight;
        $pokemon->save();

        // after you save to DB you would put your postmark / twilio logic

        // this is a laravel redirect. I can pass simply messages pack to the view.
        // an if statement in blade will show the message only if $success is set.
        // you can google "laravel session flash" and you will see how to do this.
        // if you travel to the auth folder under views you can check some of the built in session flashes built in to certain page

        return redirect()->back()->with('success', $pokemon->name . ' has successfully been added to your pokedex!');

    }

//    Public function index()
//    {
////        "https://pokeapi.co/api/v2/"
//        $api = new PokeApi;
//        $pokedex = json_decode($api->resourceList('pokemon?limit=151'));
//
//
//        foreach ($pokedex->results as $pokemon) {
//            $pokemon->data = $api->pokemon($pokemon->name);
//            $pokemon->ability = ($api->ability($pokemon->name));
//            dd(json_decode($ability));
//        }
//
//        dd($pokedex->results);
//        Echo $api->pokemon(1);
//    }

}
