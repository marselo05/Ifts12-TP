@extends('panel.plantilla')

@section('cuerpo_panel')
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>SUCURSALES</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('sucursal.create') }}" tabindex="-1" aria-disabled="true">Agregar nueva sucrsal</a>
            </li>
        </ul>
    </nav>

    <section>
            
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Días</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($sucursales as $sucursal)
                    <tr>
                        <th scope="row">{{ $sucursal->id_sucursal }}</th>
                        <td>{{ $sucursal->nombre }}</td>
                        <td>{{ $sucursal->direccion }}</td>
                        <td>{{ $sucursal->telefono }}</td>
                        <td>{{ $sucursal->dias }}</td>
                        <td>{{ $sucursal->horario_apertura }} - {{ $sucursal->horario_cierre }}</td>
                        <td>{{ $sucursal->estado }}</td>
                        <td>
                            <a href="{{ route('sucursal.edit', $sucursal) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="" class="d-inline" method="POST">
                                @method('DELETE')
                                @csrf
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