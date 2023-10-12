<div class="row">
    <div class="col-md-12">
        <!-- beggin::Content -->
        <section class="panel">
            <div class="panel-body">
                {{-- begin::if --}}
                @if ( !empty ( $albums->id) )

                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre:</label>
                        <div>
                            <input class="form-control" placeholder="asd" required="required"
                                   name="nombre" type="text" id="nombre" value="{{ $albums->nombre }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="anio_lanzamiento" class="negrita">Año de lanzamiento:</label>
                        <div>
                            <input class="form-control" placeholder="2020" required="required" name="anio_lanzamiento" type="number"
                                   id="anio_lanzamiento" value="{{ $albums->anio_lanzamiento }}">
                        </div>
                    </div>

                @else

                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre:</label>
                        <div>
                            <input class="form-control" placeholder="Romance" required="required"
                                   name="nombre" type="text" id="nombre">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="anio_lanzamiento" class="negrita">Año de lanzamiento:</label>
                        <div>
                            <input class="form-control" placeholder="2020" required="required" name="anio_lanzamiento" type="text"
                                   id="anio_lanzamiento">
                        </div>
                    </div>

                @endif
                {{-- end::if --}}

                    <button type="submit" class="btn btn-info">Guardar</button>
                    <a href="{{ route('Albums') }}" class="btn btn-warning">Cancelar</a>

                <br>
                <br>

            </div>
        </section>
        <!-- end::Content -->
    </div>
</div>
