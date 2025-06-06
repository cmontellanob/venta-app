@extends('layouts.app')

@section('title', 'Lista de Clientes')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Listado de Clientes</h2>

    <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
        <table class="w-full text-left table-auto min-w-max">
            <thead>
                <tr>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Tipo Documento
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Número Documento
                        </p>
                    </th>
                    <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                            Razón Social
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
                @foreach ($clientes as $cliente)
                    <tr>
                        <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ $cliente->tipo_documento->nombre }}
                            </p>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ $cliente->numero_documento }}
                            </p>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ $cliente->razon_social }}
                            </p>
                        </td>
                        <td>
                            <div class="flex flex-row gap-2">
                                <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                    href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                                <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post">
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
        {{ $clientes->links() }}
    </div>
    <div class="flex justify-center mt-4 space-x-4">
        <a class="bg-blue-500 mt-5 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('clientes.create') }}">Crear Cliente</a>
        <a class="bg-green-500 mt-5 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('clientes.pdf') }}">
            <i class="fas fa-file-pdf mr-2"></i> Exportar PDF
        </a>
    </div>
@endsection