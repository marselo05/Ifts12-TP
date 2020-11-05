@extends('panel.plantilla')

@section('cuerpo_panel')   
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Turnos</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('turnos.index') }}" tabindex="-1" aria-disabled="true">Volver</a>
            </li>
        </ul>
    </nav>

    <section>
        
        <div class="container">
            <h6>Paso 1 - Verificación de usuario</h6>
            @if ( session('mensaje') )
                <div class="alert alert-success">{{ session('mensaje') }}</div>
                {{ session('nro_afiliado') }}
            @endif
            {{-- CONSULTO POR EL PACIENTE --}}
            <form id="paciente-consultar_dni" method="POST" action="{{ route('turnos.storePaciente') }}" class="formulario">
                @csrf

                <label>Ingrese el número de DNI del paciente: </label>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="number" name="numero_paciente" class="form-control" placeholder="DNI" required="" value="{{ old('numero_paciente') }}">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="submit" name="consultar" value="Consultar" class="btn btn-primary">
                    </div>
                </div>    
            </form>

            <div>
                <span>Tipo de paciente: </span>
                <span id="paciente-particular"></span>
            </div>
            {{--  --}}
            <h6>Datos del paciente </h6>
            <form >              
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" disabled="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apellido:</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apelldio" disabled>
                    </div>
                    <div class="form-group col-md-4">
                        <label>DNI:</label>
                        <input type="number" name="dni" id="dni" class="form-control" placeholder="D.N.I" disabled="">
                    </div>
                </div>
      
            </form>

        </div>

    </section>    

   
 @endsection