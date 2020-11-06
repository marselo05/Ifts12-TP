@extends('panel.plantilla')

@section('cuerpo_panel')   
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Turnos</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('turnos.validarPaciente') }}" tabindex="-1" aria-disabled="true">Sacar un nuevo turno</a>
            </li>
        </ul>
    </nav>

    <section>

        @if ( session('mensaje') )
            <div class="alert alert-success">{{ session('mensaje') }}</div>
        @endif

        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre paciente</th>
                    <th scope="col">DNI paciente</th>
                    <th scope="col">Porfesional</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Sucursal</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($turnos as $turno)
                    <tr>
                        <th scope="row">{{ $turno->id }}</th>
                        <td>{{ $turno->paciente_nombre_apellido }}</td>
                        <td>{{ $turno->paciente_dni }}</td>
                        <td>{{ $turno->profesional_nombre_apellido }}</td>
                        <td>{{ $turno->especialidad_nombre }}</td>
                        <td>{{ $turno->sucursal_nombre }}</td>
                        <td>{{ $turno->sala_id }}</td>
                        <td>{{ $turno->fecha }}</td>
                        <td>{{ $turno->hora_inicio }} - {{ $turno->hora_fin }}</td>
                        <td>
                            <a href="{{ route('turno.confirmarTurno', $turno->id) }}" class="btn btn-warning btn-sm">Confirmar</a>
                            <form action="{{ route('turno.delete', $turno) }}" class="d-inline" method="POST">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form> 
                        </td>
                    </tr>    
                @endforeach

            </tbody>
        </table>
        <br>
        <br>
        <hr>
        <br>
        <br>
        <!-- $sucursales->links()  -->
        @isset($confirmados)
            <h4>Turnos confirmados</h4>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre paciente</th>
                        <th scope="col">DNI paciente</th>
                        <th scope="col">Porfesional</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Sucursal</th>
                        <th scope="col">Sala</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Horario</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach ($confirmados as $confirmado)
                            <tr style="background: #F1F8E9">
                                <th scope="row">{{ $confirmado->id }}</th>
                                <td>{{ $confirmado->paciente_nombre_apellido }}</td>
                                <td>{{ $confirmado->paciente_dni }}</td>
                                <td>{{ $confirmado->profesional_nombre_apellido }}</td>
                                <td>{{ $confirmado->especialidad_nombre }}</td>
                                <td>{{ $confirmado->sucursal_nombre }}</td>
                                <td>{{ $confirmado->sala_id }}</td>
                                <td>{{ $confirmado->fecha }}</td>
                                <td>{{ $confirmado->hora_inicio }} - {{ $confirmado->hora_fin }}</td>
                            </tr>    
                        @endforeach

                </tbody>
            </table>
        @endisset   
    </section>
   
 @endsection