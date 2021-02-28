<div class="mx-16 my-12 flex flex-col">
    <div class="flex flex-row">
        <div class="w-1/4 flex flex-col p-6 bg-blue-200 rounded-lg shadow-poke">

            <!-- name and poke id  -->
            <div class="flex flex-row justify-between">
                <h1 class="text-center">{{ $pokemon->name }}</h1>
                <h2>#{{ sprintf( "%03d", $pokemon->poke_id ) }}</h2>
            </div>

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li class="text-green-500">{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif

            <!-- pokemon sprite -->
            <div class="rounded-full bg-gray-100 w-auto">
                <img class="w-full" src="{{ $pokemon->sprite }}" />
            </div>


            <div class="flex flex-row justify-between mt-6">
            <!--  Pokemon type   -->
                <div class="flex flex-col justify-between">
                    <div class="bg-types-{{ $pokemon->type_primary_name }} py-2 px-4 rounded-lg">
                        <h4 class="text-white text-center">{{ ucwords($pokemon->type_primary_name) }}</h4>
                    </div>

                    @if (isset($pokemon->type_secondary_name))
                        <div class="bg-types-{{ $pokemon->type_secondary_name }} py-2 px-4 rounded-lg">
                            <h4 class="text-white text-center">{{ ucwords($pokemon->type_secondary_name) }}</h4>
                        </div>
                    @endif
                </div>

                <form method="post" id="form" action="{{ route('pokedex.store') }}">
                    <a href="javascript:{}" onclick="document.getElementById('form').submit();">
                        <div class="mt-auto mx-auto">
                            <h3 class="text-center">Catch</h3>
                            <div class="pokeball mx-auto">
                                <div class="pokeball__button"></div>
                            </div>
                        </div>
                    </a>
                    <input name="pokemon" hidden value="{{ $pokemon }}" />
                    @csrf
                </form>
            </div>
        </div>

        <div class="w-3/4 flex flex-col ml-12 h-auto">

            <div class="w-full grid grid-cols-6 gap-6 bg-blue-200 rounded-lg shadow-poke">

                @foreach($pokemon->stats as $name => $value)

                    <div class="flex flex-col py-4">
                        <h4 class="pb-2 text-center">{{ ucwords(str_replace('_', ' ', $name)) }}</h4>
                        <h2 class=" mt-auto text-center">{{ $value }}</h2>
                    </div>

                @endforeach
            </div>

            <div class="flex flex-col h-full w-full mt-12 bg-blue-200 rounded-lg shadow-poke">
                <div class="flex flex-row p-4">
                    <h4 class="">Ability:</h4>
                    <h4 class=" ml-4">{{ ucwords($pokemon->ability_name) }}</h4>
                </div>
                <p class="p-4">{{ $pokemon->ability_desc }}</p>
            </div>

        </div>
    </div>

    <div class="flex flex-row justify-between my-8">
        <a class="bg-ball-red py-2 px-4 rounded-lg" href="{{ url('pokedex/'. ($pokemon->poke_id - 1)) }}">Previous</a>
        <a class="bg-ball-white py-2 px-4 rounded-lg" href="{{ url('pokedex/'. ($pokemon->poke_id + 1)) }}">Next</a>
    </div>

</div>


