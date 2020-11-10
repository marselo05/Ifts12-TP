@extends('panel.plantilla')

@section('cuerpo_panel')
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Especialidades</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('especialidad.create') }}" tabindex="-1" aria-disabled="true">Agregar nueva especialidad</a>
            </li>
        </ul>
    </nav>

    <section>
            
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($especialidades as $especialidad)
                    <tr>
                        <th scope="row">{{ $especialidad->id }}</th>
                        <td>{{ $especialidad->nombre }}</td>
                        <td>{{ $especialidad->descripcion }}</td>
                        <td>{{ $especialidad->estado }}</td>
                        <td>
                            <a href="{{ route('especialidad.edit', $especialidad) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('especialidad.delete', $especialidad) }}" class="d-inline" method="POST">
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