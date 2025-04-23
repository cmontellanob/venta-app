@extends('layouts.app')

@section('title', 'Crear Tipo de Documento')

@section('content')
    <form class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96" action="{{ route('tiposdocumento.store') }}" method="post">
        @csrf
        <div class="w-full mb-1 flex flex-col gap-6 bg-white p-4 rounded-lg shadow-md">
            <div class="w-full max-w-sm min-w-[200px]">
                <label class="block mb-2 text-sm text-slate-600" for="id">
                    ID
                </label>
                <input type="number"
                    class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                    name="id" id="id" required />
            </div>
            <div class="w-full max-w-sm min-w-[200px]">
                <label class="block mb-2 text-sm text-slate-600" for="nombre">
                    Nombre
                </label>
                <input type="text"
                    class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                    name="nombre" id="nombre" required />
            </div>

            <button class="bg-blue-500 mt-5 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Crear Tipo de Documento</button>
        </div>
    </form>
@endsection 