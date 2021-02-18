<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

//use App\Http\Controllers\TestController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


// this goes to the test() in testcontroller
//Route::get('/helloworld', [TestController::class, 'test'])->name('helloworld');

Route::get('/team', [PokemonController::class, 'team'])->name('team');
Route::get('/pokedex', [PokemonController::class, 'pokedex'])->name('pokedex');
Route::get('/show', [PokemonController::class, 'show'])->name('show');
Route::get('/index', [PokemonController::class, 'index'])->name('index');


require __DIR__.'/auth.php';
