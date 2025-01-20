@extends('components.layout')

@section('content')

<div class="container">
    <h1>Marcas</h1>

    <!-- Formulario para crear una nueva Marca -->
    <form action="{{ url('api/marca/guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Marca</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Marca</button>
    </form>

    <!-- Tabla para listar las Marcas existentes -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marca as $marca)
            <tr>
                <td>{{ $marca->id }}</td>
                <td>{{ $marca->nombre }}</td>
                <td>
                    <a href="{{ url('api/marca/actualizar/'.$marca->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ url('api/marca/borrar/'.$marca->id) }}" method="POST" style="display:inline;">
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
