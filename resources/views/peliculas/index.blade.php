<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Películas</title>
</head>
<body>
    <h1>Listado de Películas</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Género</th>
                <th>Puntuación</th>
                <th>Actor Principal</th>
                <th>Actor Secundario</th>
                <th>Fecha de Publicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula->id }}</td>
                    <td>{{ $pelicula->titulo }}</td>
                    <td>{{ $pelicula->genero }}</td>
                    <td>{{ $pelicula->puntuacion }}</td>
                    <td>{{ $pelicula->actor_principal }}</td>
                    <td>{{ $pelicula->actor_secundario }}</td>
                    <td>{{ $pelicula->fecha_publicacion }}</td>
                    <td>
                        <form action="{{ route('peliculas.destroy', $pelicula) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>