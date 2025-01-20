@extends('components.layout')

@section('content')

<div class="container">
    <h1>Bodegas</h1>

    <!-- Formulario para crear una nueva Bodega -->
    <form action="{{ url('api/bodega/guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Bodega</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Bodega</button>
    </form>

    <!-- Tabla para listar las Bodegas existentes -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bodegas as $bodega)
            <tr>
                <td>{{ $bodega->id }}</td>
                <td>{{ $bodega->nombre }}</td>
                <td>
                    <a href="{{ url('api/bodega/actualizar/'.$bodega->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ url('api/bodega/borrar/'.$bodega->id) }}" method="POST" style="display:inline;">
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