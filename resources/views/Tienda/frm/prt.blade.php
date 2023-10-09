<div class="row">
    <div class="col-md-12">
        <!-- beggin::Content -->
        <section class="panel">
            <div class="panel-body">
                {{-- begin::if --}}
                @if ( !empty ( $discos->id) )

                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre:</label>
                        <div>
                            <input class="form-control" placeholder="asd" required="required"
                                   name="nombre" type="text" id="nombre" value="{{ $discos->nombre }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="precio" class="negrita">Precio:</label>
                        <div>
                            <input class="form-control" placeholder="4.50" required="required" name="precio" type="number"
                                   id="precio" value="{{ $discos->precio }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="album" class="negrita">Album:</label>
                        <div>
                            <input class="form-control" placeholder="4.50" required="required" name="album" type="text"
                                   id="album" value="{{ $discos->album }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="negrita">Stock:</label>
                        <div>
                            <input class="form-control" placeholder="40" required="required" name="stock" type="text"
                                   id="stock" value="{{ $discos->stock }}">
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
                        <label for="precio" class="negrita">Precio:</label>
                        <div>
                            <input class="form-control" placeholder="10" required="required" name="precio" type="number"
                                   id="precio">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="album" class="negrita">Album:</label>
                        <div>
                            <input class="form-control" placeholder="Romance" required="required" name="album" type="text"
                                   id="album">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="stock" class="negrita">Stock:</label>
                        <div>
                            <input class="form-control" placeholder="10" required="required" name="stock" type="text"
                                   id="stock">
                        </div>
                    </div>


                @endif
                {{-- end::if --}}

                    <button type="submit" class="btn btn-info">Guardar</button>
                    <a href="{{ route('Tienda/') }}" class="btn btn-warning">Cancelar</a>

                <br>
                <br>

            </div>
        </section>
        <!-- end::Content -->
    </div>
</div>
