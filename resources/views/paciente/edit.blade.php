@extends('panel.plantilla')

@section('cuerpo_panel')
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Pacientes</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('paciente.create') }}" tabindex="-1" aria-disabled="true">Agregar nuevo Paciente</a>
            </li>
        </ul>
    </nav>

    <section>
            
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Cobertura</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($pacientes as $paciente)
                    <tr>
                        <th scope="row">{{ $paciente->id }}</th>
                        <td>{{ $paciente->nombre }}</td>
                        <td>{{ $paciente->apellido }}</td>
                        <td>{{ $paciente->cobertura_id }}</td>
                        <td>{{ $paciente->estado }}</td>
                        <td>
                            <a href="{{ route('paciente.edit', $paciente) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('paciente.delete', $paciente) }}" class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form> 
                        </td>
                    </tr>    
                @endforeach

            </tbody>
        </table>
        <!-- $sucursales->links()  -->
    </section>
    
@endsection