@extends('layouts.app')

@section('content')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3">Listado de Películas</h1>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">ID</th>
                    <th scope="col" class="text-center">Título</th>
                    <th scope="col" class="text-center">Género</th>
                    <th scope="col" class="text-center">Puntuación</th>
                    <th scope="col" class="text-center">Actor Principal</th>
                    <th scope="col" class="text-center">Actor Secundario</th>
                    <th scope="col" class="text-center">Fecha de Publicación</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($peliculas as $pelicula)
                    <tr>
                        <td class="text-center">{{ $pelicula->id }}</td>
                        <td class="text-center">{{ $pelicula->titulo }}</td>
                        <td class="text-center">{{ $pelicula->genero }}</td>
                        <td class="text-center">{{ $pelicula->puntuacion }}</td>
                        <td class="text-center">{{ $pelicula->actor_principal }}</td>
                        <td class="text-center">{{ $pelicula->actor_secundario }}</td>
                        <td class="text-center">{{ $pelicula->fecha_publicacion }}</td>
                        <td class="text-center">
                            <form id="delete-form-{{ $pelicula->id }}" action="{{ route('peliculas.destroy', $pelicula->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $pelicula->id }})">
                                    <i class="fas fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $peliculas->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(peliculaId) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "Esta acción no se puede deshacer.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + peliculaId).submit();
            }
        });
    }
</script>