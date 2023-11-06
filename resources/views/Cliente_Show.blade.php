<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles del cliente</title>
    <style>
        body {
            background-color: #ffffff; /* Blanco */
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            color: #0073e6; /* Azul */
        }

        .details {
            margin: 20px;
            padding: 20px;
            border: 1px solid #0073e6; /* Azul */
            border-radius: 10px;
            background-color: #f0f0f0; /* Color de fondo gris claro */
        }

        .details h2 {
            color: #0073e6; /* Azul */
        }
    </style>
</head>
<body>
    <div class="details">
        <h1>Detalles:</h1><br>
        <div>
            <h2>ID:</h2>
            {{$cliente->id}}
        </div>
        <div>
            <h2>Nombre:</h2>
            {{$cliente->email}}
        </div>
        <div>
            <h2>Apellidos:</h2>
            {{$cliente->apellidopa}}
            {{$cliente->apellidoma}}
        </div>
        <div>
            <h2>Telefono:</h2>
            {{$cliente->telefono}}
        </div>
        <div>
            <h2>Email:</h2>
            {{$cliente->email}}
        </div>
        <div>
            <h2>Contraseña:</h2>
            {{$cliente->password}}
        </div>

  
    

        <h4>Usuario que creo: {{$cliente->user_id}}</h4>
        
    </div>
</body>
</html>
