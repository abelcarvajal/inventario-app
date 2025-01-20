@extends('components.layout')

@section('content')

<div class="container">
    <h1>Inventarios</h1>

    <!-- Formulario para crear un nuevo Inventario -->
    <form action="{{ url('api/inventario/guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Inventario</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Inventario</button>
    </form>

    <!-- Tabla para listar los Inventarios existentes -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventario as $inventario)
            <tr>
                <td>{{ $inventario->id }}</td>
                <td>{{ $inventario->nombre }}</td>
                <td>
                    <a href="{{ url('api/inventario/actualizar/'.$inventario->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ url('api/inventario/borrar/'.$inventario->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
