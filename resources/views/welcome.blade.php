<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite('resources/css/app.css')
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen flex items-center justify-center p-6">
    <div class="max-w-xl w-full space-y-6">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-indigo-600 dark:text-indigo-400">Prueba Laravel</h1>
            <p class="text-gray-500 dark:text-gray-400 mt-2">Navega entre módulos</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="{{ route('productos.index') }}"
                class="block p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-md hover:shadow-lg hover:bg-indigo-50 dark:hover:bg-indigo-950 transition">
                <h2 class="text-xl font-semibold text-indigo-600 dark:text-indigo-400 mb-2">📦 Productos</h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Ver la lista de productos disponibles.</p>
            </a>

            <a href="{{ route('clientes.index') }}"
                class="block p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-md hover:shadow-lg hover:bg-indigo-50 dark:hover:bg-indigo-950 transition">
                <h2 class="text-xl font-semibold text-indigo-600 dark:text-indigo-400 mb-2">👤 Clientes</h2>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Gestionar los datos de los clientes.</p>
            </a>
        </div>
    </div>
</body>

</html>
