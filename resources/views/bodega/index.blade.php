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
            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ubicacion" class="form-label">Ubicación</label>
            <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
            @error('ubicacion')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Crear Bodega</button>
    </form>

    <!-- Tabla para listar las Bodegas existentes -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bodegas as $bodega)
            <tr>
                <td>{{ $bodega->id }}</td>
                <td>{{ $bodega->nombre }}</td>
                <td>{{ $bodega->ubicacion }}</td>
                <td>
                    <a href="{{ route('bodega.edit', $bodega->id) }}" class="btn btn-outline-secondary"><i aria-label="Editar" class="bi bi-pencil-square" style="font-size: 2rem; color: gray;"></i></a>
                    <form action="{{ url('api/bodega/borrar/'.$bodega->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta bodega?')"><i class="bi bi-trash" style="font-size: 2rem"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection