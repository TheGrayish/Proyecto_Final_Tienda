<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #ff0000;
        }

        .btn {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            background-color: #ff0000;
            color: #fff;
            border-radius: 4px;
        }

        .producto {
            background-color: #fff;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .producto h2 {
            color: #333;
        }

        .producto p {
            margin-bottom: 10px;
        }

        .producto img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .producto a {
            color: #ff0000;
            text-decoration: none;
            margin-right: 10px;
        }

        .producto form {
            display: inline-block;
        }

        .producto button {
            background-color: #cc0000;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Lista de Productos</h1>
    <a href="{{ route('productos.create') }}" class="btn">Crear registro</a>

    @foreach ($productos as $producto)
        <div class="producto">
            <h2>{{ $producto->nombre }}</h2>
            <p>Descripción: {{ $producto->descripcion }}</p>
            <p>Precio: {{ $producto->precio }}</p>
            <p>Stock: {{ $producto->stock }}</p>
            <img src="{{ asset('storage/images/' . $producto->imagen) }}" alt="Imagen actual">
            <a href="{{ route('productos.edit',  $producto->id) }}">Editar</a>
            
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
