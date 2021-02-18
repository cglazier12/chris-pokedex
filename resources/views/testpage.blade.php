@extends('layouts.app')

@section('content')
    <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
        <a href={{ route('helloworld') }}" class="hover:text-grey-400"></a>
    </div>
@endsection()
