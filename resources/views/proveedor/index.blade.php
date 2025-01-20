@extends('components.layout')

@section('content')

<div class="container">
    <h1>Proveedores</h1>

    <!-- Formulario para crear un nuevo Proveedor -->
    <form action="{{ url('api/proveedor/guardar') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Proveedor</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear Proveedor</button>
    </form>

    <!-- Tabla para listar los Proveedores existentes -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedor as $proveedor)
            <tr>
                <td>{{ $proveedor->id }}</td>
                <td>{{ $proveedor->nombre }}</td>
                <td>
                    <a href="{{ url('api/proveedor/actualizar/'.$proveedor->id) }}" class="btn btn-warning">Editar</a>
                    <form action="{{ url('api/proveedor/borrar/'.$proveedor->id) }}" method="POST" style="display:inline;">
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
