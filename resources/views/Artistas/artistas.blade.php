<!DOCTYPE html>
<html lang="es" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="GerardoGR">
    <title>Artistas</title>

    @vite(['resources/js/app.js'])
    <link rel="shortcut icon" href="https://riffmagazine.com/wp-content/uploads/2021/04/KALEO-Surface-Sounds-604.jpg" />
</head>

<body>

<!-- beggin::Header -->
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('Tienda/') }}">Discos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Albums') }}">Albums</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Singers') }}">Cantantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('Artist') }}">Artistas</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!-- end::Header -->
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-12">

            <h1 style="font-size: 28px;" class="text-center">Artistas</h1>

            <!-- beggin::tittle header -->
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
            <!-- end::tittle header -->
            <!-- beggin::Page content -->
            <div class="page-content">
                <div class="row">
                    <div class="col-md-10">
                        <!-- beggin::Breadcrumbs -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('Tienda/') }}">Discos</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Artistas</li>
                            </ol>
                        </nav>
                            <!-- end::Breadcrumbs -->
                            <!-- beggin::Content -->
                            <div class="content-box-large">
                            <div class="panel-heading">
                                <div class="panel-title"><h2>Discos</h2></div>
                            </div>

                            <div class="panel-body">
                                @if(Session::has('message'))
                                    <div class="alert alert-primary" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                                @endif

                                <a href="{{ route('Artist.crear') }}" class="btn btn-success mt-4 ml-3">Crear</a>
                                <!-- beggin::Table section -->
                                <section class="example mt-4">
                                    <div class="table-responsive">
                                        <!-- beggin::Table -->
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>id</th>
                                                <th>Disco</th>
                                                <th>Cantante</th>
                                                <th>Acciones</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($artists as $artist)
                                                <tr>
                                                    <td class="v-align-middle">{{$artist->id}}</td>
                                                    @if($artist->disco_id!=null)
                                                        <td class="v-align-middle">{{$discos[($artist->disco_id)]}}</td>
                                                    @else
                                                        <td class="v-align-middle">No tiene disco</td>
                                                    @endif
                                                    @if($artist->cantante_id!=null)
                                                        <td class="v-align-middle">{{$singers[($artist->cantante_id)]}}</td>
                                                    @else
                                                        <td class="v-align-middle">No tiene Cantante</td>
                                                    @endif
                                                    <td class="v-align-middle">
                                                        <!-- beggin::form for actions -->
                                                         <form action="{{ route('Artist.eliminar',$artist->id) }}"
                                                              method="POST"
                                                              class="form-horizontal" role="form"
                                                              onsubmit="return confirmarEliminar()">
                                                            <input type="hidden" name="_method" value="PUT">
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }}">
                                                            <a href="{{ route('Artist.detalles',$artist->id) }}"
                                                               class="btn btn-dark">Detalles</a>
                                                            <a href="{{ route('Artist.actualizar',$artist->id) }}"
                                                               class="btn btn-primary">Editar</a>
                                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                                        </form>
                                                        <!-- end::form for actions -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <!-- end::Table -->
                                    </div>
                                </section>
                                <!-- end::Table section -->
                            </div>
                        </div>
                        <!-- end::Content -->
                    </div>
                </div>
            </div>
            {{-- End of the page content --}}
        </div>
    </div>
    <hr>
</div>
{{ $artists->links() }}


<!-- beggin::Footer -->
<footer class="text-muted mt-3 mb-3">
    <div align="center">
        <h6>Created by GerardoGR</h6>
    </div>
</footer>
<!-- end::Footer -->

{{-- Script --}}
<script type="text/javascript">
    function confirmarEliminar() {
        return confirm("Are you sure you want to delete?");
    }
</script>
{{-- End of Script --}}

</body>
</html>
