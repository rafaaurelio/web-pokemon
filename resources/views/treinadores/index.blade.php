@extends('layouts.base')

@section('conteudo')
<div class="w-screen h-screen bg-gray-100 dark:bg-gray-900 flex flex-col items-center p-4">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-6">Lista de Treinadores</h1>
    @can('create', App\Models\Treinador::class)
        <a href="/treinadores/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Criar Treinador</a>
    @endcan
    <br>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-7xl">
        @foreach($treinadores as $treinador)
        <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-10 p-6">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{ asset($treinador->imagem) }}" alt="{{$treinador->nome}}"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{$treinador->nome}}</h5>
                <div class="flex mt-4 md:mt-6">
                    <a href="{{ url('treinadores/'.$treinador->id.'/edit') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</a>
                    <form action="{{ url('treinadores/'.$treinador->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="py-2 px-4 ms-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="submit">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection