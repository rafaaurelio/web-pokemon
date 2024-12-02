<?php

namespace App\Http\Controllers;

use App\Models\pokemon;
use App\Models\Treinador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PokemonController extends Controller
{
    public function index()
{
    $pokemons = Pokemon::all();
    return view('pokemons.index', compact('pokemons'));
}

public function create()
{   
    Gate::authorize('create', Pokemon::class);

    $treinadores = Treinador::all();
    return view('pokemons.create', compact('treinadores')) ;
}

public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'tipo' => 'required',
        'pontos_de_poder' => 'required',
        'imagem' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    $imageName = time() .$request->imagem->extension();
    $request->imagem->move(public_path('images'), $imageName);

    $pokemon = new Pokemon();
    $pokemon->nome = $request->nome;
    $pokemon->tipo = $request->tipo;
    $pokemon->pontos_de_poder = $request->pontos_de_poder;
    $pokemon->treinador_id = $request->treinador_id;
    $pokemon->imagem = 'images/'.$imageName;
    $pokemon->save();
  
    return redirect('pokemons')->with('success', 'pokemon created successfully.');

}

public function edit($id)
{
    Gate::authorize('update', Pokemon::class);
    $pokemon = Pokemon::findOrFail($id);
    $treinadores = Treinador::all();
    return view('pokemons.edit', compact('pokemon', 'treinadores'));
}

public function update(Request $request, $id)
{
    $pokemon = Pokemon::findOrFail($id);
    $pokemon->update($request->all());

    $pokemon->nome = $request->nome;
    $pokemon->tipo = $request->tipo;
    $pokemon->pontos_de_poder = $request->pontos_de_poder;


    if(!is_null($request->imagem)){
        $imageName = time() .$request->imagem->extension();
        $request->imagem->move(public_path('images'), $imageName);
        $pokemon->imagem = 'images/'.$imageName;
    }
    $pokemon->save();
    return redirect('pokemons')->with('success', 'pokemon updated successfully.');
}

public function destroy($id)
{
    Gate::authorize('delete', Pokemon::class);
    $pokemon = Pokemon::findOrFail($id);
    $pokemon->delete();
    return redirect('pokemons')->with('success', 'pokemon deleted successfully.');
}

}
