@extends('layouts.base')

@section('conteudo')
<div class="w-screen h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
    <form class="w-full max-w-sm bg-white p-6 rounded-lg shadow-md dark:bg-gray-800" action="{{ url('pokemons/'.$pokemon->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="nome" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
            <input type="text" name="nome" id="nome" value="{{$pokemon->nome}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
            <input type="text" name="tipo" id="tipo" value="{{$pokemon->tipo}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
        </div>
        <div class="mb-5">
            <label for="pontos_de_poder" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pontos de Poder</label>
            <input type="number" name="pontos_de_poder" id="pontos_de_poder" value="{{$pokemon->pontos_de_poder}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <img src="{{ asset($pokemon->imagem) }}" alt="">
            <label for="imagem" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Imagem</label>
            <input type="file" name="imagem" id="imagem" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <div class="mb-5">
            <select name="treinador_id" id="treinador_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Selecione um Treinador</option>
                @foreach ($treinadores as $treinador)
                    @if(@$treinador->id === $pokemon->treinador->id)
                    <option value="{{ $treinador->id }}" selected>{{ $treinador->nome }}</option>
                    @else
                    <option value="{{ $treinador->id }}" >{{ $treinador->nome }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded w-full" type="submit">Atualizar Pokemon</button>
    </form>
</div>
@endsection