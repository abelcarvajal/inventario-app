
<html lang="es">
  <head>
    <title>{{ $title ?? 'Example Website' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1">Inventario</span>
  </div>
  <hr />
</nav>
    <div class="d-flex">
        <nav class="sidebar">
            <ul class="list-group">
                <li class="list-group-item"><a href="{{ url('bodega') }}">Bodegas</a></li>
                <li class="list-group-item"><a href="{{ url('inventario') }}">Inventarios</a></li>
                <li class="list-group-item"><a href="{{ url('marca') }}">Marcas</a></li>
                <li class="list-group-item"><a href="{{ url('producto') }}">Productos</a></li>
                <li class="list-group-item"><a href="{{ url('proveedor') }}">Proveedores</a></li>
            </ul>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </div>    

    <footer>
      <hr />
      © 2023 example.com
    </footer>
  </body>
</html>
