<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script>-->

    <!-- Styles / Scripts -->
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Editar Cliente</h2>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="post" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="tipo_documento_id" class="block text-sm font-medium text-gray-700">Tipo de Documento</label>
                <select name="tipo_documento_id" id="tipo_documento_id"
                    class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @foreach ($tiposDocumentos as $tipoDocumento)
                        <option value="{{ $tipoDocumento->id }}"
                            {{ old('tipo_documento_id', $cliente->tipo_documento_id) == $tipoDocumento->id ? 'selected' : '' }}>
                            {{ $tipoDocumento->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="numero_documento" class="block text-sm font-medium text-gray-700">Número de Documento</label>
                <input type="text" name="numero_documento" id="numero_documento" required
                    value="{{ $cliente->numero_documento }}"
                    class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div>
                <label for="razon_social" class="block text-sm font-medium text-gray-700">Razón Social</label>
                <input type="text" name="razon_social" id="razon_social" required
                    value="{{ $cliente->razon_social }}"
                    class="mt-1 block w-full border-gray-300 rounded-xl shadow-sm focus:ring-blue-500 focus:border-blue-500" />
            </div>

            <div class="pt-4">
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition duration-200">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>

</body>

</html>

