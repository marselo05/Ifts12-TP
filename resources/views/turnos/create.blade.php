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
                <label>Consultar paciente por número de documento: </label>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <input type="number" name="buscar_paciente" id="buscar_paciente" class="form-control" placeholder="Nombre" required="">
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
       
        const $id = document.getElementById.bind(document);

        $pacientes = '<?php echo $pacientes; ?>';
        $pacientes = JSON.parse($pacientes);

        $id('paciente-consultar_dni').addEventListener('submit', function(a) {
            a.preventDefault();

            $id('nombre').value     = '';
            $id('apellido').value   = '';
            $id('dni').value        = '';

            $pacientes.forEach( (paciente) => {

                if ( $id('buscar_paciente').value == paciente.dni ) 
                {
                    $id('nombre').value     = paciente.nombre;
                    $id('apellido').value   = paciente.apellido;
                    $id('dni').value        = paciente.dni;

                    if ( paciente.nro_afiliado == '' || paciente.nro_afiliado == '000000')
                        $id('paciente-particular').innerHTML = "Es particular";
                }
                    
            });

        }, false);

    </script>
   
 @endsection