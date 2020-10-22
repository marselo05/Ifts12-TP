@extends('panel.plantilla')

@section('cuerpo_panel')
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Coberturas</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
                <a class="nav-link btn btn-primary" href="{{ route('cobertura.index') }}" tabindex="-1" aria-disabled="true">Volver</a>
            </li>
        </ul>
    </nav>
    
    <section>

        @if ( session('mensaje') )
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif

        <form method="POST" action="{{ route('cobertura.store') }}" id="formulario_cobertura" class="formulario">
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
            
            @if ($errors->has('descripcion'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  La descripción es requerida
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            @endif

            <!-- CARGA DEL NOMBRE/DESCRIPCIÓN/TELÉFONO -->
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="nombre">
                        <h6>Nombre de la obra social</h6>
                    </label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                </div>
                <div class="form-group col-md-10">
                    <label for="descripcion">
                        <h6>Descripción</h6>
                    </label>
                    <textarea type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion') }}"></textarea>
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

            <div class="form-row">
                <div class="form-group col-md-1">
                    <h6>&nbsp;</h6>
                </div>
                <div class="form-group col-md-4">
                    <h6>Nombre del plan</h6>
                </div>
                <div class="form-group col-md-5">
                    <h6>Descripción</h6>
                </div>
                <div class="form-group col-md-2">
                    <h6>Estado</h6>
                </div>
            </div>

            {{-- #1 --}}
            <div class="form-row">
                <div class="form-group col-md-1">
                    <h6>Plan #1</h6>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="nombre_plan_1" value="{{ old('nombre_plan_1') }}">
                </div>
                <div class="form-group col-md-5">
                    <input type="text" class="form-control" name="descripcion_plan_1" value="{{ old('descripcion_plan_1') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>
                        <input type="checkbox" name="estado_plan_1" value="1">
                    </label>
                </div>
            </div>
            {{-- 2 --}}
            <div class="form-row">
                <div class="form-group col-md-1">
                    <h6>Plan #2</h6>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="nombre_plan_2" value="{{ old('nombre_plan_2') }}">
                </div>
                <div class="form-group col-md-5">
                    <input type="text" class="form-control" name="descripcion_plan_2" value="{{ old('descripcion_plan_2') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>
                        <input type="checkbox" name="estado_plan_2" value="2">
                    </label>
                </div>
            </div>
            {{-- #3 --}}
            <div class="form-row">
                <div class="form-group col-md-1">
                    <h6>Plan #3</h6>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="nombre_plan_3" value="{{ old('nombre_plan_3') }}">
                </div>
                <div class="form-group col-md-5">
                    <input type="text" class="form-control" name="descripcion_plan_3" value="{{ old('descripcion_plan_3') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>
                        <input type="checkbox" name="estado_plan_3" value="3">
                    </label>
                </div>
            </div>
            {{-- #4 --}}
            <div class="form-row">
                <div class="form-group col-md-1">
                    <h6>Plan #4</h6>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="nombre_plan_4" value="{{ old('nombre_plan_4') }}">
                </div>
                <div class="form-group col-md-5">
                    <input type="text" class="form-control" name="descripcion_plan_4" value="{{ old('descripcion_plan_4') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>
                        <input type="checkbox" name="estado_plan_4" value="4">
                    </label>
                </div>
            </div>
            {{-- #5 --}}
            <div class="form-row">
                <div class="form-group col-md-1">
                    <h6>Plan #5</h6>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" name="nombre_plan_5" value="{{ old('nombre_plan_5') }}">
                </div>
                <div class="form-group col-md-5">
                    <input type="text" class="form-control" name="descripcion_plan_5" value="{{ old('descripcion_plan_5') }}">
                </div>
                <div class="form-group col-md-2">
                    <label>
                        <input type="checkbox" name="estado_plan_5" value="5">
                    </label>
                </div>
            </div>

            <!-- PROCESAR CARGA -->
            <button type="submit" class="btn btn-primary">AGREGAR</button>
        </form>
    </section>    

@endsection