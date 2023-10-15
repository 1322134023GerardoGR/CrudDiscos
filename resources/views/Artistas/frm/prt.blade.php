<div class="row">
    <div class="col-md-12">
        <!-- beggin::Content -->
        <section class="panel">
            <div class="panel-body">
                {{-- begin::if --}}
                @if ( !empty ( $artists->id) )


                    <div class="mb-3">
                        <label for="disco_id" class="negrita">Disco:</label>
                        <div>
                            <select class="form-control" name="disco_id" id="disco_id" >
                                @if($artists->disco_id!=null)
                                <option value="{{ $discos[($artists->disco_id)]->id }}"> {{ $discos[($artists->disco_id)]->nombre }} </option>
                                <option value="">Seleccione un album</option>
                              @foreach($discos as $disco)
                                    <option value="{{ $disco->id }}"> {{ $disco->nombre }} </option>
                              @endforeach
                                @else
                                    <option value="">Seleccione un disco</option>
                                    @foreach($discos as $disco)
                                        <option value="{{ $disco->id }}"> {{ $disco->nombre }} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cantante_id" class="negrita">Cantante:</label>
                        <div>
                            <select class="form-control" name="cantante_id" id="cantante_id" >
                                @if($artists->cantante_id!=null)
                                    <option value="{{ $cantantes[($artists->cantante_id)]->id }}">
                                        {{ $cantantes[($artists->cantante_id)]->nombre }} {{ $cantantes[($artists->cantante_id)]->apellidos }}
                                    </option>
                                    <option value="">Seleccione un cantante</option>
                                    @foreach($cantantes as $cantante)
                                        <option value="{{ $cantante->id }}"> {{ $cantante->nombre }} {{ $cantante->apellidos }} </option>
                                    @endforeach
                                @else
                                    <option value="">Seleccione un cantante</option>
                                    @foreach($cantantes as $cantante)
                                        <option value="{{ $cantante->id }}"> {{ $cantante->nombre }} {{ $cantante->apellidos }} </option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>

                @else


                    <div class="mb-3">
                        <label for="disco_id" class="negrita">Album:</label>
                        <div>
                            <select class="form-control" name="disco_id" id="disco_id" required="required">
                                <option value="">Seleccione un disco</option>
                                @foreach($discos as $disco)
                                    <option value="{{ $disco->id }}"> {{ $disco->nombre }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="cantante_id" class="negrita">cantante:</label>
                        <div>
                            <select class="form-control" name="cantante_id" id="cantante_id" required="required">
                                <option value="">Seleccione un cantante</option>
                                @foreach($cantantes as $cantante)
                                    <option value="{{ $cantante->id }}"> {{ $cantante->nombre }} {{ $cantante->apellidos }} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                @endif
                {{-- end::if --}}

                    <button type="submit" class="btn btn-info">Guardar</button>
                    <a href="{{ route('artist') }}" class="btn btn-warning">Cancelar</a>

                <br>
                <br>

            </div>
        </section>
        <!-- end::Content -->
    </div>
</div>
