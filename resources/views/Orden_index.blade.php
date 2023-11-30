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

        .link-box {
                position: fixed; /* Fijar la posición */
                top: 20px; /* Distancia desde la parte superior (ajustado) */
                left: 20px; /* Distancia desde la izquierda (ajustado) */
                display: inline-block;
                padding: 10px 20px;
                border: 2px solid #ff0000; /* Rojo */
                text-decoration: none;
                color: #ff0000; /* Rojo */
                font-weight: bold;
                transition: background-color 0.3s, color 0.3s;
            }
    
            .link-box:hover {
                background-color: #ff0000; /* Rojo */
                color: #fff; /* Blanco */
            }

    </style>
</head>
<body>
    
    <h1>Orden Index</h1>
    <a href="/home" class="link-box">Home Page</a>
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
                        <form action="{{ route('orden.restore', ['orden' => $orden->id]) }}" method="post" style="display:inline;">
                            @csrf
                            <button type="submit" class="button restore" onclick="return confirm('¿Estás seguro de restaurar esta orden?')">Restaurar</button>
                        </form>
                        
                        <form action="{{ route('orden.forceDelete', ['orden' => $orden->id]) }}" method="post" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button force-delete" onclick="return confirm('¿Estás seguro de eliminar definitivamente esta orden?')">Eliminar Definitivamente</button>
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
        <br><br>
        <p>Agrega cosas al carrito :P</p><br>
        
        {{-- Mostrar elementos eliminados lógicamente --}}
        @if(count($ordenesTrashed) > 0)
            <h2>Elementos eliminados</h2>
            <table>
                <!-- Encabezados de la tabla -->
                <tr>
                    <th>ID</th>
                    <th>Fecha Eliminado</th>
                    <th>Producto ID</th>
                    <th>Nombre del Producto</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
                <!-- Filas de la tabla -->
                @foreach($ordenesTrashed as $orden)
                    <tr>
                        <!-- Datos del elemento eliminado -->
                        <td>{{ $orden->id }}</td>
                        <td>{{ $orden->deleted_at }}</td>
                        <td>{{ $orden->producto_id }}</td>
                        <td>{{ $orden->producto->nombre }}</td>
                        <td>{{ $orden->producto->precio }}</td>
                        <td><img src="{{ asset('storage/images/' . $orden->producto->imagen) }}" alt="{{ $orden->producto->nombre }}"></td>
                        <!-- Acciones para restaurar o eliminar definitivamente -->
                        <td>
                            <form action="{{ route('orden.restore', ['orden' => $orden->id]) }}" method="post" style="display:inline;">
                                @csrf @method('POST')
                                <button type="submit" class="button restore" onclick="return confirm('¿Estás seguro de restaurar esta orden?')">Restaurar</button>
                            </form>
                            <form action="{{ route('orden.forceDelete', ['orden' => $orden->id]) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button force-delete" onclick="return confirm('¿Estás seguro de eliminar definitivamente esta orden?')">Eliminar Definitivamente</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        @endif
    @endif
    

</body>
</html>


