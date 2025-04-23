@extends('layouts.app')

@section('title', 'Lista de Tipos de Documento')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de Tipos de Documento</h2>

    <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
        <table class="w-full text-left table-auto min-w-max">
            <thead>
                <tr>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            ID
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Nombre
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Acciones
                        </p>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tiposDocumento as $tipo)
                    <tr>
                        <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ $tipo->id }}
                            </p>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ $tipo->nombre }}
                            </p>
                        </td>
                        <td>
                            <div class="flex flex-row gap-2">
                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    href="{{ route('tiposdocumento.edit', $tipo->id) }}">Editar</a>
                                <form action="{{ route('tiposdocumento.destroy', $tipo->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                        type="submit">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tiposDocumento->links() }}
    </div>
    <div class="flex justify-center mt-4">
        <a class="bg-blue-500 mt-5 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('tiposdocumento.create') }}">Crear Tipo de Documento</a>
    </div>
@endsection 