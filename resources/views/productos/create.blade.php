<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Producto</title>
    <!--<script src="https://cdn.tailwindcss.com"></script>-->

    <!-- Styles / Scripts -->
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Crear Nuevo Producto</h1>
        <form action="{{ route('productos.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="nombre" class="block font-medium text-gray-700">Nombre</label>
                <input type="text" name="nombre" id="nombre" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="descripcion" class="block font-medium text-gray-700">Descripción</label>
                <input type="text" name="descripcion" id="descripcion" required
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="precio" class="block font-medium text-gray-700">Precio</label>
                <input type="number" name="precio" id="precio" required step="0.01" min="0"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="stock" class="block font-medium text-gray-700">Stock</label>
                <input type="number" name="stock" id="stock" required min="0"
                    class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white font-semibold py-2 rounded-lg hover:bg-green-700 transition">
                Crear Producto
            </button>
        </form>
    </div>
</body>
</html>
