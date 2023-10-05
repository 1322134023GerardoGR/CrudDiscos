<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="GerardoGR">
    <link rel="shortcut icon" href="https://riffmagazine.com/wp-content/uploads/2021/04/KALEO-Surface-Sounds-604.jpg" />
    <title>Tienda</title>

    <!-- Bootstrap -->
    @vite(['resources/js/app.js'])
</head>

<body>

<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        {{-- Inicio de la barra de navegación --}}
                    </li>
                    <li class="nav-item">
                        {{-- Elemento de navegación --}}
                    </li>
                    <li class="nav-item">
                        {{-- Elemento de navegación --}}
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div class="container mt-5 mb-5">
    <div class="row">

        <div class="col-md-12">
            {{-- Inicio del contenido principal --}}
            <h1 style="font-size: 28px;" class=" text-center">Editar</h1>

            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <!-- Logo -->
                            <div class="logo">
                                <h5>Rutas</h5>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group form">
                                        {{-- Input de búsqueda --}}
                                    </div>
                                </div>
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

                    <div class="col-md-10">
                        {{-- Inicio del contenido principal --}}
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('Tienda/') }}">Productos</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Actualizar</li>
                            </ol>
                        </nav>

                        <div class="row">
                            <div class="col-md-12">

                                <div class="content-box-large">

                                    <div class="panel-heading">
                                        <div class="panel-title"><h2>Actualizar</h2></div>
                                    </div>

                                    <div class="panel-body">

                                        <section class="example mt-4">
                                            {{-- Inicio del formulario --}}
                                            <form method="POST" action="{{ route('Tienda/prueba/update',$discos->id) }}" role="form" enctype="multipart/form-data">
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                @include('Tienda.frm.prt')
                                            </form>
                                            {{-- Fin del formulario --}}
                                        </section>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>
                    {{-- Fin del contenido principal --}}
                </div>
            </div>

        </div>

    </div>

    <hr>
</div>

{{-- Footer --}}
<footer class="text-muted mt-3 mb-3">
    <div>
        <h6>Creado por GerardoGR</h6>
    </div>
</footer>
{{-- End of the footer section --}}

</body>
</html>
