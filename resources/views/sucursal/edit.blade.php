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

        <form method="POST" action="" id="formulario_sucursal" class="formulario">
            @csrf
            @method('PUT')
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

            @if ($errors->has('telefono'))
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
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $sucursales->nombre }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="direccion">
                        <h6>Dirección</h6>
                    </label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $sucursales->direccion }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="telefono">
                        <h6>Teléfono</h6>
                    </label>
                    <input type="number" class="form-control" id="telefono" name="telefono" placeholder="Ej: 4 554 4444" value="{{ $sucursales->telefono }}">
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
                   
                    @foreach($sucursales->sucursales_dias as $dia)

                        <!-- LUNES -->
                        <div class="formulario-fechas__box--dias">
                            <div class="form-check">
                                <label class="form-check-label" for="dia_lunes">
                                    <input type="hidden" name="dias[]" value="{{ $dia->dia }}">
                                    {{ $semana[$dia->dia] }}
                                </label>
                            </div>
                        </div>    

                    @endforeach
                    {{-- <div class="form-check">
                        <label class="form-check-label" for="dia_lunes">
                            <input type="checkbox" name="dias[]" value="1" id="dia_lunes" 
                                @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 1 ) checked @endif @endforeach
                            />
                            Lunes
                        </label>
                    </div> --}}
                </div>
                <div class="col-md-2">
                    {{-- <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_lunes" 
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 1 ) value="{{ $dia->hora_apertura }}" @endif @endforeach
                    /> --}}

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
                <div class="col-md-2">

                    {{-- input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_lunes" 
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 1 ) value="{{ $dia->hora_cierre }}" @endif @endforeach
                    /> --}}

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
           {{--  <div class="form-row formulario-fechas__box">
                <div class="col-md-8">
                    <div class="form-check">
                        <label class="form-check-label" for="dia_martes">
                            <input type="checkbox" name="dias[]" value="2" id="dia_martes"
                                @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 2 ) checked @endif @endforeach
                            />
                            Martes
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_martes"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 2 ) value="{{ $dia->hora_apertura }}" @endif @endforeach
                    />
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_martes"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 2 ) value="{{ $dia->hora_cierre }}" @endif @endforeach
                    />
                </div>
            </div>
            <div class="form-row formulario-fechas__box">
                <div class="col-md-8">
                    <div class="form-check">                        
                        <label class="form-check-label" for="miercoles">
                            <input type="checkbox" name="dias[]" value="3" id="miercoles"
                                @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 3 ) checked @endif @endforeach
                            />
                            Miércoles
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_miercoles"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 3 ) value="{{ $dia->hora_apertura }}" @endif @endforeach
                    />
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_miercoles"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 3 ) value="{{ $dia->hora_cierre }}" @endif @endforeach
                    />
                </div>
            </div>
            <div class="form-row formulario-fechas__box">
                <div class="col-md-8">
                    <div class="form-check">
                        <label class="form-check-label" for="jueves">
                            <input type="checkbox" name="dias[]" value="4" id="jueves"
                                @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 4 ) checked @endif @endforeach
                            />
                            Jueves
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_jueves"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 4 ) value="{{ $dia->hora_apertura }}" @endif @endforeach
                    />
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_jueves"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 4 ) value="{{ $dia->hora_cierre }}" @endif @endforeach
                    />
                </div>
            </div>
            <div class="form-row formulario-fechas__box">
                <div class="col-md-8">
                    <div class="form-check">
                        <label class="form-check-label" for="viernes">
                            <input type="checkbox" name="dias[]" value="5" id="viernes"
                                @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 5 ) checked @endif @endforeach
                            />
                            Viernes
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_viernes"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 5 ) value="{{ $dia->hora_apertura }}" @endif @endforeach
                    />
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_viernes"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 5 ) value="{{ $dia->hora_cierre }}" @endif @endforeach
                    />
                </div>
            </div>
            <div class="form-row formulario-fechas__box">
                <div class="col-md-8">
                    <div class="form-check">
                        <label class="form-check-label" for="sabado">
                            <input type="checkbox" name="dias[]" value="6" id="sabado"
                                @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 6 ) checked @endif @endforeach
                            />
                            Sábado
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_sabado"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 6 ) value="{{ $dia->hora_apertura }}" @endif @endforeach
                    />
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_sabado"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 6 ) value="{{ $dia->hora_cierre }}" @endif @endforeach
                    />
                </div>
            </div>
            <div class="form-row formulario-fechas__box">
                <div class="col-md-8">
                    <div class="form-check">
                        <label class="form-check-label" for="domingo">
                            <input type="checkbox" name="dias[]" value="7" id="domingo"
                                @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 7 ) checked @endif @endforeach
                            />
                            Domingo
                        </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_domingo"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 7 ) value="{{ $dia->hora_apertura }}" @endif @endforeach
                    />
                </div>
                <div class="col-md-2">
                    <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_domingo"
                        @foreach ($sucursales->sucursales_dias as $dia) @if ( $dia->dia == 7 ) value="{{ $dia->hora_cierre }}" @endif @endforeach
                    />
                </div>
            </div> --}}

            <!-- ESTADO DEL REGISTRO -->
            <div class="form-group">
                <div class="form-row">
                    <div class="col-sm-12">
                        <h6>Estado de configuración de registro</h6>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" 
                                @if ($sucursales->estado == 1) checked @endif
                            />
                            <label class="form-check-label" for="estado1">
                              Habilitar
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" 
                                @if ($sucursales->estado == 0) checked @endif
                            />
                            <label class="form-check-label" for="estado2">
                              Deshabilitar
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- PROCESAR CARGA -->
            <button type="submit" class="btn btn-primary">MODIFICAR</button>
        </form>
    </section>    

@endsection