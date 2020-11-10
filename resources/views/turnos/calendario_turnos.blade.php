@extends('panel.plantilla')

@section('cuerpo_panel')   
  
    <nav class="d-flex justify-content-between align-items-center">
        <h2>Turnos</h2>
        <ul class="nav nav-pills justify-content-end">
            <li class="nav-item">
            <a class="nav-link btn btn-primary" href="{{ route('turnos.validarEspecialidad') }}" tabindex="-1" aria-disabled="true">Volver</a>
            </li>
        </ul>
    </nav>

    <section>
        
        <div class="container">
            
            <h6>Seleccione un turno en el calendario</h6>

            {{-- CONSULTO POR LA ESPECIALDAD --}}
            <h6>Datos del paciente</h6>
            <form name="form_turno" id="form_turno" action="{{ route('turnos.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Nombre:</label>
                        <input type="hidden" name="id_paciente" class="form-control" placeholder="Nombre" required="" value="{{ $pacientes[0]->id }}">
                        <input type="text" name="nombre"  class="form-control" placeholder="Nombre" required="" value="{{ $pacientes[0]->nombre }}" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>Apellido:</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Apelldio" required="" value="{{ $pacientes[0]->apellido }}" >
                    </div>
                    <div class="form-group col-md-4">
                        <label>DNI:</label>
                        <input type="number" name="dni" class="form-control" placeholder="D.N.I" required="" value="{{ $pacientes[0]->dni }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Seleccionar sucursal: </label>
                        <select class="custom-select" name="form_espeacialidad__sucursal">
                            <option >Seleccionar sucursal</option>
                            @foreach ($sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}"
                                @if(isset($sucursal_select))
                                    @if($sucursal_select == $sucursal->id)
                                        selected 
                                    @endif
                                @endif
                                >{{ $sucursal->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Seleccionar especialidad: </label>
                        <select class="custom-select" name="form_espeacialidad__especialidad">
                            <option >Seleccionar especialidad</option>
                            @foreach ($especialidades as $especialidad)
                                <option value="{{ $especialidad->id }}"
                                @if(isset($especialidad_select))
                                    @if($especialidad_select == $especialidad->id)
                                        selected 
                                    @endif        
                                @endif    
                                >{{ $especialidad->nombre }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                	<div class="form-group col-md-4">
                        <label>Fecha:</label>
                        <input type="text" name="fecha id" class="form-control" placeholder="fecha" required="" value="{{ $fechaHoy }}">
                    </div>
                	<div class="form-group col-md-4">
                        <label>Día:</label>
                        <input type="text" name="dia" id="dia" class="form-control" placeholder="Día" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Hora inicio:</label>
                        <input type="text" name="hora_inicio" id="hora_inicio" class="form-control" placeholder="hora_inicio" required="">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Hora fin</label>
                        <input type="text" name="hora_fin" id="hora_fin" class="form-control" placeholder="Hora fin" required="">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="submit" name="consultar" value="Sacar turno" class="btn btn-primary">
                    </div>
                </div>    
            </form>

        </div>

            @if (isset($calendarioActivo)) 
                @if ($calendarioActivo == 1) 
                
                    <?php
                        $diasEspecialidades     = json_encode($diasEspecialidades);
                        $turnosReservados       = json_encode($turnos); 
                    ?>

                    <h6>Calendario</h6>
                    <div id="calendario" style="max-width: 1100px; margin: 0 auto;"></div>
                    <br><br>
                @endif
            @endif


    </section>    
  
    <script type="text/javascript">
    
        const   $id = document.getElementById.bind(document);

        let $pacientes = '<?php echo $pacientes; ?>';
            $pacientes = JSON.parse($pacientes);


        let $diasEspecialidades = '<?php echo $diasEspecialidades;?>';
            $diasEspecialidades = JSON.parse($diasEspecialidades);

            console.log($diasEspecialidades);


        let $turnosReservados = '<?php echo $turnosReservados; ?>';
            $turnosReservados = JSON.parse($turnosReservados);


            /***
            **** CONTRUYENDO OBJETO CALENDARIO ESPECIALISTA DIAS Y HORAS
            ***/
            // casteo las horas

                // $cantidadDeTurnos
                $turnoCalendario = [];
                // Estructura objeto

                // Guardo la cantidad de turnos que hay por dia
                    $diasEstudios           = [];
                    $cantidasDeTurnosPorDia = []; 
                    for (var i=0; i<$diasEspecialidades.length; i++) 
                    {
                        // calculo las cantiadades de turnos
                            $cantidadDeTurnosDos = Math.round(( parseInt( $diasEspecialidades[i].endTime.replace(':','') ) - parseInt( $diasEspecialidades[i].startTime.replace(':','') ) ) / 50 );
                        
                        // Guardo los dias que contienen especialidad
                            $diasEstudios.push( $diasEspecialidades[i].daysOfWeek );

                        // Guardo Cantidad de turnos por dia
                            $cantidasDeTurnosPorDia.push( $cantidadDeTurnosDos );
                    }

                // Sete los turnos del especialista en el dia que corresponda
                    $horarioTurnos = [];
                    $sw = 0;
                    // dias de la semana
                    for (var $i=0; $i<$diasEstudios.length; $i++) 
                    {
                        // si la primera vuelta arranca con cero '00'
                        if ( $diasEspecialidades[$i].startTime.substr(2,3).replace(':','') == '00')
                        {
                            // Cantidad de vueltas para formar la hora
                            for (var $ii=0; $ii<$cantidasDeTurnosPorDia[$i]; $ii++) 
                            {
                                
                                if ( $sw == 0 ) 
                                {
                                    $startTime = parseInt($diasEspecialidades[$i].startTime.substr(0,2));
                                    // 
                                    $horarioTurnos.push({
                                        daysOfWeek: $diasEstudios[$i],
                                        startTime: $diasEspecialidades[$i].startTime,
                                        endTime: $startTime +':30',
                                        color: 'green',
                                        extendedProps: {
                                            estado: false,
                                            daysOfWeek: $diasEstudios[$i],
                                        }
                                    });

                                    $sw=1;
                                }
                                else 
                                {
                                    if ( $ii%2 == 0 ) 
                                    {
                                        $horarioTurnos.push({
                                            daysOfWeek: $diasEstudios[$i],
                                            startTime: $startTime +':00',
                                            endTime: $startTime +':30',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false,
                                                daysOfWeek: $diasEstudios[$i],
                                            }
                                        });
                                    }
                                    else
                                    {
                                        $horarioTurnos.push({
                                            daysOfWeek: $diasEstudios[$i],
                                            startTime: $startTime+':30',
                                            endTime: ($startTime  = $startTime + 1) +':00',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false,
                                                daysOfWeek: $diasEstudios[$i],
                                            }
                                        });
                                    }
                                }
                            }
                            // reseteo variables
                                $sw=0;
                                $startTime  = 0;
                        }
                        else
                        {
                            // Cantidad de vueltas para formar la hora
                            for (var $ii=0; $ii<$cantidasDeTurnosPorDia[$i]; $ii++) 
                            {     
                                if ( $sw == 0 ) 
                                {
                                    $startTime = parseInt($diasEspecialidades[$i].startTime.substr(0,2));
                                    
                                    $horarioTurnos.push({
                                        daysOfWeek: $diasEstudios[$i],
                                        startTime: $diasEspecialidades[$i].startTime, 
                                        endTime: ($startTime + 1) +':00',
                                        color: 'green',
                                        extendedProps: {
                                            estado: false,
                                            daysOfWeek: $diasEstudios[$i],
                                        }
                                    });

                                    $sw=1;
                                }
                                else 
                                {
                                    // 08:30 a 09:00
                                    if ( $ii%2 == 0 ) 
                                    {
                                        $horarioTurnos.push({
                                            daysOfWeek: $diasEstudios[$i],
                                            startTime: $startTime  +':30',
                                            endTime: ($startTime + 1) +':00',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false,
                                                daysOfWeek: $diasEstudios[$i],
                                            }
                                        });
                                    }
                                    else
                                    {
                                        $horarioTurnos.push({
                                            daysOfWeek: $diasEstudios[$i],
                                            startTime: ($startTime  = $startTime + 1)+':00',
                                            endTime: $startTime +':30',
                                            color: 'green',
                                            extendedProps: {
                                                estado: false,
                                                daysOfWeek: $diasEstudios[$i],
                                            }
                                        });
                                    }
                                }
                            }
                            // reseteo variables
                                $sw=0;
                                $startTime  = 0;
                        }
                    }  
                    
                /* SETEO EL OBJETO TURNOS CALENDARIO*/
                for (var i = 0; i < $horarioTurnos.length; i++) 
                {
                    // 
                    for (var ii = 0; ii < $turnosReservados.length; ii++) 
                    {
                        // validamos el dia sea igual
                        if ($horarioTurnos[i].daysOfWeek == $turnosReservados[ii].daysOfWeek) 
                        {
                            // validamos que la de inicio y la hora fin sean las mismas
                            if ( 
                                parseInt( $horarioTurnos[i].startTime.replace(':','') ) == 
                                parseInt( $turnosReservados[ii].startTime.replace(':','') ) && 
                                parseInt( $horarioTurnos[i].endTime.replace(':','') ) == 
                                parseInt( $turnosReservados[ii].endTime.replace(':','') ) )
                            {
                                $horarioTurnos[i].start                   = $turnosReservados[ii].start;
                                $horarioTurnos[i].extendedProps.estado    = true;
                                $horarioTurnos[i].color                   = 'blue';
                            }
                        }
                    }
                }


            // calculo

        /**
            **** CALENARIO *********
        ***/ 
        document.addEventListener('DOMContentLoaded', function() 
        {
            var calendarEl = document.getElementById('calendario');
            var $fechaHoy = '<?php echo $fechaHoy;?>';
           
            var calendar = new FullCalendar.Calendar(calendarEl, 
            {
                locale: 'es',
                // initialDate: '2020-11-02',
                initialDate: $fechaHoy,
                initialView: 'timeGridWeek',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                businessHours: {
                    daysOfWeek: [ 0, 1, 2, 3, 4, 5, 6], // Monday - Thursday
                    startTime: '08:00', // a start time (10am in this example)
                    endTime: '20:00', // an end time (6pm in this example)
                },
                navLinks: true, // can click day/week names to navigate views
                editable: false,
                selectable: true,
                selectMirror: true,
                nowIndicator: true,
                events: $horarioTurnos,
                eventClick: function(info) 
                { 
                
                    v = info               
                    console.log('Event: ' + info.event)
                    if ( info.event.extendedProps.estado == true ) 
                    {
                        alert("Turno no disponible.");
                    }
                    else
                    {

                        // alert("Te envio al formulario de cargar turno");
                       	v.el.style.background = 'gray'
                       	_fecchh = v.el.innerText.split('-');

                        document.getElementById('dia').value 			= v.event.extendedProps.daysOfWeek;
                        document.getElementById('hora_inicio').value 	= _fecchh[0];
                        document.getElementById('hora_fin').value 		= _fecchh[1];

                        
                    }
                },
            });
            calendar.render();
        });
    </script>
   
 @endsection