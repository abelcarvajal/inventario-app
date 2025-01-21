<form action="{{ route('bodega.update', $bodega->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $bodega->nombre }}">
    </div>
    <div class="form-group">
        <label for="ubicacion">Ubicación</label>
        <input type="text" name="ubicacion" class="form-control" value="{{ $bodega->ubicacion }}">
    <button type="submit" class="btn btn-success">Actualizar</button>
</form>