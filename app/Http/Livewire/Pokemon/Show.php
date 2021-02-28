<?php

namespace App\Http\Livewire\Pokemon;

use Livewire\Component;

class Show extends Component
{

    public $pokemon;

    public function mount()
    {

        $ability = json_decode(file_get_contents($this->pokemon->ability_url, true));

        $this->pokemon->ability_desc = $ability->effect_entries[1]->effect;

        // alter the pokemon->id to be in this format #xxx, this means adding digits to lower id pokemon until there are at least three digits by prepending the 0s to the id
        $this->pokemon->display_id = $this->pokemon->id;

    }


    public function render()
    {
        return view('livewire.pokemon.show');
    }
}
