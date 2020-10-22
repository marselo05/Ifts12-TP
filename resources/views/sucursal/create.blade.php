@extends('panel.plantilla')

@section('cuerpo_panel')
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>SUCURSALES</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('sucursal.index') }}" tabindex="-1" aria-disabled="true">Volver</a>
            </li>
        </ul>
    </nav>
    
    <section>

        @if ( session('mensaje') )
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif

        <form method="POST" action="{{ route('sucursal.store') }}" id="formulario_sucursal" class="formulario" enctype="multipart/form-data">
            @csrf

            <!-- REQUERIMIENTO DEL FORMULARIO -->
            @error('nombre')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El nombre es requerido
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror 
            
            @if ($errors->has('direccion'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  La dirección es requerida
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            <!-- CARGA DEL NOMBRE/DIRECCIÓN/TELÉFONO -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nombre">
                        <h6>Nombre de la sucursal</h6>
                    </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="direccion">
                        <h6>Dirección</h6>
                    </label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="telefono">
                        <h6>Teléfono</h6>
                    </label>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ej: 4 554 4444" value="{{ old('telefono') }}">
                </div>
                <div class="form-group col-md-12">
                    <label>
                        <h6>Imagen</h6>
                    </label>
                    <input type="file" name="imagen">
                </div>
            </div>

            <!-- CARGA DE DÍAS Y HORARIOS -->
            <div class="form-row">
                <div class="col-md-7">
                    <h6>Dias de la semana</h6>
                </div>
                <div class="col-md-2">
                    <h6>Hora de Apertura</h6>
                </div>
                <div class="col-md-2">
                    <h6>Hora de Cierre</h6>
                </div>
                <div class="col-md-1">
                    <h6>Estado</h6>
                </div>
            </div>
            <div class="form-row formulario-fechas__box">
                <div class="col-md-7">
                    <!-- LUNES -->
                    <div class="formulario-fechas__box--dias">
                        <div class="form-check">
                            <label class="form-check-label" for="dia_lunes">
                                <input type="hidden" name="dias[]" value="1" id="dia_lunes">
                                Lunes
                            </label>
                        </div>
                    </div>    
                    <!-- MARTES -->
                    <div class="formulario-fechas__box--dias">
                        <div class="form-check">
                            <label class="form-check-label" for="dia_martes">
                                <input type="hidden" name="dias[]" value="2" id="dia_martes">
                                Martes
                            </label>
                        </div>
                    </div>    
                    <!-- MIERCOLES -->
                    <div class="formulario-fechas__box--dias">
                        <div class="form-check">
                            <label class="form-check-label" for="miercoles">
                                <input type="hidden" name="dias[]" value="3" id="miercoles">
                                Miércoles
                            </label>
                        </div>
                    </div>    
                    <!-- JUEVES -->
                    <div class="formulario-fechas__box--dias">
                        <div class="form-check">
                            <label class="form-check-label" for="jueves">
                                <input type="hidden" name="dias[]" value="4" id="jueves">
                                Jueves
                            </label>
                        </div>
                    </div>
                    <!-- VIERNES -->
                    <div class="formulario-fechas__box--dias">
                        <div class="form-check">
                            <label class="form-check-label" for="viernes">
                                <input type="hidden" name="dias[]" value="5" id="viernes">
                                Viernes
                            </label>
                        </div>
                    </div>
                    <!-- SABADO -->
                    <div class="formulario-fechas__box--dias">
                        <div class="form-check">
                            <label class="form-check-label" for="sabado">
                                <input type="hidden" name="dias[]" value="6" id="sabado">
                                Sábado
                            </label>
                        </div>
                    </div>
                    <!-- DOMINGO -->
                    <div class="formulario-fechas__box--dias">
                        <div class="form-check">
                            <label class="form-check-label" for="domingo">
                                <input type="hidden" name="dias[]" value="7" id="domingo">
                                Domingo
                            </label>
                        </div>
                    </div>

                </div>
                <!-- HORARIOS DE APERTURA -->
                <div class="col-md-2">

                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_lunes" value="">
                    </div>

                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_martes">    
                    </div>

                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_miercoles">
                    </div>

                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_jueves">
                    </div>

                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_viernes">
                    </div>
                    
                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_sabado">
                    </div>
                    
                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_domingo">
                    </div>

                </div>
                <!-- HORARIO DE CIERRE -->
                <div class="col-md-2">

                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_lunes" value="">
                    </div>

                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_martes">
                    </div>
                    
                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_miercoles">
                    </div>
                    
                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_jueves">
                    </div>

                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_viernes">
                    </div>

                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_sabado">
                    </div>

                    <div class="formulario-fechas__box--horario">
                        <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_domingo">
                    </div>

                </div>
                <!-- ESTADO DEL HORARIO -->
                <div class="col-md-1">

                    <div class="formulario-fechas__box--estado-dia">
                        <input type="checkbox" name="estado_dias[]" value="1">
                    </div>

                    <div class="formulario-fechas__box--estado-dia">
                        <input type="checkbox" name="estado_dias[]" value="2">
                    </div>

                    <div class="formulario-fechas__box--estado-dia">
                        <input type="checkbox" name="estado_dias[]" value="3">
                    </div>

                    <div class="formulario-fechas__box--estado-dia">
                        <input type="checkbox" name="estado_dias[]" value="4">
                    </div>

                    <div class="formulario-fechas__box--estado-dia">
                        <input type="checkbox" name="estado_dias[]" value="5">
                    </div>

                    <div class="formulario-fechas__box--estado-dia">
                        <input type="checkbox" name="estado_dias[]" value="6">
                    </div>

                    <div class="formulario-fechas__box--estado-dia">
                        <input type="checkbox" name="estado_dias[]" value="7">
                    </div>

                </div>
            </div>

            <!-- ESTADO DEL REGISTRO -->
            <div class="form-group">
                <div class="form-row">
                    <div class="col-sm-12">
                        <h6>Estado de configuración de registro</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" checked>
                            <label class="form-check-label" for="estado1">
                              Habilitar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="estado2" value="0">
                            <label class="form-check-label" for="estado2">
                              Deshabilitar
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PROCESAR CARGA -->
            <button type="submit" class="btn btn-primary">AGREGAR</button>
        </form>
    </section>    

@endsection