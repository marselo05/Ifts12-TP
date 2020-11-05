@extends('panel.plantilla')

@section('cuerpo_panel')   
  
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Turnos</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('turnos.validarPaciente') }}" tabindex="-1" aria-disabled="true">Volver</a>
            </li>
        </ul>
    </nav>

    <section>
        
        <div class="container">

            <h6>Datos del paciente</h6>
            <form name="form-espeacialidad" action="{{ route('turnos.storeValidarEspecialidad') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nombre:</label>
                        <input type="hidden" name="id_paciente" class="form-control" placeholder="Nombre" required="" value="{{ $pacientes[0]->id }}">
                        <input type="text" name="nombre"  class="form-control" placeholder="Nombre" required="" value="{{ $pacientes[0]->nombre }}" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apellido:</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Apelldio" required="" value="{{ $pacientes[0]->apellido }}" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>DNI:</label>
                        <input type="number" name="dni" class="form-control" placeholder="D.N.I" required="" value="{{ $pacientes[0]->dni }}">
                    </div>
                </div>
                <br>
                <h6>Seleccionar Estudio y Sucursal</h6>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Seleccionar sucursal: </label>
                        <select class="custom-select" name="form_espeacialidad__sucursal">
                            <option >Seleccionar sucursal</option>
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}"
                                @if(isset($sucursal_select))
                                    @if($sucursal_select == $sucursal->id)
                                        selected 
                                    @endif
                                @endif
                                >{{ $sucursal->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Seleccionar especialidad: </label>
                        <select class="custom-select" name="form_espeacialidad__especialidad">
                            <option >Seleccionar especialidad</option>
                            @foreach ($especialidades as $especialidad)
                                <option value="{{ $especialidad->id }}"
                                @if(isset($especialidad_select))
                                    @if($especialidad_select == $especialidad->id)
                                        selected 
                                    @endif        
                                @endif    
                                >{{ $especialidad->nombre }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="submit" name="consultar" value="Buscar" class="btn btn-primary">
                    </div>
                </div>    
            </form>

        </div>

    </section>    
 
 @endsection