@extends('panel.plantilla')

@section('cuerpo_panel')
    
    <nav class="d-flex justify-content-between align-items-center" style="margin: 1rem 0;">
        <h2>Salas</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item" style="padding: 0 1rem;">
                <form class="d-inline" style="display: flex !important;" action="{{ route('salas.consultoSucursalesSalas') }}" method="POST">
                    @csrf

                    <select class="form-control" id="sucursal" name="sucursal">
                        <option selected>Sucursal</option>
                        @foreach ($sucursales as $sucursal)
                            <option value="{{ $sucursal->id }}">{{ $sucursal->nombre }}</option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" type="submit">Buscar</button>
                </form> 
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-primary" href="{{ route('salas.create') }}" tabindex="-1" aria-disabled="true">Agregar nueva Salas</a>
            </li>
        </ul>
    </nav>
    
    <section>
            
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sucursal</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Profesional</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Día</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ( $salas as $sala )
                    <tr>
                        <th scope="row">{{ $sala->id }}</th>
                        <td>{{ $sala->sucursal_id }}</td>
                        <td>{{ $sala->sala_id }}</td>
                        <td>{{ $sala->profesional_id }}</td>
                        <td>{{ $sala->especialidad_id }}</td>
                        <td>{{ $sala->dia }}</td>
                        <td>{{ $sala->hora_desde }} : {{ $sala->hora_hasta }}</td>
                        <td>{{ $sala->estado }}</td>
                        <td>
                            <a href="{{ route('salas.edit', $sala) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('salas.delete', $sala) }}" class="d-inline" method="POST">
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
        
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
       
        // $("#sucursal").click(function(e) {
      
        //     e.preventDefault();
       
        //     var name        =  $("#sucursal").val();
       
        //     $.ajax({
        //        type:'POST',
        //        url:" route('ajaxRequest.post') ",
        //        data:{name:name},
        //        success:function(data)
        //        {
        //           alert(data.success);
        //        }
        //     });
      
        // });
        // const $id = document.getElementById.bind(document);
        // const id = document.getElementById.bind(document)

    </script>
    
@endsection