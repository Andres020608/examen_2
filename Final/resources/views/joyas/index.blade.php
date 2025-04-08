<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario de Joyas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 40px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        a {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #343a40;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 5px;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            padding: 6px 10px;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Inventario de Joyas</h1>

    <a href="{{ route('joyas.create') }}">➕ Agregar nueva joya</a>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($joyas as $joya)
            <tr>
                <td>{{ $joya->id }}</td>
                <td>{{ $joya->nombre }}</td>
                <td>{{ $joya->descripcion }}</td>
                <td>${{ $joya->precio }}</td>
                <td>{{ $joya->cantidad }}</td>
                <td>
                    <a class="btn-edit" href="{{ route('joyas.edit', $joya) }}">Editar</a>
                    <form action="{{ route('joyas.destroy', $joya) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn-delete" type="submit" onclick="return confirm('¿Estás seguro que deseas eliminar esta joya?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            <form action="{{ route('joyas.destroy', $joya->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Estás seguro de eliminar esta joya?');">
    @csrf
    @method('DELETE')
    <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 5px 10px; border-radius: 5px; cursor: pointer;">
        Eliminar
    </button>
</form>

            @endforeach
        </tbody>
    </table>
</body>
</html>
