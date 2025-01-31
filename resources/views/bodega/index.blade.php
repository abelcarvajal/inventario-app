@extends('components.layout')

@section('content')

<div class="container">
    <h1>Bodegas</h1>
    <!-- Formulario para crear o editar una Bodega -->
    <form id="bodegaForm" action="{{ url('api/bodega/guardar') }}" method="POST">
        @csrf
        <!-- Campo oculto para manejar el método PUT -->
        <input type="hidden" name="_method" id="formMethod" value="POST">
        <input type="hidden" id="bodegaId" name="id">
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
        <button type="submit" class="btn btn-primary" id="submitButton">Guardar Bodega</button>
    </form>

    @if(session('mensaje'))
        <div class="alert alert-success mt-3" role="alert">
            {{ session('mensaje') }}
        </div>
    @endif

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
            <tr id="bodega-{{ $bodega->id }}">
                <td>{{ $bodega->id }}</td>
                <td>{{ $bodega->nombre }}</td>
                <td>{{ $bodega->ubicacion }}</td>
                <td>
                    <button type="button" class="btn btn-outline-secondary edit-btn" data-id="{{ $bodega->id }}" data-nombre="{{ $bodega->nombre }}" data-ubicacion="{{ $bodega->ubicacion }}"><i aria-label="Editar" class="bi bi-pencil-square"></i></button>
                    <form action="{{ url('api/bodega/borrar/'.$bodega->id) }}" method="POST" style="display:inline;" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de eliminar esta bodega?')"><i class="bi bi-trash" ></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-btn');
        const form = document.getElementById('bodegaForm');
        const submitButton = document.getElementById('submitButton');
        const formMethod = document.getElementById('formMethod');

        editButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                const ubicacion = this.getAttribute('data-ubicacion');

                // Llenar el formulario con los datos de la bodega
                document.getElementById('bodegaId').value = id;
                document.getElementById('nombre').value = nombre;
                document.getElementById('ubicacion').value = ubicacion;

                // Cambiar el texto del botón y la acción del formulario
                submitButton.textContent = 'Actualizar Bodega';
                form.action = `{{ url('api/bodega/actualizar') }}/${id}`;
                formMethod.value = 'PUT'; // Cambiar el método a PUT
            });
        });

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            const actionUrl = this.action;

            fetch(actionUrl, {
                method: formMethod.value, // Usar el método dinámico (POST o PUT)
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Limpiar el formulario
                    form.reset();
                    // Restablecer el texto del botón
                    submitButton.textContent = 'Guardar Bodega';
                    // Restablecer la acción del formulario
                    form.action = "{{ url('api/bodega/guardar') }}";
                    document.getElementById('bodegaId').value = '';
                    formMethod.value = 'POST'; // Restablecer el método a POST
                    // Mostrar mensaje de éxito
                    alert('Bodega guardada/actualizada con éxito');
                    // Recargar la página para reflejar los cambios
                    location.reload();
                } else {
                    alert('Error al guardar la bodega');
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
</script>

@endsection
