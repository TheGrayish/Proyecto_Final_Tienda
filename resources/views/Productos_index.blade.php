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
    <a href="{{ route('productos.create') }}" class="btn">Crear registro</a>

    
    @foreach ($productos as $producto)
        <div>
            <h2>{{ $producto->nombre }}</h2>
            <a href="{{ route('productos.edit',  $producto->id) }}">Editar</a>
            <p>Descripción: {{ $producto->descripcion }}</p>
            <p>Precio: {{ $producto->precio }}</p>
            <p>Stock: {{ $producto->stock }}</p>
            <img src="{{ asset('storage/images/' . $producto->imagen) }}" alt="Imagen actual">
           <!-- Botón de Borrar -->
           <form action="{{ route('productos.destroy', $producto->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Borrar</button>
            </form>
        </div>
    @endforeach
</body>
</html>
