<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
</head>
<body>
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $producto) }} " method="post" enctype="multipart/form-data">

        @csrf <!-- Agregar el token CSRF de Laravel -->
        @method('PUT') 

        <label for="descripcion">Descripción:</label><br>
        <input type="text" id="descripcion" name="descripcion" value="{{ $producto->descripcion }}"><br><br>


        <label for="precio">Precio:</label><br>
        <input type="number" id="precio" name="precio" value="{{ $producto->precio }}"><br><br>

        <label for="nombre">Nombre del Producto:</label><br>
        <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}"><br><br>

        <label for="stock">Stock:</label><br>
        <input type="text" id="stock" name="stock" value="{{ $producto->stock }}"><br><br>

        <label for="imagen">Imagen:</label><br>
        <input type="file" id="imagen" name="imagen" value="{{$producto->imagen}}"><br><br>

        @if($producto->imagen)
            <img src="{{ asset('storage/images/' . $producto->imagen) }}" alt="Imagen actual">
        @endif

        
        <input type="submit" value="Agregar Producto">
    </form>
</body>
</html>
