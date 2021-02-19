<link rel="stylesheet" href="{{ URL::asset('/css/style.css') }}">
@extends('layouts.app')

@section('content')
    <h1>PokeDex</h1>
    <div id="poke_container" class="poke-container"></div>
    <script src="{{ asset('js/main.js') }}"></script>

    <div class="max-w-xs rounded overflow-hidden shadow-lg my-2">
        <img class="w-full" src="${sprites.front_default}" alt="Sunset in the mountains">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
            <p class="text-grey-darker text-base">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
            </p>
        </div>
        <div class="px-6 py-4">
            <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#photography</span>
            <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker mr-2">#travel</span>
            <span class="inline-block bg-grey-lighter rounded-full px-3 py-1 text-sm font-semibold text-grey-darker">#winter</span>
        </div>
    </div>

@endsection()

