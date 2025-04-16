<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route("productos.store") }}" method="post">
        @csrf
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        
        <label for="descripcion">Descripción</label>
        <input type="text" name="descripcion" id="descripcion" required>
        
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio" required>
        
        <label for="stock">Stock</label>
        <input type="number" name="stock" id="stock" required>
        
        <button type="submit">Crear Producto</button>

    </form>
    
</body>
</html>