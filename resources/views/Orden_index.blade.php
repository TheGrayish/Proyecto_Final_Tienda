<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Orden</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e0e0e0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            border-collapse: collapse;
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        img {
            max-width: 60px;
            max-height: 60px;
            border-radius: 5px;
        }

        p {
            text-align: center;
            color: #888;
            margin-top: 20px;
        }

        a.button, button.button {
            display: inline-block;
            padding: 10px 16px;
            margin: 4px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        a.button.edit {
            background-color: #2ecc71;
        }

        button.button.delete {
            background-color: #e74c3c;
        }

        a.button, button.button:hover {
            background-color: #555;
            color: #fff;
        }
    </style>
</head>
<body>
    
    <h1>Orden Index</h1>

    @if(!is_null($ordenes) && count($ordenes) > 0)
        <table>
            <tr>
                <th>ID</th>
                <th>Fecha Añadido</th>
                <th>Producto ID</th>
                <th>Nombre del Producto</th>
                <th>Precio</th>
                <th>Imagen</th>
                <!-- Agrega más encabezados según tu estructura de datos -->
            </tr>
            @foreach($ordenes as $orden)
                <tr>
                    <td>{{ $orden->id }}</td>
                    <td>{{ $orden->FechaEstado }}</td>
                    <td>{{ $orden->producto_id }}</td>
                    <td>{{ $orden->producto->nombre }}</td>
                    <td>{{ $orden->producto->precio }}</td>
                    <td><img src="{{ asset('storage/images/' . $orden->producto->imagen) }}" alt="{{ $orden->producto->nombre }}"></td>
                    <td>
                       
                        {{-- <a href="{{ route('orden.edit', ['orden' => $orden->id]) }}" class="button edit">Edit</a> --}}
                        <form action="{{ route('orden.destroy', ['orden' => $orden->id]) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button delete" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4"></td>
                <td colspan="2">
                    <p>Total Price: ${{ $totalPrice }}</p>
                </td>
            </tr>
        </table>
    @else
        <p>No hay órdenes disponibles.</p>
    @endif

</body>
</html>


