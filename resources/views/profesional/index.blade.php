@extends('panel.plantilla')

@section('cuerpo_panel')
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Profesionales</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('profesional.create') }}" tabindex="-1" aria-disabled="true">Agregar nueva Profesional</a>
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
                    <th scope="col">Especialidad</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($profesionales as $profesional)
                    <tr>
                        <th scope="row">{{ $profesional->id }}</th>
                        <td>{{ $profesional->nombre }}</td>
                        <td>{{ $profesional->apellido }}</td>
                        <?php
                        	for ($i=0; $i < count($especialidades); $i++) 
                        		if ($especialidades[$i]->id == $profesional->especialidad_id) 
                        			echo '<td>'. $especialidades[$i]->nombre .'</td>';
                        ?>
                        <td>{{ $profesional->estado }}</td>
                        <td>
                            <a href="{{ route('profesional.edit', $profesional) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('profesional.delete', $profesional) }}" class="d-inline" method="POST">
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