<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8; /* Color de fondo */
            color: #333; /* Color del texto */
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff; /* Color de fondo del formulario */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px; /* Ancho fijo del formulario */
        }

        h1 {
            text-align: center;
            color: #ff0000; /* Color rojo para el título */
        }

        label {
            color: #333; /* Color del texto de las etiquetas */
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: calc(100% - 16px);
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc; /* Borde del input */
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #ff0000; /* Color de fondo del botón */
            color: #fff; /* Color del texto del botón */
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #cc0000; /* Cambio de color al pasar el ratón */
        }
    </style>
</head>
<body>
    <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data">
        @csrf <!-- Agregar el token CSRF de Laravel -->

        <h1>Agregar Producto</h1>

        <label for="nombre">Nombre del Producto:</label>
        <input type="text" id="nombre" name="nombre">

        <label for="precio">Precio:</label>
        <input type="number" id="precio" name="precio">

        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion">

        <label for="stock">Stock:</label>
        <input type="text" id="stock" name="stock">

        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen" name="imagen">

        <input type="submit" value="Agregar Producto">
    </form>
</body>
</html>
