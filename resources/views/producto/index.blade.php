@extends('components.layout')

@section('content')

<div class="container">
    <h1>Productos</h1>

    <!-- Formulario para crear un nuevo Producto -->
    <form action="{{ url('api/producto/guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Producto</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Producto</button>
    </form>

    <!-- Tabla para listar los Productos existentes -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($producto as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>
                    <a href="{{ url('api/producto/actualizar/'.$producto->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ url('api/producto/borrar/'.$producto->id) }}" method="POST" style="display:inline;">
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
