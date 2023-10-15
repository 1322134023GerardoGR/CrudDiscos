<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="GerardoGR">
    <link rel="shortcut icon" href="https://riffmagazine.com/wp-content/uploads/2021/04/KALEO-Surface-Sounds-604.jpg" />
    <title>
        Actualizar Cantante
    </title>

    <!-- Bootstrap -->
    @vite(['resources/js/app.js'])
</head>

<body>
<!-- beggin::Header -->
<header>
    <!-- beggin::Navigation bar content -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('store') }}">Discos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('albums') }}">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('singers') }}">Cantantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('artist') }}">Artistas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end::Navigation bar content -->
</header>
<!-- end::Header -->
<!-- beggin::Content -->
<div class="container mt-5 mb-5">
    <div class="row">

        <div class="col-md-12">

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
                                        <li><a href="{{ route('store') }}">Administrador</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- begin::Page content -->
            <div class="page-content">
                <div class="row">

                    <div class="col-md-10">
                        <!-- beggin::Breadcrumbs -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('store') }}">Discos</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('singers') }}">Cantantes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Actualizar</li>
                            </ol>
                        </nav>
                        <!-- end::Breadcrumbs -->

                        <div class="row">
                            <div class="col-md-12">

                                <div class="content-box-large">

                                    <div class="panel-heading">
                                        <div class="panel-title"><h2>Actualizar</h2></div>
                                    </div>

                                    <div class="panel-body">

                                        <section class="example mt-4">
                                            <!-- begin::Formulario -->
                                            <form method="POST" action="{{ route('singers.test.update',$singers->id) }}"
                                                  role="form">
                                                <input type="hidden" name="_method" value="PUT">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                @include('Cantantes.frm.prt')
                                            </form>
                                            <!-- end::Formulario -->
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end::Page content -->
        </div>
    </div>

    <hr>
</div>
<!-- end::Content -->
<!-- beggin::Footer -->
<footer class="text-muted mt-3 mb-3">
    <div align="center">
        <h6>Creado por GerardoGR</h6>
    </div>
</footer>
<!-- end::Footer -->
</body>
</html>
