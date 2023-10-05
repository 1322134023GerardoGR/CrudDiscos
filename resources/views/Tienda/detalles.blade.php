<!doctype html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="GerardoGR">
    <meta name="theme-color" content="#000000"/>
    <link rel="shortcut icon" href="https://riffmagazine.com/wp-content/uploads/2021/04/KALEO-Surface-Sounds-604.jpg" />
    <title></title>

    <!-- Bootstrap -->
    @vite(['resources/js/app.js'])

</head>

<body>
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('Tienda/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Tienda/crear') }}">Crear</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container mt-5 mb-5">

    <div class="row">

        <div class="col-md-12">

            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <!-- Logo -->
                            <div class="logo">
                                <h5>Rutas</h5>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="navbar navbar-inverse" role="banner">
                                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                                    <ul class="nav navbar-nav">
                                        <li><a href="{{ route('Tienda/') }}">Administrador</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <div class="row">

                    <!--<div class="col-md-2">
                          <div class="sidebar content-box" style="display: block;">

                              <ul class="list-group">
                                  <li class="list-group-item">
                                      <a href="{{ route('Tienda/') }}"> Productos</a>
                                  </li>
                                  <li class="list-group-item">
                                      Opción 1
                                  </li>
                                  <li class="list-group-item">
                                      Opción 2
                                  </li>
                                  <li class="list-group-item">
                                      Opción 3
                                  </li>
                                  <li class="list-group-item">
                                      Opción 4
                                  </li>
                                  <li class="list-group-item">
                                      Opción 5
                                  </li>
                              </ul>
                          </div>
                      </div>-->

                    <div class="col-md-10">

                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('Tienda/') }}">Tienda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $discos->nombre }}</li>
                            </ol>
                        </nav>

                        <div class="row">

                            <div class="col-md-12">

                                <div class="content-box-large">

                                    <div class="panel-body">

                                        @if(Session::has('message'))
                                            <div class="alert alert-primary" role="alert">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif

                                        <p class="h5">Nombre:</p>
                                        <p class="h6 mb-3">{{ $discos->nombre }}</p>

                                        <p class="h5">Precio:</p>
                                        <p class="h6 mb-3">{{ $discos->precio }}</p>

                                        <p class="h5">Album:</p>
                                        <p class="h6 mb-3">{{ $discos->album }}</p>

                                        <p class="h5">Stock:</p>
                                        <p class="h6 mb-3">{{ $discos->stock }}</p>


                                    </div>

                                    <a href="{{ route('Tienda/') }}" class="btn btn-warning mt-3">Volver</a>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <hr>

</div>

<footer class="text-muted mt-3 mb-3">
    <div align="center">
        <h6>Creado por GerardoGR</h6>
    </div>
</footer>

<script type="text/javascript">

    function confirmarEliminar() {
        var x = confirm("Estas seguro de Eliminar?");
        if (x)
            return true;
        else
            return false;
    }

</script>

</body>
</html>
