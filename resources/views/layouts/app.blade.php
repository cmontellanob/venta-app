<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Mi App')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    @vite('resources/css/app.css') <!-- si estás usando Laravel con Vite -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body class="bg-gray-100 flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-gray-200 p-4 flex-shrink-0">
        <h1 class="text-xl font-bold mb-6">Mi App</h1>
        <nav class="space-y-2">
            <a href="{{ route('welcome') }}" class="block text-gray-700 hover:bg-gray-200 px-3 py-2 rounded">
                <i class="fas fa-home mr-2"></i> Inicio
            </a>
            <a href="{{ route('productos.index') }}" class="block text-gray-700 hover:bg-gray-200 px-3 py-2 rounded">
                <i class="fas fa-box mr-2"></i> Productos
            </a>
            <a href="{{ route('clientes.index') }}" class="block text-gray-700 hover:bg-gray-200 px-3 py-2 rounded">
                <i class="fas fa-users mr-2"></i> Clientes
            </a>
            <a href="{{ route('tiposdocumento.index') }}" class="block text-gray-700 hover:bg-gray-200 px-3 py-2 rounded">
                <i class="fas fa-id-card mr-2"></i> Tipos de Documento
            </a>
        </nav>
    </aside>

    <!-- Contenedor principal -->
    <div class="flex flex-col flex-1 overflow-hidden">
        <!-- Navbar -->
        <header class="bg-white border-b border-gray-200 p-4 flex items-center justify-between">
            <div class="text-lg font-semibold text-gray-800">Panel de Control</div>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">Hola, Usuario</span>
                <button class="text-sm text-red-500 hover:underline">
                    <i class="fas fa-sign-out-alt mr-1"></i> Cerrar sesión
                </button>
            </div>
        </header>

        <!-- Contenido -->
        <main class="flex-1 overflow-y-auto p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>

