<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('team');
    }

    Public function pokedex()
    {
        return view('pokedex');
    }

    Public function show()
    {
        return view('show');
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
