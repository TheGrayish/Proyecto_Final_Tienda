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
            background-color: #f8f8f8;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 350px;
            margin-top: 20px;
            text-align: center; /* Centra el contenido del formulario */
        }

        h1 {
            color: #ff0000;
        }

        label {
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: calc(100% - 16px);
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #ff0000;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #cc0000;
        }

        img {
            max-width: 100%;
            height: auto;
            margin-top: 10px;
        }
    </style>
    
</head>
<form action="{{ route('categoria.update'), $categoria }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h1>Editar Categoria</h1>

    <label for="nombre">Nombre de la categoria:</label>
    <input type="text" id="nombre" name="nombre" value="{{ $categoria->nombre }}">

    <input type="submit" value="Actualizar Producto">
</form>


