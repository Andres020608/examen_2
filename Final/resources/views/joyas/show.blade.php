<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de la Joya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f7;
            margin: 40px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .detalle {
            margin-bottom: 20px;
        }

        .detalle strong {
            display: inline-block;
            width: 120px;
            color: #555;
        }

        .acciones {
            text-align: center;
            margin-top: 30px;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
            margin: 5px;
            display: inline-block;
        }

        a:hover {
            background-color: #0056b3;
        }

        .volver {
            background-color: #6c757d;
        }

        .volver:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles de la Joya</h1>

        <div class="detalle">
            <strong>Nombre:</strong> {{ $joya->nombre }}
        </div>

        <div class="detalle">
            <strong>Descripción:</strong> {{ $joya->descripcion }}
        </div>

        <div class="detalle">
            <strong>Precio:</strong> ${{ $joya->precio }}
        </div>


        <div class="detalle">
            <strong>Cantidad:</strong> {{ $joya->cantidad }}
        </div>

        <div class="acciones">
            <a href="{{ route('joyas.edit', $joya->id) }}">Editar</a>
            <form action="{{ route('joyas.destroy', $joya->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Deseas eliminar esta joya?');">
    @csrf
    @method('DELETE')
    <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
        Eliminar
    </button>
</form>

            <a href="{{ route('joyas.index') }}" class="volver">Volver al listado</a>
        </div>
    </div>
</body>
</html>
