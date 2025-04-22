<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <!--<script src="https://cdn.tailwindcss.com"></script>-->

    <!-- Styles / Scripts -->
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 p-6">
    <div class="container mx-auto">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Lista de Productos</h1>
            <a href="{{ route('productos.create') }}"
            class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-lg font-medium transition">
                + Crear Producto
            </a>
        </div>

        @if (session('success'))
            <div id="success-alert"
                class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded-xl mb-4" role="alert">
                <strong class="font-bold">Éxito:</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('deleted'))
            <div id="deleted-alert" class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded-xl mb-4"
                role="alert">
                <strong class="font-bold">Eliminado:</strong>
                <span class="block sm:inline">{{ session('deleted') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto shadow-md rounded-lg bg-white">
            <table class="min-w-full table-auto text-sm">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                    <tr>
                        <th class="px-6 py-3 text-left">Nombre</th>
                        <th class="px-6 py-3 text-left">Descripción</th>
                        <th class="px-6 py-3 text-left">Precio</th>
                        <th class="px-6 py-3 text-left">Stock</th>
                        <th class="px-6 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($productos as $producto)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $producto->nombre }}</td>
                            <td class="px-6 py-4">{{ $producto->descripcion }}</td>
                            <td class="px-6 py-4 w-[200px]">Bs {{ number_format($producto->precio, 2, ',', '.') }}</td>
                            <td class="px-6 py-4">{{ $producto->stock }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <!-- Botón Editar -->
                                <a href="{{ route('productos.edit', $producto->id) }}"
                                    class="text-blue-500 font-medium p-2 hover:bg-blue-700 hover:text-white hover:rounded-lg">Editar</a>

                                <!-- Botón Eliminar -->
                                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                    onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">
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
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const successAlert = document.getElementById('success-alert');
                const deletedAlert = document.getElementById('deleted-alert');

                [successAlert, deletedAlert].forEach(alert => {
                    if (alert) {
                        setTimeout(() => {
                            alert.style.transition = 'opacity 1s';
                            alert.style.opacity = '0';
                            setTimeout(() => alert.remove(), 1000);
                        }, 5000);
                    }
                });
            });
        </script>
    </div>
</body>

</html>
