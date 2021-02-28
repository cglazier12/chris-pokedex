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
Route::post('/store', [PokemonController::class, 'store'])->name('pokedex.store');

// A note about wildcard routes
// it isn't terribly implicit but this syntax is simply saying, hey, this route expects something after '/pokedex/' in order to properly "trigger"
// '{id}' is simply helpful to let us know what the expected value is supposed to be
// we could be even more specific and call it {pokemonId} if we wanted to but in the routes file it doesnt really matter what you call it
// lets say we have an a tag like we do in the pokedex page that translates to 127.0.0.1:8000/pokedex/6 just like we do now.
// we could straight up lie about what it is in the routes file and write our route like Route::get('/pokedex/{literally anything}')
// and then we lied again in the controller show method and wrote public function show(int $name) { // do stuff  }
// it doesnt matter what we call any of these things between point A (the blade file), point B (the web.php file) and point C (the controller)
// if I dd($name) in the first line of the show method, it will still be an integer of 6. It will always be exactly what you set it to be in the blade file.

Route::get('/pokedex/{id}', [PokemonController::class, 'show'])->name('pokedex.show');

//Route::get('/show', [PokemonController::class, 'store'])->name('pokedex.store');

/*
 *  weird little laravel convention thing. a page that indexes all of something like the list of all your pokemon would have the route of '/'
 *   kind of strange and definitely a little nonsensical at first. but the pokemon index would be 127.0.0.1:8000/pokemon and all the other routes would be appended after that
 *   edit = /pokemon/{id}/edit
 *   show = /pokemon/{id}
 *
 *      Note : the {id} syntax is called a wildcard. basically it is an id that is passed from the view to the controller method in someway so you controller method has an id to look up the exact record it needs
 *          you wouldnt see an index method use a wildcard becasue it is generally returning all of something or all of something where('table_column', '=', 'something')
*
 *          This route uri naming convention also follows laravel best practices and the docs goes into this in a little more detail https://laravel.com/docs/8.x/controllers#resource-controllers
*           Id also check out the routing section of the laravel from scratch videos on laracasts.
 *
*           This is not something you need to absolutely worry about. Just providing useful information. Before I stuck 30 lines of comments in your routes file i would say it looks really good and you absolutely are getting the hang of it.
*             If me leaving comments like this ever becomes too much or you feel like I am too in your face please promptly tell me to fuck off.
*
 *
 */
Route::get('/index', [PokemonController::class, 'index'])->name('index');

//
require __DIR__.'/auth.php';
