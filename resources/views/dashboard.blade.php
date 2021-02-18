<?use App\Http\Controllers\PokemonController;?>


@extends('layouts.app')

@section('content')
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
<div class="flex flex-wrap items-center mt-8">
    <div class="mt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href={{ route('team') }}>
                <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                    <span class="ml-1">My Pokemon</span>
                </button>
            </a>
        </div>

    </div>
    &nbsp;&nbsp;

    <div class="mt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href={{ route('pokedex') }}>
                <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                    <span class="ml-1">Pokedex</span>
                </button>
            </a>
        </div>
    </div>
</div>
        <div class="mt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <a href={{ route('index') }}>
                    <button class="flex bg-blue-500 text-white font-semibold px-4 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                        <span class="ml-1">test button</span>
                    </button>
                </a>
            </div>
        </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

@endsection

