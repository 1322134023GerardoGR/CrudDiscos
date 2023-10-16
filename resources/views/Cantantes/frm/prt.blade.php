<div class="row">
    <div class="col-md-12">
        <!-- beggin::Content -->
        <section class="panel">
            <div class="panel-body">
                {{-- begin::if --}}
                @if ( !empty ( $singers->id) )

                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre:</label>
                        <div>
                            <input class="form-control" placeholder="Gerardo" required="required"
                                   name="nombre" type="text" id="nombre" value="{{ $singers->nombre }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="apellidos" class="negrita">Apellido:</label>
                        <div>
                            <input class="form-control" placeholder="Hernandez" required="required" name="apellidos" type="text"
                                   id="apellidos" value="{{ $singers->apellidos }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="negrita">Fecha de nacimiento:</label>
                        <div>
                            <input class="form-control" placeholder="15-05-2020" required="required" name="fecha_nacimiento" type="date"
                                   id="fecha_nacimiento" value="{{ $singers->fecha_nacimiento }}">
                        </div>
                    </div>

                @else

                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre:</label>
                        <div>
                            <input class="form-control" placeholder="Gerardo" required="required"
                                   name="nombre" type="text" id="nombre" >
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="apellidos" class="negrita">Apellido:</label>
                        <div>
                            <input class="form-control" placeholder="Hernandez" required="required" name="apellidos" type="text"
                                   id="apellidos" >
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="fecha_nacimiento" class="negrita">Fecha de nacimiento:</label>
                        <div>
                            <input class="form-control" placeholder="15-05-2020" required="required" name="fecha_nacimiento" type="date"
                                   id="fecha_nacimiento" >
                        </div>
                    </div>


                @endif
                {{-- end::if --}}

                    <button type="submit" class="btn btn-info">Guardar</button>
                    <a href="{{ route('singers') }}" class="btn btn-warning">Cancelar</a>

                <br>
                <br>

            </div>
        </section>
        <!-- end::Content -->
    </div>
</div>
