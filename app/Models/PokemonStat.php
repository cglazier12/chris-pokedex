<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonStat extends Model
{
    use HasFactory;

    public function getPokemon()
    {
        // notice how the in the Pokemon model we have hasOne() instead of the belongsTo() they are the inverse of each other and explain the relationship more explicitly
        // in this case pokemon can have stats, and stats belong to pokemon
        return $this->belongsTo('App\Models\Pokemon', 'poke_id', 'poke_id')
          ->select('hp', 'poke_id', 'attack', 'defense', 'special_attack', 'special_defense', 'speed')
          ->first();
    }
}
