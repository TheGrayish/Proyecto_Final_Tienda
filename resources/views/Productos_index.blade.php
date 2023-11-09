<!-- productos/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
</head>
<body>
    <h1>Lista de Productos</h1>

    @foreach ($productos as $producto)
        <div>
            <h2>{{ $producto->nombre }}</h2>
            <p>Descripción: {{ $producto->descripcion }}</p>
            <p>Precio: {{ $producto->precio }}</p>
            <p>Stock: {{ $producto->stock }}</p>
            <img src="{{ asset('storage/images/' . $producto->imagen) }}" alt="Imagen del Producto">
        </div>
    @endforeach
</body>
</html>