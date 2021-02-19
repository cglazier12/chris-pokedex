const poke_container = document.getElementById('poke_container');
const pokemons_number = 150;

const fetchPokemons = async () => {
    for (let i = 1; i <= pokemons_number; i++) {
        await getPokemon(i);
    }
};

const getPokemon = async id => {
    const url =`https://pokeapi.co/api/v2/pokemon/${id}`;
    const res = await fetch(url);
    const pokemon = await res.json();
    createPokemonCard(pokemon);
}

// this looks really nice, good job. Making html templates in js is my absolute least favorite activity but this looks really clean.
const createPokemonCard = (pokemon) => {
    const pokemonEl = document.createElement('div');
    pokemonEl.classList.add('pokemon');
    const { id, name, sprites, types } = pokemon;
    const type = types[0].type.name;
    const pokeInnerHTML = `
  <div class="img-container">
    <img src="${sprites.front_default}" alt="${name}" />
  </div>
  <div class="info">
    <span class="number">${id}</span>
    <h3 class="name">${name}</h3>
    <small class="type">Type: <span>${type}</span></small>
  </div>
  `;
    pokemonEl.innerHTML = pokeInnerHTML;
    poke_container.appendChild(pokemonEl);
}

fetchPokemons();

// <div class="img-container">
// <div className="max-w-xs rounded overflow-hidden shadow-lg my-2">
//     <img className="w-full" src="${sprites.front_default}" alt="Sunset in the mountains">
//         <div className="px-6 py-4">
//             <div className="font-bold text-xl mb-2">The Coldest Sunset</div>
//             <p className="text-grey-darker text-base">
//                 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et
//                 perferendis eaque, exercitationem praesentium nihil.
//             </p>
//         </div>
//         <div className="px-6 py-4">
//             <span
//                 className="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#photography</span>
//             <span
//                 className="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#travel</span>
//             <span
//                 className="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#winter</span>
//         </div>
// </div>
// </div>
