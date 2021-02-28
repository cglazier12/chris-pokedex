<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemon';

    public function getStats()
    {

        /*
         *  I do not actually know why I needed to use toArray() to get this to work. Try dumping the return value with and without the toArray() to see what I mean.
         *  I am not sure what I have or am currently doing wrong but I do not know why I dont get what I expect without the toArray(), as it currently is it returns what I expect it to return.
         *
         *      ¯\_(ツ)_/¯
         */

        $stats = $this->hasOne(PokemonStat::class, 'poke_id', 'poke_id')
          ->select('hp', 'attack', 'defense', 'special_attack', 'special_defense', 'speed')
          ->first();

        return $stats->toArray();
    }
}
