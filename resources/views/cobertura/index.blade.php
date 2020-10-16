@extends('panel.plantilla')

@section('cuerpo_panel')
    
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Coberturas</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('cobertura.create') }}" tabindex="-1" aria-disabled="true">Agregar nueva cobertura</a>
            </li>
        </ul>
    </nav>

    <section>
            
        <table class="table table-hover" id="cobertura-listado">
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
                
                @foreach ($obras_sociales as $cobertura)
                    <tr>
                        <th scope="row">{{ $cobertura->id }}</th>
                        <td>{{ $cobertura->nombre }}</td>
                        <td>{{ $cobertura->descripcion }}</td>
                        <td>{{ $cobertura->pivot->status }}</td>
                        <td>
                            <a href="{{ route('cobertura.edit', $cobertura) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="" class="d-inline" method="POST">
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
    <script type="text/javascript">

        var dataTable = new DataTable("#cobertura-listado", {
            searchable: false,
            fixedHeight: true,
        });
        
    </script>
@endsection