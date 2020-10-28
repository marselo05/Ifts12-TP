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
        
        <?php 
            $pacientes = json_encode($pacientes); 
        ?>
        
        <div class="container">
            <h1>Nuevo turno</h1>
            {{-- CONSULTO POR EL PACIENTE --}}
            <form id="paciente-consultar_dni">
                <div class="alert alert-warning alert-dismissible fade show" role="alert" id="alert-dni-paciente">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <label>Ingrese el número de DNI del paciente: </label>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="number" name="buscar_paciente" id="buscar_paciente" class="form-control" placeholder="DNI" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="submit" name="consultar" value="Consultar" class="btn btn-primary">
                    </div>
                </div>    
            </form>

            {{--  --}}
            <form >
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apellido:</label>
                        <input type="text" name="apellido" id="apellido" class="form-control" placeholder="Apelldio" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>DNI:</label>
                        <input type="number" name="dni" id="dni" class="form-control" placeholder="D.N.I" required="">
                    </div>
                </div>
       
                <div class="form-group">
                    <button class="btn btn-success btn-submit">Submit</button>
                </div>
      
            </form>

            {{-- CONSULTO POR LA ESPECIALDAD --}}
            <form id="espeacialidad-consultar">
                <label>Consultar paciente por número de documento: </label>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <input type="number" name="buscar_especialidad" id="buscar_especialidad" class="form-control" placeholder="Nombre" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <input type="submit" name="consultar" value="Consultar" class="btn btn-primary">
                    </div>
                </div>
            </form>

            <div id="paciente-particular">Particular</div>

        </div>

    </section>    
  
    <script type="text/javascript">
       
        $('#alert-dni-paciente').hide();

        const   $id = document.getElementById.bind(document);

        let $pacientes = '<?php echo $pacientes; ?>';
            $pacientes = JSON.parse($pacientes);

        $id('paciente-consultar_dni').addEventListener('submit', function(a) {
            a.preventDefault();

            // consulto si el campo esta vacio
            if ( $id('buscar_paciente').value == '' ) 
            {
                $('#alert-dni-paciente').show();
            }
            else
            {

                $id('nombre').value     = '';
                $id('apellido').value   = '';
                $id('dni').value        = '';

                $flag = 0;
                $pacientes.forEach( (paciente) => {

                    if ( $id('buscar_paciente').value == paciente.dni ) 
                    {
                        $flag = 1;
                        $id('nombre').value     = paciente.nombre;
                        $id('apellido').value   = paciente.apellido;
                        $id('dni').value        = paciente.dni;

                        // if ( paciente.nro_afiliado == '' || paciente.nro_afiliado == '0000')
                        //     $id('paciente-particular').innerHTML = "Es particular";
                    }

                });
                // valido tipo de usuario
                if ($flag == 0) 
                    $id('paciente-particular').innerHTML = "Paciente Particular";
                else
                    $id('paciente-particular').innerHTML = "Paciente Socio";
            }


        }, false);

    </script>
   
 @endsection