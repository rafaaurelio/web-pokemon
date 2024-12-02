<?php

namespace App\Http\Controllers;

use App\Models\Treinador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TreinadorController extends Controller
{
    public function index()
{
    $treinadores = Treinador::all();
    return view('treinadores.index', compact('treinadores'));
}

public function create()
{   Gate::authorize('create', Treinador::class);
    $treinadores = Treinador::all();
    return view('treinadores.create');
}

public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'imagem' => 'required|image|mimes:jpeg,png,jpg,gif, webp|max:2048',
    ]);

    $imageName = time() .$request->imagem->extension();
    $request->imagem->move(public_path('images'), $imageName);

    $treinador = new Treinador();
    $treinador->nome = $request->nome;
    $treinador->imagem = 'images/'.$imageName;
    $treinador->save();
  
    return redirect('treinadores')->with('success', 'treinador created successfully.');

}

public function edit($id)
{
    Gate::authorize('update', Treinador::class);
    $treinador = Treinador::findOrFail($id);
    return view('treinadores.edit', compact('treinador'));
}

public function update(Request $request, $id)
{
    $treinador = Treinador::findOrFail($id);
    $treinador->update($request->all());

    $treinador->nome = $request->nome;

    if(!is_null($request->imagem)){
        $imageName = time() .$request->imagem->extension();
        $request->imagem->move(public_path('images'), $imageName);
        $treinador->imagem = 'images/'.$imageName;
    }
    $treinador->save();
    return redirect('treinadores')->with('success', 'treinador updated successfully.');
}

public function destroy($id)
{
    Gate::authorize('delete', Treinador::class);
    $treinador = Treinador::findOrFail($id);
    $treinador->delete();
    return redirect('treinadores')->with('success', 'treinador deleted successfully.');
}

}
