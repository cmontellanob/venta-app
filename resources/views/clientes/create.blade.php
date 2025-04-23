@extends('layouts.app')

@section('title', 'Crear Cliente')

@section('content')
    <form class="mt-8 mb-2 w-80 max-w-screen-lg sm:w-96" action="{{ route('clientes.store') }}" method="post">
        @csrf
        <div class="w-full mb-1 flex flex-col gap-6 bg-white p-4 rounded-lg shadow-md">
            <div class="w-full max-w-sm min-w-[200px]">
                <label class="block mb-2 text-sm text-slate-600" for="tipo_documento_id">
                    Tipo de Documento
                </label>
                <select name="tipo_documento_id" id="tipo_documento_id" required
                    class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow">
                    @foreach($tiposDocumento as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full max-w-sm min-w-[200px]">
                <label class="block mb-2 text-sm text-slate-600" for="numero_documento">
                    Número de Documento
                </label>
                <input type="text"
                    class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                    name="numero_documento" id="numero_documento" required />
            </div>
            <div class="w-full max-w-sm min-w-[200px]">
                <label class="block mb-2 text-sm text-slate-600" for="razon_social">
                    Razón Social
                </label>
                <input type="text"
                    class="w-full bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded-md px-3 py-2 transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-300 shadow-sm focus:shadow"
                    name="razon_social" id="razon_social" required />
            </div>

            <button class="bg-blue-500 mt-5 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Crear Cliente</button>
        </div>
    </form>
@endsection 