@extends('panel.plantilla')

@section('cuerpo_panel')
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Profesional - Editar</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
                <a class="nav-link btn btn-primary" href="{{ route('profesional.index') }}" tabindex="-1" aria-disabled="true">Volver</a>
            </li>
        </ul>
    </nav>
    
    <section>

        @if ( session('mensaje') )
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif

        <form method="POST" action="{{ route('profesional.store') }}" id="formulario_cobertura" class="formulario">
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
            
            @if ($errors->has('apellido'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El Apellido es requerida
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            @if ($errors->has('dni'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El número de documento es requerido
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            @if ($errors->has('cuit'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El número de CUIT es requerido
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            @if ($errors->has('email'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El email es requerido
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            @if ($errors->has('telefono'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El número de teléfono es requrido
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            @if ($errors->has('nro_matricula'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  El número de matricula es requrido
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            @if ($errors->has('especialidad'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  La especialidad es requrida
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            <!-- CARGA DEL NOMBRE/DESCRIPCIÓN/TELÉFONO -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nombre">
                        <h6>Nombre</h6>
                    </label>
                    <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="apellido">
                        <h6>Apellido</h6>
                    </label>
                    <input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="dni">
                        <h6>DNI</h6>
                    </label>
                    <input type="number" class="form-control" name="dni" value="{{ old('dni') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="direccion">
                        <h6>Dirección</h6>
                    </label>
                    <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="email">
                        <h6>email</h6>
                    </label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="edad">
                        <h6>Edad</h6>
                    </label>
                    <input type="number" class="form-control" name="edad" value="{{ old('edad') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="telefono">
                        <h6>Teléfono</h6>
                    </label>
                    <input type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="codigo_postal">
                        <h6>Código postal</h6>
                    </label>
                    <input type="number" class="form-control" name="codigo_postal" value="{{ old('codigo_postal') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="cuit">
                        <h6>CUIT</h6>
                    </label>
                    <input type="number" class="form-control" name="cuit" value="{{ old('cuit') }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="fecha_nacimiento">
                        <h6>Fecha de nacimiento</h6>
                    </label>
                    <input type="date" class="form-control" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="nro_matricula">
                        <h6>Número de matricula</h6>
                    </label>
                    <input type="number" class="form-control" name="nro_matricula" value="{{ old('nro_matricula') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="especialidad">
                        <h6>Especialidad</h6>
                    </label>
                    <select name="especialidad" class="form-control">
                        <option value="" >Seleccionar especialidad</option>
                        @foreach ( $especialidades as $especialidad )
                            <option value="{{ $especialidad->id }}" >{{ $especialidad->nombre }}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="observacion">
                        <h6>Observación</h6>
                    </label>
                    <textarea class="form-control" name="observacion" value="{{ old('observacion') }}"></textarea>
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
            <button type="submit" class="btn btn-primary">EDITAR</button>
        </form>
    </section>    

@endsection