<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<script src="https://cdn.tailwindcss.com"></script> -->

    <!-- Styles / Scripts -->
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-semibold text-center mb-6">Lista de Clientes</h1>
            <div class="mt-6 text-right">
                <a href="{{ route('clientes.create') }}"
                    class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-lg font-medium">+ Crear Cliente</a>
            </div>
        </div>

        @if (session('success'))
            <div id="success-alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-4 max-w-4xl mx-auto"
            role="alert">
            <strong class="font-bold">Éxito:</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('deleted'))
            <div id="deleted-alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4 max-w-4xl mx-auto"
            role="alert">
            <strong class="font-bold">Eliminado:</strong>
            <span class="block sm:inline">{{ session('deleted') }}</span>
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-left text-sm font-medium">
                    <th class="px-6 py-3 border-b">Tipo de Documento</th>
                    <th class="px-6 py-3 border-b">Número de Documento</th>
                    <th class="px-6 py-3 border-b">Razón Social</th>
                    <th class="px-6 py-3 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clientes as $cliente)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 border-b">{{ $cliente->tipoDocumento->nombre }}</td>
                        <td class="px-6 py-4 border-b">{{ $cliente->numero_documento }}</td>
                        <td class="px-6 py-4 border-b">{{ $cliente->razon_social }}</td>
                        <td class="px-6 py-4 border-b flex space-x-2">
                            <!-- Editar -->
                            <a href="{{ route('clientes.edit', $cliente->id) }}"
                                class="text-blue-500 font-medium p-2 hover:bg-blue-700 hover:text-white hover:rounded-lg">Editar</a>

                            <!-- Eliminar -->
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-500 font-medium p-2 hover:bg-red-700 hover:text-white hover:rounded-lg">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <script>
            // Auto-hide alerts after 5 seconds
            document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('success-alert');
            const deletedAlert = document.getElementById('deleted-alert');
            
            if (successAlert) {
                setTimeout(function() {
                successAlert.style.transition = 'opacity 1s';
                successAlert.style.opacity = '0';
                setTimeout(() => successAlert.remove(), 1000);
                }, 5000);
            }
            
            if (deletedAlert) {
                setTimeout(function() {
                deletedAlert.style.transition = 'opacity 1s';
                deletedAlert.style.opacity = '0';
                setTimeout(() => deletedAlert.remove(), 1000);
                }, 5000);
            }
            });
        </script>
</body>

</html>
