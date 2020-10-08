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

        <form method="POST" action="{{ route('sucursal.update', $sucursales->id) }}" id="formulario_sucursal" class="formulario">
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
                    <input type="number" class="form-control" id="telefono" name="telefono" value="{{ $sucursales->telefono }}">
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

                        <div class="formulario-fechas__box--dias">
                            <div class="form-check">
                                {{-- <input type="hidden" name="dias_id[]" value="{{ $dia->id }}"> --}}
                                <label class="form-check-label" for="dia_{{ strtolower($semana[$dia->dia]) }}">
                                    <input type="hidden" name="dias[]" value="{{ $dia->id }}">
                                    {{ $semana[$dia->dia] }}
                                </label>
                            </div>
                        </div>    

                    @endforeach

                </div>
                <div class="col-md-2">

                    @foreach ($sucursales->sucursales_dias as $dia) 

                        <div class="formulario-fechas__box--horario">
                            <input type="time" name="hora_apertura[]" class="form-control" id="hora_apertura_{{ strtolower($semana[$dia->dia]) }}" value="{{ $dia->hora_apertura }}">
                        </div>
                        
                    @endforeach

                </div>
                <div class="col-md-2">

                    @foreach ($sucursales->sucursales_dias as $dia) 
                        
                        <div class="formulario-fechas__box--horario">
                            <input type="time" name="hora_cierre[]" class="form-control" id="hora_cierre_{{ strtolower($semana[$dia->dia]) }}" value="{{ $dia->hora_cierre }}">
                        </div>
                        
                    @endforeach

                </div>

                <!-- ESTADO DEL HORARIO -->
                <div class="col-md-1">
                        
                    @foreach ($sucursales->sucursales_dias as $dia) 

                        <div class="formulario-fechas__box--estado-dia">
                            <input type="checkbox" name="estado_dias[]" value="{{ $dia->dia }}" 
                            @if ($dia->estado == 1) checked @endif  />
                        </div>

                    @endforeach



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