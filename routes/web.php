<?php

use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TreinadorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('pokemons', [PokemonController::class, 'index'])
->middleware(['auth', 'verified'])->name('index-pokemon');
Route::get('pokemons/create', [PokemonController::class, 'create'])
->middleware(['auth', 'verified'])->name('create-pokemon');
Route::post('pokemons', [PokemonController::class, 'store'])
->middleware(['auth', 'verified'])->name('store-pokemon');
Route::get('pokemons/{id}/edit', [PokemonController::class, 'edit'])
->middleware(['auth', 'verified'])->name('edit-pokemon');
Route::put('pokemons/{id}', [PokemonController::class, 'update'])
->middleware(['auth', 'verified'])->name('update-pokemon');
Route::delete('pokemons/{id}', [PokemonController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('destroy');




Route::get('treinadores', [TreinadorController::class, 'index'])
->middleware(['auth', 'verified'])->name('index-pokemon');
Route::get('treinadores/create', [TreinadorController::class, 'create'])
->middleware(['auth', 'verified'])->name('create-treinador');
Route::post('treinadores', [TreinadorController::class, 'store'])
->middleware(['auth', 'verified'])->name('store-treinador');
Route::get('treinadores/{id}/edit', [TreinadorController::class, 'edit'])
->middleware(['auth', 'verified'])->name('edit-treinador');
Route::put('treinadores/{id}', [TreinadorController::class, 'update'])
->middleware(['auth', 'verified'])->name('update-treinador');
Route::delete('treinadores/{id}', [TreinadorController::class, 'destroy'])
->middleware(['auth', 'verified'])->name('destroy-treinador');
